<div>
    <div class="flex flex-col h-screen">
        <!-- Panel header (Search input) -->
        <div
            class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-primary-darker dark:focus-within:text-light focus-within:text-gray-700">
            <span class="absolute inset-y-0 inline-flex items-center px-4">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
            <input x-ref="searchInput" type="text" wire:model="search"
                class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring"
                placeholder="Buscar..." />
        </div>

        <!-- Panel content (Search result) -->
        <div class="flex-1 px-4 pb-4 space-y-4 overflow-y-hidden h hover:overflow-y-auto">
            <h3 class="py-2 text-sm font-semibold text-gray-600 dark:text-light">Historial:</h3>
            
            @foreach ($resultados as $resultado)
                <a href="{{ url( $resultado->redirect )}}" class="flex space-x-4">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-lg" src="{{ asset('image/buscador.png') }}" alt="Post cover" />
                    </div>
                    <div class="flex-1 max-w-xs overflow-hidden">
                        <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Tabla: {{ $resultado->table }}</h4>
                        <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                            busqueda encontrada: {{ $search }}.
                        </p>
                        <span class="text-sm font-normal text-gray-400 dark:text-primary-light"> URL: {{ $resultado->redirect }} </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
