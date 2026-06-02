<?php

namespace App\Observers;


use App\Models\RoleRequest;
use App\Models\RoleRequestLog;
class RoleRequestObserver
{
    public function updated(RoleRequest $roleRequest){
        if($roleRequest->status === 'approved'){
            $user = $roleRequest->user();
            $user->role = $roleRequest->requested_role;
            $user->save();

            RoleRequestLog::create([
                'role_request_id' => $roleRequest->id,
//                'processed_by' =>,
                'action'=> $roleRequest->status,
            ]);
        }

        $roleRequest->user()->notify(new \App\Notifications\RoleRequestProcessed($roleRequest));
    }
}
