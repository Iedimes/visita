<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Visit extends Model implements Auditable
{
    protected $fillable = [
        'CI',
        'Full_Name',
        'First_Surname',
        'Second_Surname',
        'Married_Surname',
        'First_Name',
        'Second_Name',
        'Reason',
        'Observation',
        'Entry_Datetime',
        'Exit_Datetime',
        'state_id',
        'dependency_id',

    ];


    protected $dates = [
        'Entry_Datetime',
        'Exit_Datetime',
        'created_at',
        'updated_at',

    ];

    use AuditableTrait;

    protected $guarded = [];

    protected $appends = ['resource_url'];
    protected $with = ['state','dependency'];


    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/visits/'.$this->getKey());
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');

    }
    public function dependency()
    {
        return $this->belongsTo('App\Models\Dependency');

    }
}
