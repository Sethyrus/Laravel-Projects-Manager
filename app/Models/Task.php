<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the project that the task belongs to
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the task status that the task belongs to
     */
    public function status()
    {
        return $this->belongsTo(TaskStatus::class);
    }

    /**
     * Get the users that the task belongs to
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the timings that belong to the task
     */
    public function timings()
    {
        return $this->hasMany(TaskTiming::class);
    }

    /**
     * Get the comments that belong to the task
     */
    public function comments()
    {
        return $this->hasMany(TaskComment::class);
    }

    /**
     * Get the attachments that belong to the task
     */
    public function attachments()
    {
        return $this->hasMany(TaskFile::class);
    }

    /**
     * Get the user that created the task
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
