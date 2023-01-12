<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class, 'id_pembimbing');
    }

    public function getRouteKeyName()
    {
        return 'npm';
    }

    
}
