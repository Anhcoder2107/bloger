<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

	public $sortable = [
    'id', 
    'titleBlog', 
    'postBlog', 
    'photoBlog', 

    ];

    protected $table = 'blogs';

    protected $guarded = 'blog';

    protected $fillable = [
        'user_id',
        'user_name',
        'create_date',
        'title',
        'slug',
        'body',
        'htmlbody',
        'image',
        'like_count',
        'comment_count'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
