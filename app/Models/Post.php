<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory, Notifiable;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['website'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public static function create($request, $websiteID)
    {
        $post = new Post();
        $post['title'] = $request['title'];
        $post['description'] = $request['description'];
        $post['website_id'] = $websiteID;
        $post['notified'] = false;
        $post->save();
    }

    public static function setPostNotified($id)
    {
        $post = static::find($id);
        $post['notified'] = true;
    }
}
