<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JsonSerializable;

class Notification extends Model implements JsonSerializable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'title',
        'notes',
        'data'
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    // Get all devices that have this notification
    public function devices() {
        return $this->belongsToMany('App\Device');
    }

    public function jsonSerializable() {
        return [
            'title' => $this->title,
            'notes' => $this->notes,
            'data' => $this->data
        ];
    }

    //Get human readable updated time
    public function getUpdatedAt() {
        return $this->updated_at->diffForHumans();
    }
}
