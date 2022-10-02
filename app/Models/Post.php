<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use UuidTrait;
    use SoftDeletes;

    protected $guarded = [];
    protected $appends = ['likes_count'];

    protected $casts = ['tags' => 'array'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->whereVote(true)->count() - $this->likes()->whereVote(false)->count();
    }
}
