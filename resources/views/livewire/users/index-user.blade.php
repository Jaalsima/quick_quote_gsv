<div>
    @if ($users->count() > 0)
    <div>
        <div class="grid items-center w-full md:grid-cols-12 mt-2">
            <div class="col-span-4">
                <input type="text" name="search" wire:model="search" class="w-full bg-white dark:text-gray-100 dark:bg-gray-800 border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
            </div>
            <div class="inline mt-4 pl-4 pr-24 md:pl-0 md:pr-0 md:mt-0 md:block md:col-span-4">
                <div class="text-xl font-bold text-center text-blue-400 uppercase">
                    <h1 class="text-red-800 dark:text-red-700">Us<span class="text-gray-800 dark:text-gray-400">uarios</span></h1>
                </div>
            </div>
            <div class="inline mt-4 md:mt-0 md:block md:col-span-4">
                <livewire:users.create-user />
            </div>
        </div>
        <div class="py-2 md:py-4 ml-4 text-gray-500 dark:text-gray-100">
            Registros por página
            <input type="number" name="perPage" wire:model="perPage" class="w-[70px] dark:bg-gray-800 pr-2 py-1 cursor-pointer bg-white border-none rounded-lg focus:ring-gray-400">
        </div>

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

                        <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('document')">
                            Documento
                            @if ($sort == 'document')
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

                        {{-- <th scope="col" class="px-6 py-3">
                                Dirección
                            </th> --}}

                        <th scope="col" class="px-6 py-3">
                            Teléfono
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                    <div class="hidden">
                        @if ($user->status === 'Activo')
                        {{ $colorStatus = 'text-green-600' }}
                        @else
                        {{ $colorStatus = 'text-red-500' }}
                        @endif
                    </div>
                    <tr class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->id }}
                        </th>
                        <td class="px-6 py-4 dark:text-lg">{{ $user->document }}</td>
                        <td class="px-6 py-4 dark:text-lg">{{ $user->name }}</td>
                        <td class="px-6 py-4 ">{{ $user->email }}</td>
                        {{-- <td class="px-6 py-4 ">{{ $user->address }}</td> --}}
                        <td class="px-6 py-4 ">{{ $user->phone }}</td>
                        <td class="px-6 py-4 dark:text-lg {{ $colorStatus }}">{{ $user->status }}</td>
                        <td class="flex justify-around py-4 pl-2 pr-8">

                            {{-- Modales de detalle, actualización y eliminación de usuarios. --}}
                            <div @if ($open) class="flex pointer-events-none opacity-20" @else class="flex" @endif>

                                <livewire:users.show-user :user="$user" :key="time() . $user->id" />
                                <livewire:users.edit-user :user="$user" :key="time() . $user->id" />

                                <div class="relative inline-block text-center cursor-pointer group">
                                    <a href="#" wire:click="confirmDelete({{ $user->id }})">
                                        <i class="p-1 text-red-400 rounded hover:text-white hover:bg-red-400 fa-solid fa-trash"></i>
                                        <div class="absolute z-10 px-3 py-2 mb-2 text-center text-white bg-gray-700 rounded-lg opacity-0 pointer-events-none text-md group-hover:opacity-80 bottom-full -left-3">
                                            Eliminar
                                            <svg class="absolute left-0 w-full h-2 text-black top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    {{-- Modal de Confirmación de Eliminación de usuarios. --}}
                    @if ($open)
                    <div class="fixed inset-0 z-50 flex items-center justify-center" wire:click="$set('open', false)">
                        <div class="absolute inset-0 z-40 bg-black opacity-10 modal-overlay"></div>
                        <div class="z-50 w-11/12 mx-auto overflow-y-auto bg-white border border-red-500 rounded-xl modal-container md:max-w-md">

                            <!-- Contenido del modal -->
                            <div class="flex gap-3 py-2 bg-red-500 border border-red-500">
                                <h3 class="w-full text-2xl text-center text-gray-100 ">Eliminar</h3>
                            </div>
                            <div class="px-6 py-4 text-left modal-content">
                                <p class="text-xl text-gray-500">
                                    ¿Estás seguro de que deseas eliminar este usuario?
                                </p>
                                <div class="mt-4 text-center">
                                    <x-secondary-button wire:click="$set('open', false)" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:text-gray-50 hover:shadow-gray-400 hover:bg-gray-400">
                                        Cancelar
                                    </x-secondary-button>
                                    <x-secondary-button wire:click="deleteConfirmed" class="mr-4 text-red-500 border border-red-500 shadow-lg hover:text-gray-50 hover:shadow-red-400 hover:bg-red-400">
                                        Eliminar
                                    </x-secondary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @empty
                    <tr>
                        <td colspan="12" class="text-3xl text-center dark:text-gray-200">
                            No hay usuarios Disponibles
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="px-3 py-1">
                {{ $users->links() }}
            </div>
        </div>

        @endif
    </div>
