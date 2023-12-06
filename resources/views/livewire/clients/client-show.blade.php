<div class="relative inline-block text-center cursor-pointer group">
    <a href="#" wire:click="$set('open_client', true)">
        <i class="p-1 text-green-400 rounded hover:text-white hover:bg-green-500 fa-solid fa-eye"></i>
        <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
            Ver
            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
            </svg>
        </div>
    </a>

    {{-- Modal de Detalles de Cotización --}}
    @if ($open_client)
    <div wire:model="open_client">
        <div class="fixed inset-0 z-50 flex items-center justify-center" wire:click="$set('open_client', false)">
            <div class="absolute inset-0 z-40 bg-black opacity-70 modal-overlay"></div>
            <div class="z-50 w-11/12 mx-auto overflow-y-auto bg-white border border-gray-500 rounded-xl modal-container md:max-w-md">
                <!-- Contenido del modal de detalles -->
                <div class="flex gap-3 py-2 bg-gray-500 border border-gray-500">
                    <h3 class="w-full text-2xl text-center text-gray-100">Detalles de Cotización</h3>
                </div>
                <div class="md:px-5 pb-5">
                    <!-- Aquí puedes agregar los detalles de la cotización según tu modelo -->
                    <div>
                        <h5 class="mb-4 text-3xl font-semibold tracking-tight text-center text-gray-900 dark:text-white">
                            {{ $client->name }}
                        </h5>
                        <div class="text-lg text-start">
                            <div class="mb-3">
                                <h1 class="ml-2 text-sm">Dirección:</h1>
                                <p class="p-2 bg-gray-200 rounded-md">{{ $client->address }}</p>
                            </div>
                            <div class="mb-3">
                                <h1 class="ml-2 text-sm">Teléfono:</h1>
                                <p class="p-2 bg-gray-200 rounded-md">{{ $client->phone }}</p>
                            </div>
                            <div class="mb-3">
                                <!-- Agrega más detalles según tu modelo de cotización -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Botón para cerrar el modal de detalles -->
                <div class="mx-auto">
                    <x-secondary-button wire:click="$set('open_client', false)" class="text-gray-500 bg-gray-200 border border-gray-500 shadow-lg hover:shadow-gray-400 hover:bg-gray-500 hover:text-white">
                        Salir
                    </x-secondary-button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
