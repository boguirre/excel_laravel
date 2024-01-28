<?php

namespace App\Http\Controllers;

use App\Imports\InvoiceImport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class InvoiceController extends Controller
{
    public function export()
    {
        return view('invoices.export');
    }

    public function import()
    {
        return view('invoices.import');
    }

    public function importStore(Request $request)
    {
        // return Carbon::createFromFormat('d/m/Y', '04/02/2023');

        $request->validate([
            'file' => 'required|mimes:csv,xlsx',
        ]);

        $file = $request->file('file');

        Excel::import(new InvoiceImport, $file);

        return 'se importo correctamente';

    }
}
