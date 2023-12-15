<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlCeateRequest;
use App\Models\Url;
use App\Services\DashboardService;
use App\Services\HomeService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $dashboardServices;

    public function __construct(DashboardService $dashboardServices)
    {

        $this->dashboardServices = $dashboardServices;
    }
    public function index()
    {
        return $this->dashboardServices->index();
    }


    public function createUrl(UrlCeateRequest $request)
    {
      return $this->dashboardServices->createUrl($request);
    }
    public function editUrl( $id)
    {
      return $this->dashboardServices->editUrl($id);
    }
    public function updateUrl(UrlCeateRequest $request, $id)
    {
      return $this->dashboardServices->UpdateUrl($request, $id);
    } public function deleteUrl($id)
    {
      return $this->dashboardServices->deleteUrl($id);
    }


}
