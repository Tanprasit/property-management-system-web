<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'mobile',
        'password',
        'status',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'status',
    ];

    // Get devices for current user.
    public function devices() {
        return $this->morphToMany('App\Device', 'deviceable');
    }

    // Get keys that belongs to current user.
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
            'fullName' => $this->full_name,
            'email' => $this->email,
            'status' => $this->status,
            'mobile' => $this->mobile,
            'keys' => $this->getKeysForApi(),
        ];
    }

    public function getKeysForApi() {
        $keys  = $this->keys()->get();

        $keyList = [];

        foreach ($keys as $key) {
            # code...
            $keyList[] = $key->jsonSerializable();
        }

        return $keyList;
    }
}
