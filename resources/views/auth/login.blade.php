<x-guest-layout>
    <div class="log-container">
        <div class="log-content">
            <div class="info">
                <h1>Assina Fácil</h1>
                <p>Seu sistema de gerenciamento de clientes e pagamentos!</p>                    
            </div>
            <div class="login-cont">
                <form class="form-login" action="{{ route('login') }}" method="post">
                    @csrf
                    <h2>LOGIN</h2>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <div class="inputs">
                        <div class="mb-4">
                            <x-primary-input type="email" name="email" label="Email" :messages="$errors->get('email')" :oldValue="old('email')"/>
                        </div>
                        <x-primary-input margin="4" type="password" name="password" label="Senha" :messages="$errors->get('password')" :oldValue="old('password')"/>
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Manter Conectado') }}</span>
                            </label>
                        </div>
                    </div>
                    <div class="sub-btn">
                        <input class="primary-btn" type="submit" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
