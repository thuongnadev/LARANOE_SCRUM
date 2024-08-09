<?php

namespace Modules\Board\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Column extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'column_name',
        'order'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(SprintBacklog::class);
    }
}
