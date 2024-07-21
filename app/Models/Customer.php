<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the team that the customer belongs to
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the custom fields for the customer
     */
    public function customFields()
    {
        return $this->hasMany(CustomerCustomField::class);
    }

    /**
     * Get the projects that belong to the customer
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
