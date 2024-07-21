<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the task that the comment belongs to
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * Get the user that the comment belongs to
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
