<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private function getContractsInfos($contracts) {
        $actives = 0;
        $toExpired = 0;
        $expired = 0;
        foreach ($contracts as $contract) {
            if ($contract->plan_id != '') {
                $validity =  Carbon::parse(Carbon::createFromFormat('d/m/Y', $contract->calc_validity())->format('Y-m-d'));
                $today = Carbon::parse(now());
                $daysOut = $today->diffInDays($validity, false);
                if ($daysOut >= 8) {
                    $actives++;
                } elseif ($daysOut <= 7 && $daysOut >= 0) {
                    $toExpired++;                    
                } else {
                    $expired++;                    
                }
            }
        }
        return [
            'actives' => $actives,
            'toExpired' => $toExpired,
            'expired' => $expired
        ];
    }

    private function mountChartProfit() {
        $now = Carbon::now();
        $fiveMonthsAgo = $now->copy()->subMonths(4)->startOfMonth();

        $payments = Payment::where('pay_date', '>=', $fiveMonthsAgo)
            ->where('pay_date', '<=', $now)
            ->select(
                DB::raw("DATE_FORMAT(pay_date, '%m/%Y') as month"),
                DB::raw("SUM(value) as total")
            )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $labels = [];
        $totals = [];

        for ($i = 4; $i >= 0; $i--) {
            $month = $now->copy()->subMonths($i);
            $label = $month->format('M');
            $labels[$month->format('m/Y')] = $label;
            $totals[$label] = 0;
        }

        foreach ($payments as $payment) {
            $monthFormat = $payment->month;
            $label = $labels[$monthFormat];
            $totals[$label] = $payment->total;
        }
        return [
            'chartLabels' => array_keys($totals),
            'chartValues' => array_values($totals)
        ];
    }

    private function mountChartServices() {
        $contracts = Contract::with('plan.service')->get();

        $serviceCounts = [];

        foreach ($contracts as $contract) {
            if ($contract->plan && $contract->plan->service) {
                $serviceName = $contract->plan->service->name; 
                if (!isset($serviceCounts[$serviceName])) {
                    $serviceCounts[$serviceName] = 0;
                }
                $serviceCounts[$serviceName]++;
            }
        }
        arsort($serviceCounts);

        $serviceLabels = array_keys($serviceCounts);
        $serviceValues = array_values($serviceCounts);

        return [
            'chartLabels' => $serviceLabels,
            'chartValues' => $serviceValues,
        ];
    }

    public function index() {
        return view('admin.dashboard', ['contractsInfos' => $this->getContractsInfos(Contract::all()), 'chartProfit' => $this->mountChartProfit(), 'chartServices' => $this->mountChartServices()]);
    }
}
