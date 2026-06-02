<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRequestLog extends Model
{
    use HasFactory;
    protected $fillable = ['role_request_id','processed_by','action'];
}
