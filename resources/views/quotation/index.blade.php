<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Cotizaciones
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Botón para redireccionar a la vista de creación -->
                <a href="{{ route('quotations.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block my-4">Nueva Cotización</a>

                <!-- Contenido de la Lista de Cotizaciones -->
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($quotations) > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cliente
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha de Creación
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Ver</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($quotations as $quotation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $quotation->client_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $quotation->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('quotations.show', ['id' => $quotation->id]) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No hay cotizaciones disponibles.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
