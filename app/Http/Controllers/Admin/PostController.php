<?php

namespace LVeterinaria\Http\Controllers\Admin;

use LVeterinaria\Repositories\UserRepository;
use LVeterinaria\Http\Controllers\Controller;
use LVeterinaria\Http\Requests\CreateRegister;
use LVeterinaria\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;
	/**
	 * @var UserRepository
	 */
	private $userRepository;

	/**
	 * PostController constructor.
	 *
	 * @param PostRepository $postRepository
	 * @param UserRepository $userRepository
	 */
    public function __construct(PostRepository $postRepository,
								UserRepository $userRepository)
    {

        $this->postRepository = $postRepository;
	    $this->userRepository = $userRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$users = $this->userRepository->getUsers();
    	$races = $this->postRepository->getRaces();

        return view('posts.new', compact('users', 'races'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|CreateRegister $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRegister $request)
    {
        $this->postRepository->createPost($request);

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->getPost($id);
	    $races = $this->postRepository->getRaces();

        return view('posts.edit', compact('post', 'races'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|CreateRegister $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRegister $request, $id)
    {
        $this->postRepository->updatePost($request, $id);

        return redirect()->route('post.view', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepository->deletePost($id);

        return redirect()->route('home');
    }
}
