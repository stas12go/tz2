<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Добавляет новый атрибут к статистике посещений страницы.
     *
     * @return string
     */
    public function getTimeIntervalAttribute(): string
    {
        $visitedAt = new Carbon($this->visited_at);
        $leftAt = new Carbon($this->left_at);
        $diff = $visitedAt->diffInSeconds($leftAt);

        return gmdate('H:i:s', $diff);
    }
}
