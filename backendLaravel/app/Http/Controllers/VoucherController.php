<?php

namespace App\Http\Controllers;

use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function index()
    {
        $voucher = Voucher::with(['voucher:id,username'])->get();

        return VoucherResource::collection($voucher);
    }

    public function store(Request $request)
    {
        $auth = Auth::user()->role;
        $request->validate([
            'namaVoucher' => 'required',
            'harga' => 'required|numeric',
            'quantity' => 'required|numeric',
            'terjual' => 'numeric',
            'catatan' => 'max:225'
        ]);

        if ($auth == "Toko Admin") {
            $request['id_user'] = auth()->user()->id;

            $voucher = Voucher::create($request->all());

            return new VoucherResource($voucher->loadMissing(['voucher:id,username']));
        }
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'namaVoucher' => 'required',
            'harga' => 'required|numeric',
            'quantity' => 'required|numeric',
            'terjual' => 'numeric',
            'catatan' => 'max:225'
        ]);

        $voucher = Voucher::findOrFail($id);
        $voucher->update($data);

        return new VoucherResource($voucher);
    }

    public function destroy($id)
    {
        $auth = Auth::user()->role;
        if ($auth == "Toko Admin") {
            $voucher = Voucher::findOrFail($id);
            $voucher->delete();

            $data = new VoucherResource($voucher);

            return response()->json([
                "message" => "Successfull Deleted Data",
                "namaVoucher" => $data['namaVoucher']
            ]);
        }
    }
}
