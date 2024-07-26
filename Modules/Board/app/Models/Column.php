<?php

namespace Modules\Board\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Column extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['column_name'];

    public function getValidationRules()
    {
        // Define validation rules if necessary
    }

    public function sprintBacklogs()
    {
        return $this->hasMany(SprintBacklog::class, 'column_id');
    }
}
