<?php

namespace App\Models;

use App\Models\Crips;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    // protected $primaryKey = 'kode_kriteria';
    // public  $incrementing = false;
    // protected $guarded = '';
    public function subKriteria() {
        return $this->hasMany(SubKriteria::class);
    }
}
