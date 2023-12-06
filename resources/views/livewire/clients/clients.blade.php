<div>
    {{-- Barra de búsqueda --}}
    <div class="grid items-center w-full md:grid-cols-12 mt-2">
        <div class="col-span-4">
            <input type="text" name="search" wire:model="search" class="w-full bg-white dark:text-gray-100 dark:bg-gray-800 border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
        </div>
        <div class="inline mt-4 pl-4 pr-24 md:pl-0 md:pr-0 md:mt-0 md:block md:col-span-4">
            <div class="text-xl font-bold text-center text-blue-400 uppercase">
                <h1>Clientes</h1>
            </div>
        </div>
        <div class="inline mt-4 md:mt-0 md:block md:col-span-4">
            <livewire:clients.client-create />
        </div>
    </div>

    {{-- Número de registros por página --}}
    <div class="py-2 md:py-4 ml-4 text-gray-500 dark:text-gray-100">
        Registros por página
        <input type="number" name="perPage" wire:model="perPage" class="w-[70px] dark:bg-gray-800 pr-2 py-1 cursor-pointer bg-white border-none rounded-lg focus:ring-gray-400">
    </div>

    {{-- Tabla de cotizaciones --}}
    <div class="relative hidden md:block mt-2 md:mt-4 overflow-x-hidden shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-center text-gray-100 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-1 py-4 cursor-pointer" wire:click.prevent="order('id')">
                        ID
                        @if ($sort == 'id')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('name')">
                        Nombre
                        @if ($sort == 'name')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('address')">
                        Dirección
                        @if ($sort == 'address')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('phone')">
                        Teléfono
                        @if ($sort == 'phone')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('email')">
                        Correo
                        @if ($sort == 'email')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3 cursor-pointer">
                        Consumo Energía Promedio
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer">
                        Nivel de Radiación Solar
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer">
                        longitud Cubierta
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer">
                        Ancho Cubierta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($clients as $client)
                <tr class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $client->id }}
                    </th>
                    <td class="px-6 py-4 dark:text-lg">{{ $client->name }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $client->address }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $client->phone }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $client->email }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $client->average_energy_consumption }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $client->solar_radiation_level }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $client->roof_dimensions_length }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $client->roof_dimensions_width }}</td>
                    {{-- Agrega aquí otros campos según tus necesidades --}}
                    <td class="flex justify-around py-4 pl-2 pr-8">
                        {{-- Acciones --}}
                        <div @if ($open) class="flex pointer-events-none opacity-20" @else class="flex" @endif>
                            <livewire:clients.client-show :client='$client' :key='$client->id' />
                            <livewire:clients.client-edit :client='$client' :key='$client->id' />
                            <livewire:clients.client-delete :client='$client' :key='$client->id' />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-3xl text-center dark:text-gray-200">
                        No hay clientes disponibles
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

        {{-- Paginación --}}
        <div class="px-3 py-1">
            {{ $clients->links() }}
        </div>
    </div>
</div>
