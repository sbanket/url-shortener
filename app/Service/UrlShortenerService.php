<?php

namespace App\Service;

use App\Eloquent\Repository\UrlRepository;

class UrlShortenerService
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var UrlRepository
     */
    private $urlRepository;

    /**
     * UrlShortenerService constructor.
     *
     * @param UrlRepository $urlRepository
     *
     * @internal param UrlService $urlService
     */
    public function __construct(UrlRepository $urlRepository)
    {
        $this->urlRepository = $urlRepository;
        $this->config        = config('urlshortener');
    }

    /**
     * @return string
     */
    public function generateKey(): string
    {
        do {
            $key = "";

            $characters = preg_split('//', $this->config['characters']);
            $length     = $this->config['key_length'];

            for ($i = 0; $i < $length; $i++) {
                $key .= $characters[random_int(0, count($characters) - 1)];
            }

            $existKey = $this->existKey($key);
        } while ($existKey);

        return $key;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    private function existKey(string $key): bool
    {
        $url = $this->urlRepository->fetchByKey($key)->first();

        return !empty($url);
    }
}
