<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            //'id_user' => $this->id_user,
            'addedBy' => $this->whenLoaded('voucher'),
            'namaVoucher' => $this->namaVoucher,
            'harga' => $this->harga,
            'quantity' => $this->quantity,
            'terjual' => $this->terjual,
            'catatan' => $this->catatan,
            'created_at' => date_format($this->created_at, 'Y-m-d H:i:s'),
            'updated_at' => date_format($this->created_at, 'Y-m-d H:i:s')

        ];
    }
}
