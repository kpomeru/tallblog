<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UuidTrait;

    protected $guarded = [];
    protected $appends = ['likes_count'];

    public function post()
    {
        return $this->belongsTo(Post::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
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
