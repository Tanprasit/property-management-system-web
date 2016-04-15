<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'taken_at',
        'returned_at',
        'pin',
        'property_id',
        'user_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    // Get property that uses this key.
    public function property() {
        return $this->belongsTo('App\Property', 'property_id');
    }

    // Get contractors who can access this key. 
    public function contractor() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getUpdatedAt() {
        return $this->updated_at->diffForHumans();
    }

    public function jsonSerializable() {
        return [
            'id' => $this->id,
            'takenAt' => $this->taken_at,
            'returnedAt' => $this->returned_at,
            'pin' => $this->pin,
            'property' => $this->property->jsonSerializable(),
            'contractor' =>$this->contractor
        ];
    }
}