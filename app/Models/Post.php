<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

/**
 * Class Post
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $website_id
 * @property boolean $notified
 * @property int $notified_subscribers_count
 */

class Post extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['title', 'description', 'website_id', 'notified', 'notified_subscribers_count'];

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
