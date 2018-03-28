<?php

namespace App\Http\Controllers;

use App\Eloquent\Repository\UrlRepository;
use App\Service\UrlService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class UrlController
 *
 * @package App\Http\Controllers
 */
class UrlController extends Controller
{
    /**
     * @var UrlRepository
     */
    private $urlRepository;

    /**
     * @var UrlService
     */
    private $urlService;

    /**
     * UrlController constructor.
     *
     * @param UrlRepository $urlRepository
     * @param UrlService    $urlService
     */
    public function __construct(UrlRepository $urlRepository, UrlService $urlService)
    {
        $this->urlRepository = $urlRepository;
        $this->urlService    = $urlService;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('app/url/visit');
    }

    /**
     * @param Request $request
     * @param string  $key
     *
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function visit(Request $request, string $key)
    {
        $url = $this->urlRepository->fetchByKey($key)->first();
        if (empty($url)) {
            return view('app/url/visit');
        }

        $this->urlService->visitUrl($url, $request);

        return redirect($url->original_url);
    }
}
