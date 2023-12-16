<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUrlRequest;
use App\Http\Requests\UrlCeateRequest;
use App\Models\Url;
use App\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $homeServices;

    public function __construct(HomeService $homeServices)
    {

        $this->homeServices = $homeServices;
    }
    public function index()
    {
        return $this->homeServices->home();
    }


    public function createUrl(UrlCeateRequest $request)
    {
      return $this->homeServices->createUrl($request);
    }  public function getURL($id)
    {
      return $this->homeServices->getURL($id);
    } public function redirectURL($id)
    {
      return $this->homeServices->redirectURL($id);
    }

    public function createShortUrl(GetUrlRequest $request)
    {
        return $this->homeServices->createShortUrl($request);
    }
}
