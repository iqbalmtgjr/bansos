<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class Penduduk extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = 'penduduk';
    protected $guarded = ['id'];

    public function routeNotificationForVonage(Notification $notification): string
    {
        return "+62" . $this->no_hp;
    }

    public function pengajuan()
    {
        return $this->hasOne(Pengajuan::class);
    }

    public function riwayat()
    {
        return $this->hasOne(Riwayatbansos::class);
    }
}
