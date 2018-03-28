<?php

namespace App\Entity;

use App\Eloquent\Scope\UserScope;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Url
 *
 * @package App\Entity
 */
class Url extends Model
{
    protected $table = 'urls';

    protected $fillable = [
        'original_url',
        'key',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
