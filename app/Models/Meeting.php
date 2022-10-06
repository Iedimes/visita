<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Meeting extends Model implements Auditable
{
    protected $fillable = [
        'CI',
        'Names',
        'First_Names',
        'Reason',
        'Observation',
        'With_whom',
        'Meeting_Date',
        'Entry_Datetime',
        'Exit_Datetime',
        'state_id',

    ];


    protected $dates = [
        'Meeting_Date',
        'Entry_Datetime',
        'Exit_Datetime',
        'created_at',
        'updated_at',

    ];




        use AuditableTrait;

        protected $guarded = [];


    protected $appends = ['resource_url'];
    protected $with = ['state'];


    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/meetings/'.$this->getKey());
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');

    }
}
