<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Services\RoleRequestService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class RoleRequestController extends Controller
{
    protected RoleRequestService $service;

    public function __construct(RoleRequestService $service){
        $this->service = $service
    }
}
