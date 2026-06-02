<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRequest extends Model
{
    use HasFactory;
    protected $fillable =['requested_role', 'reason', 'user_id','status'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function scopePending($query){
        return $query->where('status', 'pending');
    }
    public function comments()
    {
        return $this->hasMany(CommentRequest::class);
    }

    public static function scopeForUser($query, $userId){
        return $query->where('user_id', $userId);
    }
}
