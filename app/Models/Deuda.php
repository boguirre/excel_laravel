<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Scopes

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['nroDocumento'] ?? null, function($query, $nroDocumento){
            $query->where('nro_documento','LIKE', "%$nroDocumento%");
        })->when($filters['dateFacturacion'] ?? null, function($query, $dateFacturacion){
            $query->where('fecha_facturacion', $dateFacturacion);
        })->when($filters['datePago'] ?? null, function($query, $datePago){
            $query->where('fecha_pago', $datePago);
        })->when($filters['estadoPago'] ?? null, function($query, $estadoPago){
            $query->where('estado_pago', $estadoPago);
        });
    }
}
