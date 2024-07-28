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
        'creator',
        'status',
        'start_date',
        'end_date',
        'client_name',
        'client_email',
        'repository_url',
        'priority'
    ];

    public function getValidationRules()
    {
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

}
