<?php

namespace App\Http\Controllers\Post;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use App\Services\Post\TestS;

class BaseController extends Controller
{
    public $service;

    public function __construct(TestS $service)
    {
        $this->service = $service;
    }
}
