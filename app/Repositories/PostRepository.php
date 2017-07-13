<?php

namespace LVeterinaria\Repositories;


use LVeterinaria\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository extends BaseRepo
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return new Post();
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->getModel()->paginate(10);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPost($id)
    {
        return $this->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function createPost($request)
    {
        $user = Auth::user();

        $img = request()->file('pet_img')->store('public/pets');

        $post = $this->model;
        $post->fill($request->all());
        $post->user_id = $user->id;
        $post->pet_img = $img;
        $post->save();

        return $post;
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function updatePost($request, $id)
    {
        $post = $this->find($id);

        $img = request()->file('pet_img') ? request()->file('pet_img')->store('public/pets') : $post->pet_img;
        $post->fill($request->all());
        $post->pet_img = $img;
        $post->update();

        return $post;
    }

    /**
     * @param $id
     */
    public function deletePost($id)
    {
        $post = $this->find($id);
        if(!$post) {
            abort(404);
        }

        $post->delete();
    }
}