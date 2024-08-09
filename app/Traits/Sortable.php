<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

trait Sortable
{
    protected static function bootSortable()
    {
        static::creating(function (Model $record) {
            if ($record->order === null) {
                $lastSortPosition = $record->getSortableQuery()->max('order');
                $record->order = $lastSortPosition === null ? 0 : $lastSortPosition + 1;
            }
        });
    }

    public function getSortableQuery()
    {
        return $this->query();
    }

    public function scopeInOrder(Builder $query)
    {
        $query->orderBy('order');
    }

    public function moveToPosition($targetSortPosition)
    {
        $currentSortPosition = $this->order;

        if ($currentSortPosition == $targetSortPosition) {
            return;
        }

        DB::transaction(function () use ($currentSortPosition, $targetSortPosition) {
            $this->update(['order' => -1]);

            $sortableItems = $this->getSortableQuery()->whereBetween('order', [
                min($currentSortPosition, $targetSortPosition),
                max($currentSortPosition, $targetSortPosition),
            ]);

            if($currentSortPosition < $targetSortPosition) {
                // Dragging down, shift up
                $sortableItems->decrement('order');
            } else {
                // Dragging up, shift down
                $sortableItems->increment('order');
            }

            $this->update(['order' => $targetSortPosition]);
        });
    }
}
