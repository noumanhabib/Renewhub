<?php

namespace App\Imports;

use App\Models\RenewPartStatusUpdate;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class TotalRenewPartStatusPriceImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row[0] != "pin") {

            $barcode_id = DB::table('received_parts_barcode_list')
                ->select('received_part_id', 'barcode')->where('barcode', $row[1])->where('iqc_status_one', '1')->where('status', '2')->first();
            if ($barcode_id) {
                session(['barcode_id' => $barcode_id]);

                $price = DB::table('received_purchase_order_parts_list')->find($barcode_id->received_part_id);
                if ($price) {
                    if (session()->has('price')) {
                        session(['price' => $price->price + session('price')]);
                    } else {
                        session(['price' => $price->price]);
                    }
                }
            }

            if ($row[0] != null) {
                if (session()->has('quantity')) {
                    $quantity = session('quantity') + 1;
                } else {
                    $quantity = 1;
                }
                session(['quantity' => $quantity]);
            }
        }
    }
}