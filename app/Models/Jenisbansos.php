<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisbansos extends Model
{
    use HasFactory;
    protected $table = 'jenis_bansos';
    protected $guarded = ['id'];

    public function pengajuan()
    {
        return $this->hasOne(Pengajuan::class);
    }
}
