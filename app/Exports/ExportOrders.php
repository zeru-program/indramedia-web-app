<?php

namespace App\Exports;

use App\Models\Orders;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class ExportOrders implements FromCollection, WithCustomStartCell, WithEvents
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
                $sheet->setCellValue('B2', 'Id Pesanan');
                $sheet->setCellValue('C2', 'Nama Pemesan');
                $sheet->setCellValue('D2', 'Nomor Telp Pemesan');
                $sheet->setCellValue('E2', 'Alamat Pemesan');
                $sheet->setCellValue('F2', 'Nama Produk');
                $sheet->setCellValue('G2', 'Brand Produk');
                $sheet->setCellValue('H2', 'Jumlah');
                $sheet->setCellValue('I2', 'Motede Pengiriman');
                $sheet->setCellValue('J2', 'Motede Pembayaran');
                $sheet->setCellValue('K2', 'Total Harga');
                $sheet->setCellValue('L2', 'Status');
                $sheet->setCellValue('M2', 'Dibuat Pada');

                // title table
                $sheet->setCellValue('A1', 'REKAP DATA ORDERS');
                $sheet->mergeCells('A1:M1'); // Merge cells from A1 to M1
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
                $event->sheet->getDelegate()->getStyle('A2:M2')->applyFromArray([
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
                $rowCount = Orders::count() + 2; // +2 to account for the header row

                // menerapkan text align center untuk row data
                $sheet->getDelegate()->getStyle('A3:M' . $rowCount)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
    
                // auto width
                foreach (range('A', 'M') as $column) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }

    public function collection()
    {
        $data = Orders::orderBy('created_at', 'desc')->get();
        // return $data;
        return $data->map(function ($order, $index) {
            return [
                '#' => $index + 1,
                'Id Pesanan' => $order->order_id,
                'Nama Pemesan' => $order->order_name,
                'Nomor Telp Pemesan' => $order->order_phone,
                'Alamat Pemesan' => $order->order_phone,
                'Nama Produk' => $order->product_name,
                'Brand Produk' => $order->product_brand,
                'Jumlah' => $order->product_amount,
                'Motede Pengiriman' => $order->product_delivery,
                'Motede Pembayaran' => $order->product_payment_method,
                'Total Harga' => $order->product_price_totals,
                'Status' => $order->status,
                'Dibuat Pada' => $order->created_at,
            ];
        });
    }
}
