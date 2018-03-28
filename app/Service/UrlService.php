<?php

namespace App\Service;

use App\Entity\Url;
use App\Entity\User;
use Illuminate\Http\Request;

class UrlService
{
    /**
     * @var LogService
     */
    private $logService;

    /**
     * UrlService constructor.
     *
     * @param LogService $logService
     */
    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    /**
     * @param array $attributes
     * @param User  $user
     *
     * @return Url
     */
    public function create(array $attributes, User $user): Url
    {
        $url = (new Url())->fill($attributes);
        $url->user()->associate($user);
        $url->save();

        return $url;
    }

    /**
     * @param Url $url
     */
    public function delete(Url $url)
    {
        $url->delete();
    }

    /**
     * @param Url     $url
     * @param Request $request
     */
    public function visitUrl(Url $url, Request $request)
    {
        $url->increment('visit_count');
        $this->logService->create($url, $request);
    }
}
