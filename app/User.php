<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relation with `Message` model
     */
    public function messages()
    {
        return $this->hasMany( Message::class, 'owner_id' );
    }

    /**
     * Get messages of a receiver
     */
    public function getMessagesByReceiverId( $receiverId, $limit = 20 )
    {
        return $this->messages()
                    ->where( 'receiver_id', '=', $receiverId )
                    ->limit( $limit )
                    ->orderBy( 'id', 'desc' )
                    ->get();
    }
}
