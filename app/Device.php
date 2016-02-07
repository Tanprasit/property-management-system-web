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

    // Polymorphic relationship for users and properties
    public function deviceable() {
        return $this->morphTo();
    }

    // Get all notifications that belongs to this device
    public function notifications() {
        return $this->belongsToMany('app/Notifications');
    }
}
