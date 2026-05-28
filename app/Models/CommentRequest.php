<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentRequest extends Model
{
    use HasFactory;
    protected $fillable = ['role_request_id', 'user_id', 'comment'];

    public function roleRequest()
    {
        return $this->belongsTo(RoleRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
