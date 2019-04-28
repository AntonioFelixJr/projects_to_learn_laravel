<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Post;


class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function updatePost(User $user, Post $post){


        if ( Gate::denies('updatePost', $post) ) {
            abort(403,'Unauthorized');

        }

        return $user->id == $post->user_id;
    }
}
