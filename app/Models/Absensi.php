<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_izin';

    // Define the inverse of the relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }
}
