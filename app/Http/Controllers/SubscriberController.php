<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriberRequest;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function create(CreateSubscriberRequest $request): string
    {
        Subscriber::create($request->all());
        return response()->json(['message' => 'Subscriber created successfully!'],200);
    }

    public function subscribe(SubscribeRequest $request): string
    {
        $subscriber = Subscriber::find($request['subscriber_id']);
        $subscriber->websites()->attach($request['website_id']);
        return response()->json(['message' => 'Successfully subscribed!'],200);
    }
}
