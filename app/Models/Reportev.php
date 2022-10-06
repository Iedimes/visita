<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reportev extends Model
{
    protected $table = 'reportev';

    protected $fillable = [
        'inicio',
        'fin',
    
    ];
    
    
    protected $dates = [
        'inicio',
        'fin',
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/reportevs/'.$this->getKey());
    }
}
