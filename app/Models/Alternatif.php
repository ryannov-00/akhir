<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatif';
    protected $fillable = ['kode', 'nama'];

    public function alternatifKriteria()
    {
        return $this->hasMany(AlternatifKriteria::class)->orderBy('kriteria_id', 'ASC');
    }
}
