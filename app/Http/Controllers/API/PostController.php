<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostFullResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePostRequest $request
     * @return PostResource
     */
    public function store(StorePostRequest $request)
    {
        $model = Post::create($request->validated());
        if ($model) {

            return new PostResource($model);
        }
        return false;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePostRequest $request
     * @param \App\Models\Post $comment
     * @return Post
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return PostFullResource
     */
    public function show(Post $post): PostFullResource
    {
        return new PostFullResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->comments()->delete();
        $post->delete();
        return response('', 204);
    }

    public function upvote(Post $post, User $user): bool
    {
        if (DB::table('post_vote')->where('post_id', $post->id)->where('user_id', $user->id)->count()) {
            return true;
        }
        DB::table('post_vote')->insert(['post_id' => $post->id, 'user_id' => $user->id]);
        return true;
    }

}
