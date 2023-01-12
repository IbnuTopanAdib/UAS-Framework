<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function getRouteKeyName()
    {
        return 'nidn';
    }
}
