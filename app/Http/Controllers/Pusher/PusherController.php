<?php

namespace App\Http\Controllers\Pusher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App;
use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use Log;
use Pusher\Pusher;

class PusherController extends Controller {

    public function privateChannel(Request $request) {
        if (auth()->check()) {
            $app_key = config('broadcasting.connections.pusher.key');
            $app_secret = config('broadcasting.connections.pusher.secret');

            $string = $request['socket_id'] . ':' . $request['channel_name'];
            $auth = hash_hmac('sha256', $string, $app_secret);
            $auth = $app_key . ':' . $auth;
            $response = ['auth' => $auth];

            if ($response)
                return response()->json($response);
            else
                return response()->json(403);
        } else
            return response()->json(403);
    }

    public function presenceChannel(Request $request) {
        if (auth()->check()) {
            $channel_data = [];
            $user = auth()->user();
            $channel_data['user_id'] = ($user->id) ? $user->id : '';
            $channel_data['name'] = (($user->first_name) ? $user->first_name : '') . ' ' . (($user->last_name) ? $user->last_name : '');
            $channel_data = json_encode($channel_data);

            $app_key = config('broadcasting.connections.pusher.key');
            $app_secret = config('broadcasting.connections.pusher.secret');

            $string = $request['socket_id'] . ':' . $request['channel_name'] . ':' . $channel_data;
            $auth = hash_hmac('sha256', $string, $app_secret);
            $auth = $app_key . ':' . $auth;
            $response = ['auth' => $auth , 'channel_data' => $channel_data];
            if ($response)
                return response()->json($response);
            else
                return response()->json(403);
        } else
            return response()->json(403);
    }
}
