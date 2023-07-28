<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayatbansos extends Model
{
    use HasFactory;
    protected $table = 'riwayat_bansos';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengajuanbansos()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_bansos_id');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
