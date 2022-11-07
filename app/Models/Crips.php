<?php

namespace App\Models;

use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Crips extends Model
{
    use HasFactory;
    protected $table = 'crips';
    protected $primaryKey = 'kode_crips';
    public  $incrementing = false;
    protected $guarded = '';


    public function kriteria()
    {
        return $this->hasMany(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }
}
