<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

##Models
use App\Models\Experiences;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'title',
        'description',
        'experience',
        'location'
    ];

    public function experiencesName()
    {
        return $this->belongsTo(Experiences::class, 'experience');
    }
}
