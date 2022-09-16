<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

/**
 * Class Website
 * @property string name
 *
 */

class Website extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name'];

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(Subscriber::class, 'subscriber_website', 'website_id', 'subscriber_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

}
