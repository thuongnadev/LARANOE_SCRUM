<?php

namespace Modules\ListBoard\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Column extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['column_name'];
    
    public function sprintBacklogs()
    {
        return $this->hasMany(SprintBacklog::class);
    }
    public function getValidationRules()
    {
        return [
            'column_name' => 'required|string|max:255|unique:columns,column_name',
        ];
    }
}
