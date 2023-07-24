<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailrumah extends Model
{
    use HasFactory;
    protected $table = 'detail_rumah';
    protected $guarded = ['id'];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
