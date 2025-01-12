<?php

namespace App\Imports;

use App\Models\Products;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportProducts implements ToModel, WithStartRow
{
    protected $errors = []; // Simpan kesalahan

    /**
     * Tentukan baris awal data (start row).
     * @return int
     */
    public function startRow(): int
    {
        return 3; // Data dimulai dari baris ke-3
    }

    /**
     * Map setiap baris data ke model Products.
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            Log::info("Processing row: ", $row);

            // Abaikan baris jika SKU kosong
            if (is_null($row[1]) || empty($row[1])) {
                Log::info('Skipping empty SKU row: ', $row);
                return null;
            }
            
            // Periksa apakah SKU sudah ada
            // $existingProduct = Products::where('sku', $row[1])->first()->sku;
            // if ($existingProduct) {
            //     throw new Exception("Duplicate SKU: {$row[1]}");
            // }

            // Buat produk baru
            return new Products([
                'sku'           => $row[1],
                'image_path'    => $row[2] ?? url('/images/new/logo-1.png'),
                'name'          => $row[3],
                'description'   => $row[4],
                'type'          => strtolower($row[5]),
                'category'      => strtolower($row[6]),
                'brand'         => strtolower($row[7]),
                'price'         => floatval($row[8]),
                'stock'         => $row[9] !== null ? intval($row[9]) : 0,
                'is_onefile'    => strtolower($row[10]) === 'ya',
                'is_multiplefile' => strtolower($row[11]) === 'ya',
                'is_populer'    => strtolower($row[12]) === 'ya',
                'is_featured'   => false,
                'is_promo'      => strtolower($row[13]) === 'ya',
                'star'          => 0,
                'reviews'       => 0,
                'status'        => strtolower($row[14]),
            ]);
        } catch (Exception $e) {
            // dd($e->getMessage());
            Log::error("Error importing row: " . $e->getMessage());
            $this->errors[] = [
                'row' => $row,
                'message' => $e->getMessage(),
            ];
            return null; // Skip this row
        }
    }

    /**
     * Dapatkan kesalahan yang terjadi selama impor.
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
