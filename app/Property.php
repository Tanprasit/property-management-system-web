<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'city',
        'county',
        'postcode',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    // Get all devices that belongs to a property.
    public function devices() {
        return $this->morphToMany('App\Device', 'deviceable');
    }

    // Get keys that belongs to this property.
    public function keys() {
        return $this->hasMany('App\Key');
    }

    //Get human readable updated time
    public function getUpdatedAt() {
        return $this->updated_at->diffForHumans();
    }

    public function jsonSerializable() {
        return [
            'id' => $this->id,
            'addressLine1' => $this->address_line_1,
            'addressLine2' => $this->address_line_2,
            'city' => $this->city,
            'county' => $this->county,
            'postcode' =>$this->postcode
        ];
    }
}
