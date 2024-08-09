<?php

namespace Modules\Board\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SprintBacklog extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name',
        'type',
        'column_id',
        'assigned_to',
        'start_date',
        'end_date',
        'order,'
    ];

    public function getSortableQuery()
    {
        return $this->group->tasks();
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Column::class);
    }
}
