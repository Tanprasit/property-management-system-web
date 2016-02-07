<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model',
        'manufactorer',
        'product',
        'sdk_version',
        'serial_number',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    // Polymorphic relationship for users
    public function users() {
        return $this->morphedByMany('App\User', 'deviceable');
    }

    // Polymorphic relationship for properties
    public function properties() {
        return $this->morphedByMany('App\Property', 'deviceable');
    }    

    // Get all notifications that belongs to this device
    public function notifications() {
        return $this->belongsToMany('App\Notification');
    }
}
