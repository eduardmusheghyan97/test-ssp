<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

/**
 * Class Subscriber
 * @property string $email
 *
 */
class Subscriber extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['email'];

    public function websites(): BelongsToMany
    {
        return $this->belongsToMany(Website::class, 'subscriber_website', 'subscriber_id', 'website_id');
    }
}
