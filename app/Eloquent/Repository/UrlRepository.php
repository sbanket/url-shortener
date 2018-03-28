<?php

namespace App\Eloquent\Repository;

use App\Eloquent\DataRequest\UrlRequest;
use App\Entity\Url;

/**
 * Class UrlRepository
 *
 * @package App\Eloquent\Repository
 */
class UrlRepository
{
    /**
     * @return UrlRequest
     */
    public function fetchAll(): UrlRequest
    {
        $dataRequest = UrlRequest::create(Url::with([]));

        return $dataRequest;
    }

    /**
     * @param int $id
     *
     * @return UrlRequest
     */
    public function fetchById(int $id): UrlRequest
    {
        $dataRequest = $this->fetchAll();
        $dataRequest->byId($id);

        return $dataRequest;
    }

    /**
     * @param string $key
     *
     * @return UrlRequest
     */
    public function fetchByKey(string $key): UrlRequest
    {
        $dataRequest = $this->fetchAll();
        $dataRequest->byKey($key);

        return $dataRequest;
    }
}
