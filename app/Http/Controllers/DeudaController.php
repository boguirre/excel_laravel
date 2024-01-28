<?php

namespace App\Http\Controllers;

use App\Imports\DeudaImport;
use App\Models\Deuda;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DeudaController extends Controller
{
    public function index()
    {
        return view('deudas.index');
    }

    public function consulta(Request $request)
    {
        $query = Deuda::query();
        if ($request->isMethod('get') && $request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('nro_documento', 'LIKE', "%$searchTerm%");
        }

        $deudas = $query->paginate(5);
        return view('consulta.index', compact('deudas'));
    }

    public function import()
    {
        return view('deudas.import');
    }

    public function importStore(Request $request)
    {
        // return Carbon::createFromFormat('d/m/Y', '04/02/2023');

        $request->validate([
            'file' => 'required|mimes:csv,xlsx',
        ], [
            'file.required' => 'Es obligatorio subir en libro de excel.'
        ]);

        $file = $request->file('file');

        Excel::import(new DeudaImport, $file);

        return 'se importo correctamente';
    }
}
