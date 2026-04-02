<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-bg dark:bg-dark-bg text-text dark:text-dark-text flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full max-w-4xl mb-8 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 border border-primary dark:border-dark-primary hover:border-primary-strong dark:hover:border-dark-primary-strong rounded-md text-sm transition-all duration-200"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 hover:text-primary dark:hover:text-dark-primary rounded-md text-sm transition-all duration-200"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 border border-primary dark:border-dark-primary hover:border-primary-strong dark:hover:border-dark-primary-strong rounded-md text-sm transition-all duration-200">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Título principal -->
        <div class="text-center mb-12 animate-fade-in">
            <h1 class="text-5xl font-black text-primary dark:text-dark-primary mb-4">
                ⚡ Score Club
            </h1>
            <p class="text-lg text-text-soft dark:text-dark-text-soft font-medium">
                Sistema de Pontuação Interativo com Livewire
            </p>
        </div>

        <!-- Componente Counter do Livewire -->
        <div class="w-full max-w-4xl">
            @livewire('counter')
        </div>

        <!-- Footer informativo -->
        <footer class="mt-12 text-center">
            <p class="text-sm text-text-soft dark:text-dark-text-soft">
                Laravel v{{ app()->version() }} • Livewire • Tailwind CSS
            </p>
            <p class="text-xs text-text-soft dark:text-dark-text-soft mt-2">
                🎯 Desenvolvido com os temas personalizados do Score Club
            </p>
        </footer>
    </body>
</html>
