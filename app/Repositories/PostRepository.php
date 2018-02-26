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
        return $this->getModel()->with(['user'])->paginate(10);
    }

	/**
	 * @return mixed
	 */
	public function getPostsAll()
	{
		return $this->getModel()->with(['user'])->get();
	}

	/**
	 * @return mixed
	 */
	public function getPostsByAuth()
	{
		$user = Auth::user();

		return $this->getModel()->where('user_id', $user->id)->with(['user'])->paginate(10);
	}

    /**
     * @param $id
     * @return mixed
     */
    public function getPost($id)
    {
        return $this->getModel()->with(['user', 'record'])->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function createPost($request)
    {
        if(request()->file('pet_img')) {
            $img = request()->file('pet_img')->store('public/pets');
        } else {
            $img = null;
        }

        if(request()->file('qr')) {
            $qr = request()->file('qr')->store('public/pets/qr');
        } else {
            $qr = null;
        }
        $post = $this->model;
        $post->fill($request->all());
        $post->pet_img = $img;
        $post->qr = $qr;
        $post->save();

        $postU = $this->find($post->id);
        $postU->url =  url('/') . '/' . $postU->id;
        $postU->update();

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
        $qr = request()->file('qr') ? request()->file('qr')->store('public/pets/qr') : $post->qr;
        $post->fill($request->all());
        $post->pet_img = $img;
        $post->qr = $qr;
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

    public function getRaces()
    {
    	$races = [
		    (object) [
			    'name' => ''
		    ],
		    (object) [
		        'name' => 'Conejo'
	        ],
		    (object) [
		        'name' => 'Caballo'
	        ],
		    (object) [
		        'name' => 'Cabra'
			],
		    (object) [
		        'name' => 'Ganso'
			],
		    (object) [
		        'name' => 'Perro'
			],
		    (object) [
		        'name' => 'Gato'
			],
		    (object) [
		        'name' => 'Pájaro'
			],
		    (object) [
		        'name' => 'Roedor'
			],
		    (object) [
		        'name' => 'Tortuga'
			],
		    (object) [
		        'name' => 'Codorniz'
			],
		    (object) [
		        'name' => 'Asno'
			],
		    (object) [
		        'name' => 'Oveja'
			],
		    (object) [
		        'name' => 'Pato'
			],
		    (object) [
		        'name' => 'Pavo'
			],
		    (object) [
		        'name' => 'Vaca'
			],
		    (object) [
		        'name' => 'Gallo'
			],
		    (object) [
		        'name' => 'Gallina'
			]
	    ];

    	return collect($races);
	}
}