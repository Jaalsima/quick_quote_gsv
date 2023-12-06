<div class="my-auto">
    <x-secondary-button wire:click="$set('open_create', true)" class="float-right dark:bg-gray-800 text-blue-500 bg-blue-100 border border-blue-500 shadow-md hover:shadow-blue-400 hover:bg-blue-400 hover:text-white">
        <i class="fa fa-solid fa-plus"> Nueva Cotización</i>
    </x-secondary-button>

    <x-dialog-modal wire:model="open_create">
        <x-slot name="title">
            <h2 class="mt-3 text-2xl text-center">Crear Cotización</h2>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="saveQuotation">
                <!-- Proyecto -->
                <div class="mb-4">
                    <label for="project_id" class="block text-sm font-medium text-gray-700">Proyecto</label>
                    <select wire:model="project_id" id="project_id" name="project_id" class="mt-1 block w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @error('project_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Cliente -->
                <div class="mb-4">
                    <label for="client_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                    <select wire:model="client_id" id="client_id" name="client_id" class="mt-1 block w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                    @error('client_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Fecha de cotización -->
                <div class="mb-4">
                    <label for="quotation_date" class="block text-sm font-medium text-gray-700">Fecha de Cotización</label>
                    <input type="date" wire:model="quotation_date" id="quotation_date" name="quotation_date" class="mt-1 block w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    @error('quotation_date') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Periodo de validez -->
                <div class="mb-4">
                    <label for="validity_period" class="block text-sm font-medium text-gray-700">Periodo de Validez (días)</label>
                    <input type="number" wire:model="validity_period" id="validity_period" name="validity_period" class="mt-1 block w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    @error('validity_period') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Monto total de la cotización -->
                <div class="mb-4">
                    <label for="total_quotation_amount" class="block text-sm font-medium text-gray-700">Monto Total de la Cotización</label>
                    <input type="number" wire:model="total_quotation_amount" id="total_quotation_amount" name="total_quotation_amount" class="mt-1 block w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    @error('total_quotation_amount') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <x-slot name="footer">
                    <div class="mx-auto">
                        <x-secondary-button wire:click="$set('open_create', false)" class="mr-4 text-gray-500 border border-gray-500 shadow-lg hover:shadow-gray-400">
                            Cancelar
                        </x-secondary-button>
                        <x-secondary-button class="text-green-500 border border-green-500 shadow-lg hover:shadow-green-400 disabled:opacity-25" wire:click="saveQuotation" wire:loading.attr="disabled">
                            Guardar
                        </x-secondary-button>
                    </div>
                </x-slot>
            </form>
        </x-slot>
    </x-dialog-modal>
</div>
