<?php

namespace LVeterinaria\Http\Controllers;

use Illuminate\Http\Request;
use LVeterinaria\Repositories\PostRepository;

class HomeController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * Create a new controller instance.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth');

        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->getPostsByAuth();

        return view('home', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->postRepository->getPost($id);

        return view('posts.view', compact('post'));
    }
}
