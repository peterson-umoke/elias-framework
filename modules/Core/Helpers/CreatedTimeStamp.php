<?php


namespace Modules\Core\Helpers;


use Carbon\Carbon;

trait CreatedTimeStamp
{
    /**
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::now()->diffInDays(Carbon::parse($value)->addMonth()) <= 20 ? Carbon::parse($value)->format("d-m-Y") : Carbon::parse($value)->diffForHumans();
    }
}
