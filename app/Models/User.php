<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * The teams the user owns
     */
    public function ownedTeams()
    {
        return $this->hasMany(Team::class, 'owner_id');
    }

    /**
     * The teams the user is in
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * The projects the user owns
     */
    public function ownedProjects()
    {
        return $this->hasMany(Project::class, 'created_by_id');
    }

    /**
     * The projects the user is in
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * The tasks the user is assigned to
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    /**
     * Get the notifications for the user
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Get the user's settings
     */
    public function settings()
    {
        return $this->hasMany(Setting::class);
    }

    /**
     * Get the user's comments
     */
    public function comments()
    {
        return $this->hasMany(TaskComment::class);
    }

    /**
     * Get the user's active team
     * It is found as a Setting, under the key 'active_team_id'
     */
    public function activeTeam()
    {
        $active_team_id = $this->settings()->where('key', 'active_team_id')->where('user_id', $this->id)->first();

        return $this->ownedTeams()->where('id', $active_team_id->value)->first();
    }
}
