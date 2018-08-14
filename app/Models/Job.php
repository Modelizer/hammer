<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'service_id',
        'location_id',
        'title',
        'description',
        'end_date',
        'zipcode'
    ];

    /**
     * @param $endDate
     */
    public function setEndDateAttribute($endDate)
    {
        $this->attributes['end_date'] = Carbon::parse($endDate)->format('Y-m-d H:i:s');
    }

    /**
     * @return string
     */
    public function getEndDateAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->format('d-m-Y');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
