<?php

namespace App\Service;

use App\Entity\Log;
use App\Entity\Url;
use Illuminate\Http\Request;

class LogService
{
    /**
     * @param Url     $url
     * @param Request $request
     *
     * @return Log
     */
    public function create(Url $url, Request $request): Log
    {
        $attributes = [
            'ip' => $request->getClientIp(),
        ];

        $log = (new Log())->fill($attributes);
        $log->url()->associate($url);
        $log->save();

        return $log;
    }
}
