<?php

namespace App\Http\Controllers;

use App\Models\CommentRequest;
use Illuminate\Http\Request;
use App\Services\RoleRequestService;
Use App\Models\RoleRequest;
use Illuminate\Support\Facades\View;
use App\Models\User;
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
        return redirect()
            ->route('admin.role_requests.index')
            ->with('success', 'Заявка одобрена! Роль пользователя изменена.');
    }

    public function reject(RoleRequest $roleRequest){
        $this->service->rejectRequest($roleRequest);
        return redirect()
            ->route('admin.role_requests.index')
            ->with('error', 'Заявка отклонена.');
    }
    public function showUser(User $user)
    {
        // Используем ваше отношение requests (а не roleRequests)
        $user->load(['requests' => function ($query) {
            $query->with('comments.user')->latest();
        }]);

        return view('admin.users.show', compact('user'));
    }
    public function storeComment(Request $request, RoleRequest $roleRequest)
    {
        $request->validate(['comment' => 'required|string|max:2000']);

        CommentRequest::create([
            'role_request_id' => $roleRequest->id,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Комментарий добавлен.');
    }
}
