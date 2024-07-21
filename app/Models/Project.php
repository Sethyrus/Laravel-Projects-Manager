<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the owner of the project
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    /**
     * Get the team that the project belongs to
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the customer that the project belongs to
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the tasks that belong to the project
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the tasks statuses that belong to the project
     */
    public function taskStatuses()
    {
        return $this->hasMany(TaskStatus::class);
    }
}
