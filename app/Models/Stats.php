<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['time_interval'];

    /**
     * Добавляет новый атрибут при извлечении данных из БД.
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
    /**
     * Добавляет новый атрибут при кодировании данных в JSON.
     *
     * @return Attribute
     */
    protected function timeInterval(): Attribute
    {
        $timeInterval = $this->getTimeIntervalAttribute();

        return new Attribute(
            get: fn () => $timeInterval,
        );
    }
}
