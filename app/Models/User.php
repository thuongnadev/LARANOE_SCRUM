<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Board\Models\SprintBacklog;
use Modules\Project\Models\Project;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'job_title',
        'bio',
        'profile_picture',
        'phone',
        'skills',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ownedProjects()
    {
        return $this->hasMany(Project::class, 'product_owner_id');
    }

    public function managedProjects()
    {
        return $this->hasMany(Project::class, 'scrum_master_id');
    }

    public function assignedSprintBacklogs()
    {
        return $this->hasMany(SprintBacklog::class, 'assigned_to');
    }
    public function isProductOwner()
    {
        return $this->role === 'product_owner';
    }

    public function isScrumMaster()
    {
        return $this->role === 'scrum_master';
    }

    public function isDeveloper()
    {
        return $this->role === 'developer';
    }

    public function isStakeholder()
    {
        return $this->role === 'stakeholder';
    }

    public function getValidationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->id,
            'password' => 'sometimes|required|string|min:8',
            'role' => 'required|in:product_owner,scrum_master,developer,stakeholder',
            'job_title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'skills' => 'nullable|array',
            'is_active' => 'boolean'
        ];
    }
}
