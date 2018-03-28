<?php

namespace App\Eloquent\DataRequest;

use App\Eloquent\AbstractDataRequest;

/**
 * Class LogRequest
 *
 * @package App\Eloquent\DataRequest
 */
class LogRequest extends AbstractDataRequest
{
    /**
     * @param int $url
     *
     * @return LogRequest
     */
    public function byUrl(int $url): LogRequest
    {
        $this->qb->where('url_id', $url);

        return $this;
    }
}
