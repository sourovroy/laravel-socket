<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function store( Request $request )
    {
        $data = $request->validate([
            'receiver_id' => 'exists:users,id',
            'messages'    => 'required|string|max:200',
        ]);

        $message = auth()->user()->messages()->create( $data );

        return response()->json( $message, 201 );
    }

}
