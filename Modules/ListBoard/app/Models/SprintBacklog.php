<?php

namespace Modules\ListBoard\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SprintBacklog extends Model
{
    use HasFactory;

    protected $table = 'sprint_backlogs';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'type',
        'column_id',
        'assigned_to',
        'start_date',
        'end_date'
    ];
    
    public function column()
    {   
        return $this->belongsTo(Column::class);
    }

    /**
     * Get the user that the sprint backlog item is assigned to.
     */
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function getValidationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|in:task,bug,story',
            'column_id' => 'required|exists:columns,id',
            'assigned_to' => 'nullable|exists:users,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ];
    }
}
