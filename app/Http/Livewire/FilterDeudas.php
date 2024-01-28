<?php

namespace App\Http\Livewire;

use App\Models\Deuda;
use Livewire\Component;
use Livewire\WithPagination;

class FilterDeudas extends Component
{
    use WithPagination;

    public $checkboxEstados = [];

    public $filters = [
        'estadoPago' => '',
        'nroDocumento' => '',
        'dateFacturacion' => '',
        'datePago' => ''
    ];

    public function mount()
    {
        // Inicializar el array $checkboxEstados con los estados actuales de todas las deudas
        $deudas = Deuda::all();
        foreach ($deudas as $deuda) {
            $this->checkboxEstados[$deuda->id] = $deuda->estado_pago === 'PAGADO';
        }
    }

    public function toggleEstadoPago($deudaId)
    {
        // Cambiar el estado de pago según la lógica de tu aplicación
        $deuda = Deuda::find($deudaId);
        $deuda->update(['estado_pago' => $this->checkboxEstados[$deudaId] ? 'PAGADO' : 'PENDIENTE']);

        // Actualizar el array $checkboxEstados después de cambiar el estado
        $this->render();
    }

    public function render()
    {
        $deudas = Deuda::filter($this->filters)->paginate(10);

        return view('livewire.filter-deudas', compact('deudas'));
    }
}
