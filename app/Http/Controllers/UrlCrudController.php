<?php

namespace App\Http\Controllers;

use App\Eloquent\Repository\LogRepository;
use App\Eloquent\Repository\UrlRepository;
use App\Helper\CurrentUserTrait;
use App\Http\Controllers\Request\UrlRequest;
use App\Service\UrlService;
use App\Service\UrlShortenerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class UrlCrudController
 *
 * @package App\Http\Controllers
 */
class UrlCrudController extends Controller
{
    use CurrentUserTrait;

    /**
     * @var UrlService
     */
    private $urlService;

    /**
     * @var UrlShortenerService
     */
    private $urlShortenerService;

    /**
     * @var UrlRepository
     */
    private $urlRepository;

    /**
     * @var LogRepository
     */
    private $logRepository;

    /**
     * UrlCrudController constructor.
     *
     * @param UrlService          $urlService
     * @param UrlShortenerService $urlShortenerService
     * @param UrlRepository       $urlRepository
     * @param LogRepository       $logRepository
     */
    public function __construct(
        UrlService $urlService,
        UrlShortenerService $urlShortenerService,
        UrlRepository $urlRepository,
        LogRepository $logRepository
    ) {
        $this->urlService          = $urlService;
        $this->urlShortenerService = $urlShortenerService;
        $this->urlRepository       = $urlRepository;
        $this->logRepository       = $logRepository;
    }

    /**
     * @return Factory|View
     */
    public function list()
    {
        $urls = $this->urlRepository->fetchAll()->byUser($this->getCurrentUser()->id)->paginate(10);

        return view('app/url/list', ['urls' => $urls]);
    }

    /**
     * @param mixed $urlId
     *
     * @return Factory|View
     */
    public function show($urlId)
    {
        $url = $this->urlRepository->fetchById((int)$urlId)->byUser($this->getCurrentUser()->id)->first();
        if (empty($url)) {
            abort(404, 'Url is not found');
        }

        $logs = $this->logRepository->fetchByUrl($url->id)->paginate(10);

        return view('app/url/show', ['url' => $url, 'logs' => $logs]);
    }

    /**
     * @return Factory|View
     */
    public function createForm()
    {
        return view('app/url/create');
    }

    /**
     * @param UrlRequest $urlRequest
     *
     * @return RedirectResponse
     */
    public function create(UrlRequest $urlRequest)
    {
        try {
            $attributes        = $urlRequest->all();
            $attributes['key'] = $this->urlShortenerService->generateKey();
            $url               = $this->urlService->create($attributes, $this->getCurrentUser());

            return redirect()->route('url.show', ['urlId' => $url->id]);
        } catch (\Exception $exception) {
            abort(500, 'Error occurred during saving url');
        }
    }

    /**
     *
     *
     * @return RedirectResponse
     */
    public function delete($urlId)
    {
        $url = $this->urlRepository->fetchById((int)$urlId)->byUser($this->getCurrentUser()->id)->first();
        if (empty($url)) {
            abort(404, 'Url not found');
        }
        $this->urlService->delete($url);

        return redirect()->route('url.list');
    }
}
