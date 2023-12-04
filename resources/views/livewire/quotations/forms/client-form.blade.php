<x-dialog-modal wire:model="openClientModal">
    <x-slot name="title">
        <h2 class="mt-3 text-2xl text-center">Datos del Cliente</h2>
    </x-slot>

    <x-slot name="content">

        <!-- Nombre -->
        <x-label value="Nombre" class="text-gray-700" />
        <x-input class="w-full" wire:model.lazy="name" />
        <x-input-error for="name" />

        <!-- Dirección -->
        <x-label value="Dirección" class="text-gray-700" />
        <x-input class="w-full" wire:model.lazy="address" />
        <x-input-error for="address" />

        <!-- Teléfono -->
        <x-label value="Teléfono" class="text-gray-700" />
        <x-input class="w-full" type="number" min="0" wire:model.lazy="phone" />
        <x-input-error for="phone" />

        <!-- Correo Electrónico -->
        <x-label value="Correo Electrónico" class="text-gray-700" />
        <x-input class="w-full" type="number" min="0" wire:model.lazy="email" />
        <x-input-error for="email" />

        <!-- Consumo Energético Promedio -->
        <x-label value="Consumo Energético Promedio" class="text-gray-700" />
        <x-input class="w-full" type="number" min="0" wire:model.lazy="average_energy_consumption" />
        <x-input-error for="average_energy_consumption" />

        <!-- Nivel de Radiación Solar -->
        <x-label value="Nivel de Radiación Solar" class="text-gray-700" />
        <x-input class="w-full" type="number" min="0" wire:model.lazy="solar_radiation_level" />
        <x-input-error for="solar_radiation_level" />

        <!-- Dimensiones del Techo (Longitud) -->
        <x-label value="Dimensiones del Techo (Longitud)" class="text-gray-700" />
        <x-input class="w-full" type="number" min="0" wire:model.lazy="roof_dimensions_length" />
        <x-input-error for="roof_dimensions_length" />

        <!-- Dimensiones del Techo (Anchura) -->
        <x-label value="Dimensiones del Techo (Anchura)" class="text-gray-700" />
        <x-input class="w-full" type="number" min="0" wire:model.lazy="roof_dimensions_width" />
        <x-input-error for="roof_dimensions_width" />

        {{-- <!-- Dropdown para Estado -->
        <x-label value="Estado" class="text-gray-700" />
        <select class="w-full mb-4 rounded-md" wire:model.lazy="status">
            <option value="">Selecciona un estado</option>
            <option value="Disponible">Disponible</option>
            <option value="No Disponible">No Disponible</option>
        </select>
        <x-input-error for="status" /> --}}

    </x-slot>

    <x-slot name="footer">
        <div class="mx-auto">
            <x-secondary-button wire:click="closeClientModal" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                Cancelar
            </x-secondary-button>
            <x-secondary-button class="text-blue-500 border border-blue-500 shadow-lg hover:shadow-blue-400 disabled:opacity-50 disabled:bg-blue-600 disabled:text-white" wire:click="add" wire:loading.attr="disabled" wire:target="add, image">
                Agregar
            </x-secondary-button>
        </div>
    </x-slot>


    {{-- <form wire:submit.prevent="submitForm">
    @csrf

    <!-- Nombre del Cliente -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-600">Nombre del Cliente</label>
        <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <!-- Dirección -->
    <div class="mb-4">
        <label for="address" class="block text-sm font-medium text-gray-600">Dirección</label>
        <input type="text" name="address" id="address" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <!-- Teléfono -->
    <div class="mb-4">
        <label for="phone" class="block text-sm font-medium text-gray-600">Teléfono</label>
        <input type="text" name="phone" id="phone" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <!-- Correo Electrónico -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-600">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <!-- Consumo Energético Promedio -->
    <div class="mb-4">
        <label for="average_energy_consumption" class="block text-sm font-medium text-gray-600">Consumo Energético Promedio</label>
        <input type="text" name="average_energy_consumption" id="average_energy_consumption" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <!-- Nivel de Radiación Solar -->
    <div class="mb-4">
        <label for="solar_radiation_level" class="block text-sm font-medium text-gray-600">Nivel de Radiación Solar</label>
        <input type="text" name="solar_radiation_level" id="solar_radiation_level" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <!-- Dimensiones del Techo (Longitud) -->
    <div class="mb-4">
        <label for="roof_dimensions_length" class="block text-sm font-medium text-gray-600">Longitud del Techo</label>
        <input type="text" name="roof_dimensions_length" id="roof_dimensions_length" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <!-- Dimensiones del Techo (Anchura) -->
    <div class="mb-4">
        <label for="roof_dimensions_width" class="block text-sm font-medium text-gray-600">Anchura del Techo</label>
        <input type="text" name="roof_dimensions_width" id="roof_dimensions_width" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <!-- Botón de Envío -->
    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Crear Cotización
        </button>
        <button wire:click="closeClientModal" type="button" class="ml-4 text-gray-500 hover:text-gray-700">Cerrar</button>
    </div>
</form> --}}
</x-dialog-modal>
