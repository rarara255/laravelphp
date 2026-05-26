<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleRequestService;
Use App\Models\RoleRequest;
use Illuminate\Support\Facades\View;
class AdminRoleRequestController extends Controller
{
    protected RoleRequestService $service;
    public function __construct(RoleRequestService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $requests = RoleRequest::with('user')->pending()->latest()->get();
        return View::make('admin.role_requests.index',['requests'=>$requests]);
    }

    public function show(int $id){
        $roleRequest = RoleRequest::findOrFail($id);
        return View::make('admin.role_requests.show',['roleRequest'=>$roleRequest]);
    }

    public function approve(RoleRequest $roleRequest){
        $this->service->approveRequest($roleRequest);

    }

    public function reject(RoleRequest $roleRequest){
        $this->service->rejectRequest($roleRequest);

    }
}
