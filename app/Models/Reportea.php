<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reportea extends Model
{
    protected $table = 'reportea';

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
        return url('/admin/reporteas/'.$this->getKey());
    }
}
