@php
    use Illuminate\Support\Facades\Hash;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Assina Fácil</title>
        <script>
            (function () {
                try {
                    const temaSalvo = localStorage.getItem('tema') || 'light';
                    document.documentElement.setAttribute('data-theme', temaSalvo);
                } catch (e) {
                    document.documentElement.setAttribute('data-theme', 'light');
                }
            })();
        </script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />                
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        @yield('css-resources')        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @yield('header')
            <div class="app-container">
                @yield('aside-links')
                <div class="content">
                    <div class="cont-box">
                        @yield('cont-box')
                    </div>
                    @if (session('alert'))
                        <x-alert />
                    @endif
                    @if (request()->cookie('def_pass'))                    
                    {{-- @if (false)                     --}}
                        <div class="modal show">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Favor Mudar a Sua Senha!</h5>
                                    </div>
                                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <p>Foi identificado que você ainda está utilizando a senha padrão gerada pelo sistema, favor atualizar a sua senha por questões de segurança!</p>

                                            <x-primary-input type="password" name="password" label="Nova Senha" :messages="$errors->updatePassword->get('password')" :oldValue="old('password')"/>
                                            <x-primary-input type="password" name="password_confirmation" label="Confirmar Senha" :messages="$errors->updatePassword->get('password_confirmation')" :oldValue="old('password_confirmation')"/>


                                            {{-- <div>
                                                <x-input-label for="update_password_password" :value="__('New Password')" />
                                                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                            </div> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('js-resources')
</html>
