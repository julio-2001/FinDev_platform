<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

##Models
use App\Models\Experiences;

class Candidates extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'profissao',
        'experience',
        'location',
    ];

    public function experiencesName()
    {
        return $this->belongsTo(Experiences::class, 'experience');
    }
}
