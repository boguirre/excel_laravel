<div>
    {{-- Filtros --}}
    <div class="bg-white rounded p-8 mb-6 shadow">
        <h2 class="text-2xl font-semibold mb-4">Listado de Deudas</h2>

        <div class="mb-4">
            Estado de Pago:
            <select wire:model="filters.estadoPago" name="estadoPago"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-32">
                <option value="" disabled selected>Escoger</option>
                <option value="PAGADO">PAGADO</option>
                <option value="PENDIENTE">PENDIENTE</option>
            </select>
        </div>

        <div class="flex space-x-4 mb-4">
            <div>
                N° de Documento:
                <x-jet-input wire:model="filters.nroDocumento" type="text" class="w-full" />
            </div>
            {{-- <div>
                Hasta el N°:
                <x-jet-input wire:model="filters.toNumber" type="text" class="w-20" />
            </div> --}}
        </div>

        <div class="flex space-x-4 mb-4">
            <div>
                Fecha de Facturacion:
                <x-jet-input wire:model="filters.dateFacturacion" type="date" class="w-36" />
            </div>
            <div>
                Fecha de Pago:
                <x-jet-input wire:model="filters.datePago" type="date" class="w-36" />
            </div>
        </div>

        {{-- <x-jet-button wire:click="generateReport">Generar Reporte</x-jet-button> --}}
    </div>

    {{-- Tabla --}}
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre del Comerciante
                    </th>
                    <th scope="col" class="px-6 py-3">
                        N° de Documento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        N° Puesto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Monto del Alquiler Mensual
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha Facturacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de Pago
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Monto Pagado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deuda Pendiente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado del Pago
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deudas as $deuda)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $deuda->id }}
                            <x-jet-checkbox class="ml-2" wire:model="checkboxEstados.{{ $deuda->id }}" wire:click="toggleEstadoPago({{ $deuda->id }})"/>
                        </th>
                        <td class="px-6 py-4">
                            {{ $deuda->nombre_comerciante }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deuda->nro_documento }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deuda->nro_puesto }}
                        </td>
                        <td class="px-6 py-4">
                            S/ {{ $deuda->monto_mensual_alquiler }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deuda->fecha_facturacion }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $deuda->fecha_pago }}
                        </td>
                        <td class="px-6 py-4">
                            S/{{ $deuda->monto_pagado }}
                        </td>
                        <td class="px-6 py-4">
                            S/ {{ $deuda->deuda_pendiente }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($deuda->estado_pago == 'PAGADO')
                                <p class="text-green-600 font-semibold"> {{ $deuda->estado_pago }}</p>
                            @else
                                <p class="text-red-600 font-semibold"> {{ $deuda->estado_pago }}</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $deudas->links() }}
    </div>
</div>
