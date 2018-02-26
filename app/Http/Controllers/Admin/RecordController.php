<?php

namespace LVeterinaria\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LVeterinaria\Http\Controllers\Controller;
use LVeterinaria\Http\Requests\CreateRecord;
use LVeterinaria\Repositories\PostRepository;
use LVeterinaria\Repositories\RecordRepository;
use LVeterinaria\Repositories\ServiceRepository;

class RecordController extends Controller
{

	/**
	 * @var RecordRepository
	 */
	private $recordRepository;

	/**
	 * @var PostRepository
	 */
	private $postRepository;

	/**
	 * @var ServiceRepository
	 */
	private $serviceRepository;

	/**
	 * RecordController constructor.
	 *
	 * @param RecordRepository $recordRepository
	 * @param PostRepository $postRepository
	 * @param ServiceRepository $serviceRepository
	 */
	public function __construct(RecordRepository $recordRepository,
								PostRepository $postRepository,
								ServiceRepository $serviceRepository)
	{
		$this->recordRepository = $recordRepository;
		$this->postRepository = $postRepository;
		$this->serviceRepository = $serviceRepository;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = $this->recordRepository->getRecords();

        return view('records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $mascots = $this->postRepository->getPostsAll();
        $services = $this->serviceRepository->getServicesAll();

        return view('records.new', compact('mascots', 'services'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request|CreateRecord $request
	 * @return \Illuminate\Http\Response
	 */
    public function store(CreateRecord $request)
    {
        $this->recordRepository->createRecord($request);

        return redirect()->route('records.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = $this->recordRepository->getRecord($id);

        return view('records.view', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = $this->recordRepository->getRecord($id);

        return view('records.edit', compact('record'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request|CreateRecord $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function update(CreateRecord $request, $id)
    {
        $this->recordRepository->updateRecord($request, $id);

        return redirect()->route('records.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->recordRepository->deleteRecord($id);

        return redirect()->route('records.index');
    }
}
