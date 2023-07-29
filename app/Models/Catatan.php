<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;
    protected $table = 'catatan';
    protected $guarded = ['id'];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
