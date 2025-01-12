<?php

namespace App\Exports;

use App\Models\Orders;
use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class ExportProducts implements FromCollection, WithCustomStartCell, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function startCell(): string
    {
        // start data dari col 3
        return 'A3';
    }

    
    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function (AfterSheet $event) {
                /** @var Sheet $sheet */
                $sheet = $event->sheet;
                $sheet->setCellValue('A2', '#');
                $sheet->setCellValue('B2', 'SKU');
                $sheet->setCellValue('C2', 'Nama Produk');
                $sheet->setCellValue('D2', 'Harga');
                $sheet->setCellValue('E2', 'Produk Hanya 1 File');
                $sheet->setCellValue('F2', 'Produk Lebih Dari 1 File');
                $sheet->setCellValue('G2', 'Type');
                $sheet->setCellValue('H2', 'Category');
                $sheet->setCellValue('I2', 'Brand');
                $sheet->setCellValue('J2', 'Jumlah Rating');
                $sheet->setCellValue('K2', 'Jumlah Ulasan');
                $sheet->setCellValue('L2', 'Stock');
                $sheet->setCellValue('M2', 'Populer');
                $sheet->setCellValue('N2', 'Promo');
                $sheet->setCellValue('O2', 'Status');
                $sheet->setCellValue('P2', 'Dibuat Pada');

                // title table
                $sheet->setCellValue('A1', 'REKAP DATA PRODUK');
                $sheet->mergeCells('A1:P1'); // Merge cells from A1 to M1
                $sheet->getDelegate()->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16, // Adjust font size if needed
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);    

                // style backgroound font dl untuk header table 
                $event->sheet->getDelegate()->getStyle('A2:P2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'], // White text
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '4CAF50'], // Green background
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                 // mengambil total data
                $rowCount = Products::count() + 2; // +2 to account for the header row

                // menerapkan text align center untuk row data
                $sheet->getDelegate()->getStyle('A3:P' . $rowCount)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
    
                // auto width
                foreach (range('A', 'P') as $column) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }

    public function collection()
    {
        $data = Products::orderBy('created_at', 'desc')->get();
        // return $data;
        return $data->map(function ($data, $index) {
            $reviews =  (string)$data->reviews;
            $stock =  (string)$data->stock;
            $rating =  (string)$data->star;
            return [
                '#' => $index + 1,
                'SKU' => $data->sku, 
                'Nama Produk' => $data->name,
                'Harga' => $data->price,
                'Produk Hanya 1 File' => $data->is_onefile ? 'Ya' : 'Tidak',
                'Produk Lebih Dari 1 File' => $data->is_file ? 'Ya' : 'Tidak',
                'Type' => $data->type,
                'Category' => $data->category,
                'Brand' => $data->brand,
                'Jumlah Rating' => $rating !== "0" ? $rating : "0",
                'Jumlah Ulasan' => $reviews !== "0" ? $reviews : "0",
                'Stock' =>  $stock !== "0" ? $stock : "0",
                'Populer' => $data->is_populer ? 'Ya' : 'Tidak',
                'Promo' => $data->is_promo ? 'Ya' : 'Tidak',
                'Status' => $data->status,
                'Dibuat Pada' => $data->created_at,
            ];
        });
    }
}
