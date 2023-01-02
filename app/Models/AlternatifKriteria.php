<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlternatifKriteria extends Model
{
    use HasFactory;
    protected $table = 'alternatif_kriteria';

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
