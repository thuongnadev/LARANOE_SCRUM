<?php

namespace Modules\Project\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'project_name',
        'description',
        'product_owner_id',
        'scrum_master_id',
        'status',
        'start_date',
        'end_date',
        'estimated_duration',
        'budget',
        'client_name',
        'client_email',
        'repository_url',
        'tags',
        'priority'
    ];

    public function getValidationRules()
    {
        return [
            'project_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_owner_id' => 'required|exists:users,id',
            'scrum_master_id' => 'nullable|exists:users,id',
            'status' => 'required|in:planning,in_progress,on_hold,completed,cancelled',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'estimated_duration' => 'nullable|integer|min:1',
            'budget' => 'nullable|numeric|min:0',
            'client_name' => 'nullable|string|max:255',
            'client_email' => 'nullable|email',
            'repository_url' => 'nullable|url',
            'tags' => 'nullable|array',
            'priority' => 'integer|min:0'
        ];
    }

    public function productOwner()
    {
        return $this->belongsTo(User::class, 'product_owner_id');
    }

    public function scrumMaster()
    {
        return $this->belongsTo(User::class, 'scrum_master_id');
    }
}
