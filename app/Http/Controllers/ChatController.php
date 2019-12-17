<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ChatController extends Controller
{

    /**
     * Show chat messages.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Send message
     */
    public function send( Request $request )
    {
        $data = $request->validate( [
            'message' => 'required|string'
        ] );

        event( new SendMessage( $data['message'] ) );

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Get messages
     */
    public function getMessages( Request $request, $receiver_id )
    {
        return $request->user()->getMessagesByReceiverId( $receiver_id );
    }

}
