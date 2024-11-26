<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback_user';

   

    protected $fillable = [
        'id', 'email', 'user_name',	'numPhone', 'message'

    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
