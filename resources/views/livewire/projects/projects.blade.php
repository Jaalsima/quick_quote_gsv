<div>
    {{-- Barra de búsqueda --}}
    <div class="grid items-center w-full md:grid-cols-12 mt-2">
        <div class="col-span-4">
            <input type="text" name="search" wire:model="search" class="w-full bg-white dark:text-gray-100 dark:bg-gray-800 border-none rounded-lg focus:ring-gray-400" placeholder="Buscar...">
        </div>
        <div class="inline mt-4 pl-4 pr-24 md:pl-0 md:pr-0 md:mt-0 md:block md:col-span-4">
            <div class="text-xl font-bold text-center text-blue-400 uppercase">
                <h1>Proyectos</h1>
            </div>
        </div>
        <div class="inline mt-4 md:mt-0 md:block md:col-span-4">
            <livewire:projects.project-create />
        </div>
    </div>

    {{-- Número de registros por página --}}
    <div class="py-2 md:py-4 ml-4 text-gray-500 dark:text-gray-100">
        Registros por página
        <input type="number" name="perPage" wire:model="perPage" class="w-[70px] dark:bg-gray-800 pr-2 py-1 cursor-pointer bg-white border-none rounded-lg focus:ring-gray-400">
    </div>

    {{-- Tabla de proyectos --}}
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

                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('project_name')">
                        Nombre
                        @if ($sort == 'project_name')
                        @if ($direction == 'asc')
                        <i class="ml-2 fa-solid fa-arrow-up-z-a"></i>
                        @else
                        <i class="ml-2 fa-solid fa-arrow-down-z-a"></i>
                        @endif
                        @else
                        <i class="ml-2 fa-solid fa-sort"></i>
                        @endif
                    </th>

                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="order('project_type')">
                        Tipo
                        @if ($sort == 'project_type')
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
                        Descripción
                    </th>

                    <th scope="col" class="px-6 py-3 cursor-pointer">
                        Kilowatts Requeridos
                    </th>

                    <th scope="col" class="px-6 py-3 cursor-pointer">
                        Fecha de Inicio
                    </th>

                    <th scope="col" class="px-6 py-3 cursor-pointer">
                        Término Estimado
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($projects as $project)
                <tr class="text-center bg-white border-b text-md dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $project->id }}
                    </th>
                    <td class="px-6 py-4 dark:text-lg">{{ $project->client->name }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $project->project_type }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $project->description }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $project->required_kilowatts }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $project->start_date }}</td>
                    <td class="px-6 py-4 dark:text-lg">{{ $project->expected_end_date }}</td>

                    <td class="flex justify-around py-4 pl-2 pr-8">
                        {{-- Acciones --}}
                        <div @if ($open) class="flex pointer-events-none opacity-20" @else class="flex" @endif>
                            <livewire:projects.project-show :project='$project' :key='$project->id' />
                            <livewire:projects.project-edit :project='$project' :key='$project->id' />
                            <livewire:projects.project-delete :project='$project' :key='$project->id' />
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-3xl text-center dark:text-gray-200">
                        No hay cotizaciones disponibles
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

        {{-- Paginación --}}
        <div class="px-3 py-1">
            {{ $projects->links() }}
        </div>
    </div>
</div>
