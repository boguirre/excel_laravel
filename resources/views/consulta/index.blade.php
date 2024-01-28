<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>

                <div class="bg-white rounded p-8 mb-6 shadow">
                    <h2 class="text-2xl font-semibold mb-4">Consultar Deudas</h2>
                    <form id="search-form" method="GET" action="{{ route('deudas.consulta') }}">
                        <div class="flex space-x-4 mb-4">
                            <div>
                                Ingresar N° de Documento
                                <x-jet-input name="search" id="search-input" type="text" class="w-full" />
                            </div>
                        </div>

                        <x-jet-button>Consultar Deuda</x-jet-button>
                    </form>
                </div>

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
                            @if (request()->filled('search'))
                                @foreach ($deudas as $deuda)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $deuda->id }}
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
                            @else
                            @endif
                        </tbody>
                    </table>
                </div>

                @if (request()->filled('search'))
                <div class="mt-4">
                    {{ $deudas->links() }}
                </div>
                @else
                    
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
