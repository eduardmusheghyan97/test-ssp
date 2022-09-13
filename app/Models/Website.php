<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Website extends Model
{
    use HasFactory, Notifiable;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['subscribers'];

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'subscriber_website', 'website_id', 'subscriber_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
