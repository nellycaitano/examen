<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeProjet',
        'nomProjet',
        'dateLancement',
        'duree',
        'localite_id',
    ];

    public function localite()
    {
        return $this->belongsTo(Localite::class, 'localite_id', 'codLocalite');
    }

}
