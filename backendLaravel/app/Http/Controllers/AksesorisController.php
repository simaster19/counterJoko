<?php

namespace App\Http\Controllers;

use App\Http\Resources\AksesorisResource;
use App\Models\Aksesoris;
use Illuminate\Http\Request;

class AksesorisController extends Controller
{
    public function index()
    {
        $aksesoris = Aksesoris::with(['aksesoris:id,username'])->get();

        return AksesorisResource::collection($aksesoris);
    }

    public function store(Request $request)
    {
        $auth = auth()->user()->role;
        $request->validate([
            'namaAksesoris' => 'required',
            'jenisAksesoris' => 'required',
            'harga' => 'required|numeric',
            'quantity' => 'required|numeric',
            'terjual' => 'numeric',
            'catatan' => 'max:225'
        ]);

        if ($auth == "Toko Admin") {
            $request['id_user'] = auth()->user()->id;

            $aksesoris = Aksesoris::create($request->all());

            return new AksesorisResource($aksesoris->loadMissing(['aksesoris:id,username']));
        }
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'namaAksesoris' => 'required',
            'jenisAksesoris' => 'required',
            'harga' => 'required|numeric',
            'quantity' => 'required|numeric',
            'terjual' => 'numeric',
            'catatan' => 'max:225'
        ]);

        $aksesoris = Aksesoris::findOrFail($id);
        $aksesoris->update($data);

        return new AksesorisResource($aksesoris);
    }

    public function destroy($id)
    {
        $auth = auth()->user()->role;
        if ($auth == "Toko Admin") {
            $aksesoris = Aksesoris::findOrFail($id);
            $aksesoris->delete();

            $data = new AksesorisResource($aksesoris);

            return response()->json([
                "message" => "Successfull Deleted Data",
                "namaAksesoris" => $data['namaAksesoris']
            ]);
        }
    }
}
