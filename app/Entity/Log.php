<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 *
 * @package App\Entity
 */
class Log extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'ip',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function url()
    {
        return $this->belongsTo(Url::class, 'url_id', 'id');
    }
}
