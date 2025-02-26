<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\SendRequest;
class SendController extends Controller
{
    public function send(SendRequest $request)
    {
        $request->validated();
        $redis = Redis::connection();
        $record = json_decode($redis->get('1')) ;
        $record[] = [
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'description' => $request->input('description')
        ];
        $redis->set('1',json_encode($record));
        return json_decode($redis->get('1'));
    }
}
