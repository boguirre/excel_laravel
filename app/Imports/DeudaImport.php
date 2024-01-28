<?php

namespace App\Imports;

use App\Models\Deuda;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DeudaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Deuda([
            'nombre_comerciante' => $row[0],
            'nro_documento' => $row[1],
            'nro_puesto' => $row[2],
            'monto_mensual_alquiler' => $row[3],
            'fecha_facturacion' => Carbon::instance(Date::excelToDateTimeObject($row[4])),
            'fecha_pago' => Carbon::instance(Date::excelToDateTimeObject($row[5])),
            'monto_pagado' => $row[6],
            'deuda_pendiente' => $row[7],
            'estado_pago' => $row[8],
        ]);
    }
}
