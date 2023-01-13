<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aksesoris extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the aksesoris that owns the Aksesoris
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aksesoris(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
