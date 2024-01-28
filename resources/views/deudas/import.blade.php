<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Importar Excel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('deudas.importStore') }}" method="POST" class="bg-white rounded p-8 shadow"
                enctype="multipart/form-data">
                @csrf

                <x-jet-validation-errors class="mb-4" />

                <div>
                    <h1 class="text-xl font-semibold mb-4">Por favor selecciones el archivo que quiere importar</h1>
                    <input type="file" name="file" accept=".csv, .xlsx">
                </div>
                <x-jet-button class="mt-4">
                    importar archivo
                </x-jet-button>
            </form>

        </div>
    </div>
</x-app-layout>
