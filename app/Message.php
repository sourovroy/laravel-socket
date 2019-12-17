<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'owner_id', 'receiver_id', 'messages',
    ];

    /**
     * Get extra own_item attribute
     * @return boolean
     */
    public function getOwnItemAttribute()
    {
        if ( auth()->check() ) {
            return auth()->id() == $this->owner_id;
        }

        return false;
    }

}
