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
        echo __('The last posted time of user ID :user_id is :user_last_posted_at', ['user_id' => $user->id, 'user_last_posted_at' => $user->last_posted_at]) . PHP_EOL;
    }
}
