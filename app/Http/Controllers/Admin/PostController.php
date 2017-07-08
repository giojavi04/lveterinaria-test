<?php

namespace LVeterinaria\Http\Controllers\Admin;

use LVeterinaria\Http\Controllers\Controller;
use LVeterinaria\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostController constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {

        $this->postRepository = $postRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
