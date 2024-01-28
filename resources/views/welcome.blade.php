<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white rounded p-8 mb-6 shadow">
                    <h2 class="text-2xl font-semibold mb-4">Consultar Deudas</h2>
                    <form action="" method="post">
                        @csrf
                        <div class="flex space-x-4 mb-4">
                            <div>
                                Ingresar N° de Documento
                                <x-jet-input name="nro_documento" type="text" class="w-full" />
                            </div>
                        </div>

                        <x-jet-button>Consultar Deuda</x-jet-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
