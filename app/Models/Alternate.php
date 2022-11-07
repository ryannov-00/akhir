<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alternate extends Model
{
    use HasFactory;

    public  $incrementing = false;
    protected $guarded = '';

    public function allData()
    {
        return DB::table('alternates')
            ->join('alternatif', 'alternatif.kode_alternatif', '=', 'alternates.kode_alternatif')
            ->join('kriteria', 'kriteria.kode_kriteria', '=', 'alternates.kode_kriteria')
            ->join('crips', 'crips.kode_crips', '=', 'alternates.kode_crips')
            ->first();
    }

    // Relationship to table alternatif
    public function alternatives()
    {
        return $this->hasMany(Alternatif::class, 'kode_alternatif', 'kode_alternatif');
    }

    // Relationship to table kriteria
    public function criterias()
    {
        return $this->hasMany(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }

    // Relationship to table Crips
    public function crips()
    {
        return $this->hasMany(Kriteria::class, 'kode_crips', 'kode_crips');
    }
}
