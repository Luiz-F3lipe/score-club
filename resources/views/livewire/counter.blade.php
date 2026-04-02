<div class="w-full max-w-md mx-auto">
    <!-- Card principal do contador -->
    <div class="bg-surface dark:bg-dark-surface rounded-lg shadow-xl overflow-hidden border border-border dark:border-dark-border transition-all duration-300">

        <!-- Header do contador -->
        <div class="bg-linear-to-r from-primary to-success dark:from-dark-primary dark:to-dark-primary-strong px-6 py-4">
            <h2 class="text-xl font-bold text-white text-center tracking-wide uppercase">
                🎯 Contador Interativo
            </h2>
        </div>

        <!-- Display do contador -->
        <div class="p-8">
            <div class="relative">
                <!-- Círculo de fundo decorativo -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-48 h-48 bg-surface-soft dark:bg-dark-surface-soft rounded-full opacity-50 animate-pulse"></div>
                </div>

                <!-- Valor do contador -->
                <div class="relative flex items-center justify-center py-12">
                    <div class="text-center">
                        <div class="text-7xl font-black text-primary dark:text-dark-primary transition-all duration-300 transform hover:scale-110"
                             x-data="{ count: @entangle('count') }"
                             x-effect="$el.classList.add('animate-bounce'); setTimeout(() => $el.classList.remove('animate-bounce'), 300)">
                            {{ $count }}
                        </div>
                        <p class="text-sm text-text-soft dark:text-dark-text-soft mt-2 font-medium uppercase tracking-wider">
                            Contagem Atual
                        </p>
                    </div>
                </div>
            </div>

            <!-- Botões de controle -->
            <div class="flex gap-3 mt-6">
                <!-- Botão Decrementar -->
                <button
                    wire:click="decrement"
                    class="flex-1 bg-danger hover:bg-red-600 dark:bg-red-800 dark:hover:bg-red-900 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
                    {{ $count <= 0 ? 'disabled' : '' }}>
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 12H4"></path>
                        </svg>
                        <span>Menos</span>
                    </span>
                </button>

                <!-- Botão Incrementar -->
                <button
                    wire:click="increment"
                    class="flex-1 bg-primary hover:bg-primary-strong dark:bg-dark-primary dark:hover:bg-dark-primary-strong text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-lg">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Mais</span>
                    </span>
                </button>
            </div>

            <!-- Botão Reset -->
            <button
                wire:click="resetCounter"
                class="w-full mt-3 bg-accent hover:bg-amber-600 dark:bg-dark-accent dark:hover:bg-accent text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-lg">
                <span class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    <span>Resetar</span>
                </span>
            </button>
        </div>

        <!-- Footer com estatísticas -->
        <div class="bg-surface-soft dark:bg-dark-surface-soft px-6 py-4 border-t border-border dark:border-dark-border">
            <div class="flex justify-between items-center text-sm">
                <div class="text-center flex-1">
                    <p class="text-text-soft dark:text-dark-text-soft font-medium">Status</p>
                    <p class="text-text dark:text-dark-text font-bold mt-1">
                        @if($count === 0)
                            ⚪ Zero
                        @elseif($count < 10)
                            🟢 Baixo
                        @elseif($count < 50)
                            🟡 Médio
                        @else
                            🔴 Alto
                        @endif
                    </p>
                </div>
                <div class="w-px h-10 bg-border dark:bg-dark-border"></div>
                <div class="text-center flex-1">
                    <p class="text-text-soft dark:text-dark-text-soft font-medium">Progresso</p>
                    <p class="text-text dark:text-dark-text font-bold mt-1">
                        {{ min(100, $count) }}%
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Indicadores visuais -->
    <div class="mt-6 flex justify-center gap-2">
        @for($i = 0; $i < min(10, $count); $i++)
            <div class="w-3 h-3 rounded-full bg-primary dark:bg-dark-primary animate-pulse"
                 style="animation-delay: {{ $i * 0.1 }}s"></div>
        @endfor
    </div>
</div>
