<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayatbansos extends Model
{
    use HasFactory;
    protected $table = 'riwayat_bansos';
    protected $guarded = ['id'];
}
