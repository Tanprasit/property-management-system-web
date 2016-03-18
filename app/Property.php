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

    //Get human readable updated time
    public function getUpdatedAt() {
        return $this->updated_at->diffForHumans();
    }
    
}
