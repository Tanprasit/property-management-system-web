<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JsonSerializable;

class Device extends Model implements JsonSerializable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model',
        'manufacturer',
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

    public function JsonSerializable() {
        return [
            'id' => $this->id,
            'model' => $this->model,
            'manufactorer' => $this->manufacturer,
            'product' => $this->product,
            'sdk_version' => $this->sdk_version,
            'serial_number' => $this->serial_number,
            'notificationsList' => $this->notifications()->get()
        ];
    }
}
