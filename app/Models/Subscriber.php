<?php

namespace App\Models;

use App\Http\Requests\CreateSubscriberRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

/**
 * Class Subscriber
 * @property string $email
 *
 * @property Collection|Website[] $websites
 */
class Subscriber extends Model
{
    use HasFactory, Notifiable;

    public function websites(): BelongsToMany
    {
        return $this->belongsToMany(Website::class, 'subscriber_website', 'subscriber_id', 'website_id');
    }

    public static function create($request)
    {
        $subscriber = new Subscriber();
        $subscriber->email = $request['email'];
        $subscriber->save();
    }

    public static function subscribe($subscriberID, $websiteID)
    {
        $subscriber = static::find($subscriberID);
        $subscriber->websites()->attach($websiteID);
    }

}
