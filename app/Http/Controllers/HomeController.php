<?php

namespace LVeterinaria\Http\Controllers;

use Illuminate\Http\Request;
use LVeterinaria\Repositories\PostRepository;
use LVeterinaria\Repositories\RecordRepository;

class HomeController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;
	/**
	 * @var RecordRepository
	 */
	private $recordRepository;

	/**
	 * Create a new controller instance.
	 *
	 * @param PostRepository $postRepository
	 * @param RecordRepository $recordRepository
	 */
    public function __construct(PostRepository $postRepository,
								RecordRepository $recordRepository)
    {
        $this->middleware('auth');

        $this->postRepository = $postRepository;
	    $this->recordRepository = $recordRepository;
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

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
    {
        $post = $this->postRepository->getPost($id);
        $records = $this->recordRepository->getRecordsByPostId($id);

        return view('posts.view', compact('post', 'records'));
    }
}
