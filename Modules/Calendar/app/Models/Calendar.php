<?php

namespace Modules\Calendar\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sprint\Models\Sprint;

class Calendar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title', 'description', 'sprint_id', 'start', 'end', 'user_id', 'backgroundColor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }

    public function getValidationRules()
    {
        return [
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
        ];
    }
}
