<?php

namespace Modules\Sprint\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Calendar\Models\Calendar;

class Sprint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['sprint_name', 'duration', 'start_date', 'end_date', 'goal'];

    public function events()
    {
        return $this->hasMany(Calendar::class);
    }

    public function getValidationRules()
    {
    }
}
