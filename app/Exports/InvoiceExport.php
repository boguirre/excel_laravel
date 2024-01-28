<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InvoiceExport implements FromCollection, WithCustomStartCell, Responsable, WithMapping, WithColumnFormatting, WithHeadings, WithColumnWidths, WithDrawings, WithStyles
{

    use Exportable;

    private $filters;
    private $fileName = 'invoices.xlsx';
    private $writerType = Excel::XLSX;


    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        return Invoice::filter($this->filters)->get();
    }

    public function startCell(): string
    {
        return 'A10';
    }

    public function headings(): array
    {
        return [
            'Serie',
            'Correlativo',
            'Base',
            'IGV',
            'Total',
            'Usuario',
            'Fecha',
        ];
    }

    public function map($invoice): array
    {
        return [
            $invoice->serie,
            $invoice->correlative,
            $invoice->base,
            $invoice->igv,
            $invoice->total,
            $invoice->user->name,
            Date::dateTimeToExcel($invoice->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => 'dd/mm/yyyy'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 10,
            'C' => 10,
            'D' => 10,
            'E' => 10,
            'F' => 30,
            'G' => 15,
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Google Pay');
        $drawing->setDescription('Google Pay');
        $drawing->setPath(public_path('img/logo/logo-g-pay.png'));
        $drawing->setHeight(90);
        $drawing->setWidth(100);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setTitle('Facturas');
        // $sheet->mergeCells('B8:F8');
        // $sheet->setCellValue('B8', 'Bruno Aguirre');

        // $sheet->getStyle('A10:G10')->applyFromArray([
        //     'font' => [
        //         'bold' => true,
        //         'name' => 'Arial',
        //     ],
        //     'alignment' => [
        //         'horizontal' => 'center'
        //     ],
        //     'fill' => [
        //         'fillType' => 'solid',
        //         'startColor' => [
        //             'argb' => 'C5D9F1',
        //         ],
        //     ],
        // ]);

        // $sheet->getStyle('A10:G' . $sheet->getHighestRow())->applyFromArray([
        //     'borders' => [
        //         'allBorders' => [
        //             'borderStyle' => 'thin',
        //             'color' => [
        //                 'argb' => '000000'
        //             ]
        //         ]
        //     ]
        // ]);

        return [
            'A10:G10' => [
                'font' => [
                    'bold' => true,
                    'name' => 'Arial',
                ],
                'alignment' => [
                    'horizontal' => 'center'
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => [
                        'argb' => 'C5D9F1',
                    ],
                ],
            ],

            'A10:G' . $sheet->getHighestRow() => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                        'color' => [
                            'argb' => '000000'
                        ]
                    ]
                ]
            ],

            'A11' => [],
        ];
    }
}
