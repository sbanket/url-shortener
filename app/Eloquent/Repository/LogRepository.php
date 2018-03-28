<?php

namespace App\Eloquent\Repository;

use App\Eloquent\DataRequest\LogRequest;
use App\Entity\Log;

/**
 * Class LogRepository
 *
 * @package App\Eloquent\Repository
 */
class LogRepository
{
    /**
     * @return LogRequest
     */
    public function fetchAll(): LogRequest
    {
        $dataRequest = LogRequest::create(Log::with([]));

        return $dataRequest;
    }

    /**
     * @param int $url
     *
     * @return LogRequest
     */
    public function fetchByUrl(int $url)
    {
        $dataRequest = $this->fetchAll();
        $dataRequest->byUrl($url);

        return $dataRequest;
    }
}
