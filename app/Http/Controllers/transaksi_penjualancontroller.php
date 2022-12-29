<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\detail_penjualan;
use App\Models\transaksi_penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transaksi_penjualancontroller extends Controller
{

    public $nota;
    public function index()
    {
        $sales = DB::table('transaksi_penjualans')->select(DB::raw('MAX(id) as NSale'));
        if ($sales->count() > 0) {
            foreach ($sales->get() as $key) {
                $this->nota = ((int) $key->NSale + 1);
            }
        } else {
            $this->nota = 1;
        }

        $date = date('Y-m-d');
        $barangs = barang::all();
        $detail = detail_penjualan::where('transaksi_penjualans_id', $this->nota)->get();

        if ($detail->count() > 0) {
            $total = DB::table('detail_penjualans')->select(DB::raw('SUM(subTotal) as grand_total'))
                ->where('transaksi_penjualans_id', $this->nota)->groupBy('transaksi_penjualans_id')->first();
            $grandTotal = $total->grand_total;
        }
        return view("transaksi.penjualan.sales", [
            'barangs' => $barangs,
            'date' => $date,
            'detail' => $detail,
            'grand_total' => $grandTotal,
        ]);
    }

    public function search(Request $request)
    {
        // $keyword = $request->input('keyword');
        // $barangs = collect([]);
        // if ($keyword) {
        //     $barangs = barang::query()
        //         ->where('no_barang', 'like', "%{$keyword}%")
        //         ->orWhere('name_barang', 'like', "%{$keyword}%")->get();
        // }

        // return view('transaksi.penjualan.sales', compact('barangs'));
    }

    public function storeDetail(Request $request)
    {
        $input = $request->all();

        $transaksiId = $input['id'];
        $qty = $input['qty'];

        transaksi_penjualan::firstOrCreate([
            'id' => $transaksiId,
        ]);

        $barangs = barang::where('no_barang', $input['no_barang'])->get();
        foreach ($barangs as $barang) {
            $barangId = $barang->id;
            $barangName = $barang->name_barang;
            $barangPrice = $barang->harga_jual;
            $barangStock = $barang->stok;
        }

        if (isset($barangId)) {
            return redirect()->back()->withErrors('Produk Tidak Ditemukan');
        }

        $details = detail_penjualan::where([
            ['transaksi_penjualans_id', '=', $transaksiId],
            ['barangs_id', '=', $barangId]
        ])->get();

        $subTotal = $qty * $barangPrice;
        $reduceStock = $barangStock - $qty;

        $stockReduce = [
            'stok' => $reduceStock
        ];

        $request->validate([
            'barangs_id' => 'required',
            'transaksi_penjualans_id' => 'required',
            'qty' => 'required',
            'subTotal' => 'required'
        ]);

        $create = ([
            'barangs_id' => $barangId,
            'transaksi_penjualan_id' => $transaksiId,
            'qty' => $qty,
            'subTotal' => $subTotal,
        ]);

        if ($barangStock == 0) {
            return redirect()->back()->withErrors('Stok' . $barangName . 'Kosong');
        }elseif ((int)$qty <= $barangStock) {
            if ($details->isEmpty()) {
                foreach ($details as $detail) {
                    if ($detail->barangs_id == $barangId) {
                        $update = [
                            'qty' => $detail->qty + $qty,
                            'subTotal' => $detail->subTotal + $subTotal,
                        ];
                        detail_penjualan::findOrFail($detail->id)->update($update);
                        barang::findOrFail($barangId)->update($stockReduce);
                    }else {
                        detail_penjualan::create($create);
                        barang::findOrFail($barangId)->update($stockReduce);
                    }
                    
                }
            }else {
                detail_penjualan::create($create);
                barang::findOrFail($barangId)->update($stockReduce);
            }
        }

       

        

        // $sales = DB::table('transaksi_penjualans')->select(DB::raw('MAX(id) as num'));
        // if ($sales->count() > 0) {
        //     foreach ($sales->get() as $key) {
        //         $no = ((int) $key->num + 1);
        //     }
        // }else {
        //     $no = 1;
        // }

        

        
    }
}