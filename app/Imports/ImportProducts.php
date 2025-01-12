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
    protected $importedCount = 0; // Hitung jumlah produk yang berhasil diimpor

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
            $duplicateEntry = Products::where('sku', $row[1])
                ->first();

            if ($duplicateEntry) {
                // Simpan error duplikasi
                $this->errors[] = [
                    'row' => $row,
                    'message' => "Duplikat SKU Ditemukan: {$row[1]}",
                ];
                return null; // Abaikan baris ini
            }

            $this->importedCount++;

            // Buat produk baru
            return new Products([
                'sku'           => $row[1],
                'image_path'    => $row[2] ?? '/images/new/logo-1.png',
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
            Log::error("Error importing row: " . $e->getMessage());
            $this->errors[] = [
                'row' => $row,
                'message' => $e->getMessage(),
            ];
            return null; // Abaikan baris ini
        }
    }

    /**
     * Dapatkan jumlah produk yang berhasil diimpor.
     * @return int
     */
    public function getImportedCount()
    {
        return $this->importedCount;
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
