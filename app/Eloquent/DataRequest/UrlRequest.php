<?php

namespace App\Eloquent\DataRequest;

use App\Eloquent\AbstractDataRequest;

/**
 * Class UrlRequest
 *
 * @package App\Eloquent\DataRequest
 */
class UrlRequest extends AbstractDataRequest
{
    /**
     * @param string $key
     *
     * @return UrlRequest
     */
    public function byKey(string $key): UrlRequest
    {
        $this->qb->where('key', $key);

        return $this;
    }

    /**
     * @param int $id
     *
     * @return UrlRequest
     */
    public function byId(int $id): UrlRequest
    {
        $this->qb->where('id', $id);

        return $this;
    }

    /**
     * @param int $user
     *
     * @return UrlRequest
     */
    public function byUser(int $user): UrlRequest
    {
        $this->qb->where('user_id', $user);

        return $this;
    }
}
