<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, UuidTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['is_admin', 'can_post', 'registration_progress'];

    public function getIsAdminAttribute(): bool
    {
        return in_array($this->role, ['super_admin', 'admin']);
    }

    public function getCanPostAttribute(): bool
    {
        return in_array($this->role, ['super_admin', 'admin', 'contributor']);
    }

    public function getRegistrationProgressAttribute(): int
    {
        return isset($this->email_verified_at)
            ? ($this->categories->count() ? 4 : 3)
            : 2;
    }

    public function avatar($type = 'letter'): string
    {
        return $this->avatar ?? $type === 'letter' ? "https://ui-avatars.com/api/?name={$this->username}&size=128&format=svg&background=005A5D&color=ffffff&font-size=0.4" : "https://i.pravatar.cc/300?u={$this->email}";
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subscriptions()
    {
        return $this->belongsToMany(User::class, 'user_subscription', 'subscriber_id', 'user_id');
    }
}
