<?php

namespace LVeterinaria\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LVeterinaria\Http\Controllers\Controller;
use LVeterinaria\Repositories\PostRepository;
use LVeterinaria\Repositories\ServiceRepository;
use LVeterinaria\Repositories\UserRepository;

class ReportController extends Controller
{
	/**
	 * @var UserRepository
	 */
	private $userRepository;

	/**
	 * @var PostRepository
	 */

	private $postRepository;

	/**
	 * @var ServiceRepository
	 */
	private $serviceRepository;

	/**
	 * ReportController constructor.
	 *
	 * @param UserRepository $userRepository
	 * @param PostRepository $postRepository
	 * @param ServiceRepository $serviceRepository
	 */
	public function __construct(UserRepository $userRepository,
		PostRepository $postRepository,
		ServiceRepository $serviceRepository)
	{
		$this->userRepository = $userRepository;
		$this->postRepository = $postRepository;
		$this->serviceRepository = $serviceRepository;
	}

	public function showUsers()
	{
		$users = $this->userRepository->getUsersPaginated();

		return view('reports.users', compact('users'));
	}

	public function showMascots()
	{
		$mascots = $this->postRepository->getPosts();

		return view('reports.mascots', compact('mascots'));
	}

	public function showServices()
	{
		$services = $this->serviceRepository->getServices();

		return view('reports.services', compact('services'));
	}
}
