<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationResults extends Model
{
    protected $fillable = ['user_id', 'file_type', 'verification_result'];
}
