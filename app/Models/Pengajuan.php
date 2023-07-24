<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_bansos';
    protected $guarded = ['id'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function detailrumah()
    {
        return $this->hasOne(Detailrumah::class);
    }

    public function jenisBansos()
    {
        return $this->belongsTo(Jenisbansos::class);
    }
}
