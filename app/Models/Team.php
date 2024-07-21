<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the owner of the team
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    /**
     * Get the users that belong to the team
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the projects that belong to the team
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get the customers that belong to the team
     */
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }


}
