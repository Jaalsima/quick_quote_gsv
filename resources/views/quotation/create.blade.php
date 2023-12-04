<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Cotización
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Contenido de la Vista General -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Enlaces a Modales -->
                    <div class="flex justify-between mb-4">
                        <button wire:click="openClientModal" class="text-blue-500 hover:underline">Información del Cliente</button>
                        <a href="#system-details-modal" class="text-blue-500 hover:underline">Detalles del Sistema</a>
                        <!-- Agrega más enlaces según sea necesario -->
                    </div>

                    <!-- Contenido Principal -->
                    <p>Texto introductorio u otra información relevante.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Información del Cliente -->
    <div wire:ignore.self wire:key="client-modal" class="modal" x-show="openClientModal" x-cloak>
        <!-- Contenido del Modal: Información del Cliente -->
        <div wire:ignore.self wire:key="client-modal" class="modal" x-show="openClientModal" x-cloak>
            <livewire:quotations.forms.client-form />
        </div>
    </div>

    <!-- Modal: Detalles del Sistema -->
    <div id="system-details-modal" class="modal">
        <!-- Contenido del Modal: Detalles del Sistema -->
        <!-- Incluye un formulario para los detalles del sistema fotovoltaico -->
    </div>
</x-app-layout>
