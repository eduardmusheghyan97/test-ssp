<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriberRequest;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function create(CreateSubscriberRequest $request): string
    {
        Subscriber::create($request);
        return 'Subscriber created successfully!';
    }

    public function subscribe(SubscribeRequest $request): string
    {
        Subscriber::subscribe($request['subscriber_id'], $request['website_id']);
        return 'Successfully subscribed!';
    }
}
