<?php

namespace App\Http\Controllers;

use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $voucher = Voucher::with(['voucher:id,username'])->get();

        return VoucherResource::collection($voucher);
    }

    public function store(Request $request)
    {
    }
}
