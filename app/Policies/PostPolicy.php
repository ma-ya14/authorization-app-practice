<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         // 
    }

    /**
     * Determine whether the user can view the model.
     *  * ユーザーが投稿を表示できるか
     */
    public function view(User $user, Post $post): bool
    {
         // 公開されている投稿、または自分の投稿なら表示できる
        return $post->is_published || $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *  * ユーザーが投稿を更新できるか
     */
    public function update(User $user, Post $post): bool
    {
        //投稿の作成者だけが更新できる
        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     * ユーザーが投稿を削除できるか
     */
    public function delete(User $user, Post $post): bool
    {
        // 投稿の作成者、または管理者だけが削除できる
        return $post->user_id === $user->id || $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        //
    }
}
