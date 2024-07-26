<?php

namespace Modules\Board\Models;

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

    public function columns()
    {
        return $this->belongsTo(Column::class, 'column_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function getValidationRules()
    {
        // Define validation rules if necessary
    }
}
