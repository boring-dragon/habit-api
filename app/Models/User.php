<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'type',
        'email_verified_at',
        'character_id',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'full_name',
        'current_mood',
        'character_img'

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the user's current mood.
     *
     * @return string
     */
    public function getCurrentMoodAttribute(): ?string
    {
        return $this->mood_checkings()->whereDate('created_at', today())->latest()->first()?->type;
    }

    public function getCharacterImgAttribute(): ?string
    {
        return $this->character ? "https://robohash.org/". $this->character->image_path: "https://robohash.org/default";
    }

    public function habbits(): HasMany
    {
        return $this->hasMany(Habbit::class);
    }

    public function mood_checkings(): HasMany
    {
        return $this->hasMany(MoodChecking::class);
    }

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class)->withTimestamps();
    }

    public function character(): HasOne
    {
        return $this->hasOne(Character::class, 'id', 'character_id');
    }

    public function wallet() : HasOne
    {
        return $this->hasOne(Wallet::class);
    }
}
