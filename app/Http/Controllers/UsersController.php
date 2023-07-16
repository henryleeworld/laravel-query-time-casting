<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class UsersController extends Controller
{
    public function query() 
    {
        $user = User::select([
            'users.*',
            'last_posted_at' => Post::selectRaw('MAX(created_at)')
            ->whereColumn('user_id', 'users.id')
        ])->withCasts([
            'last_posted_at' => 'datetime'
        ])->first();
        echo '使用者編號 ' . $user->id . ' 最後文章建立時間：' . $user->last_posted_at;
    }
}
