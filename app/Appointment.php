<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Asdfx\LaravelFullcalendar\Event;
use Illuminate\Database\Eloquent\SoftDeletes;


class Appointment extends Model implements Event{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid', 'serviceid','appointment_status' ,'detail' , 'to' , 'from' , 'comment' ,'is_active','detailcolor' ,'status'
    ];
    public function user(){
        return $this->belongsTo('App\User', 'userid', 'id')->withDefault();
    }
    public function service(){
        return $this->belongsTo('App\Service', 'serviceid', 'id')->withDefault();
    }
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }
    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->detail;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->to;
    }
    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->from;
    }

}
