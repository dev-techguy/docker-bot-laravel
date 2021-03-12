<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\Deadline;
use App\Models\Discipline;
use App\Models\Page;
use App\Models\Service;

class ParamsController extends Controller
{
    /**
     * instance of controller
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Here pass all needed params to
     * the bidder js script
     */
    public function params()
    {
        $services = $disciplines = [];
        foreach (Service::query()->select('name')->where('is_allowed', true)->get() as $service) {
            array_push($services, $service->name);
        }
        foreach (Discipline::query()->select('name')->where('is_allowed', true)->get() as $discipline) {
            array_push($disciplines, $discipline->name);
        }

        return $this->successResponse([
            'services' => $services,
            'disciplines' => $disciplines,
            'pages' => Page::query()->where('is_allowed', true)->get(),
            'costs' => Cost::query()->where('is_allowed', true)->get(),
            'deadlines' => Deadline::query()->where('is_allowed', true)->get()->groupBy('metric')
        ]);
    }
}
