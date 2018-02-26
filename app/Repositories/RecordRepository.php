<?php

namespace LVeterinaria\Repositories;


use LVeterinaria\Record;

class RecordRepository extends BaseRepo
{
	/**
	 * @return Record
	 */
	public function getModel()
	{
		return new Record();
	}

	/**
	 * @return mixed
	 */
	public function getRecords()
	{
		return $this->getModel()->with(['post', 'service'])->paginate(10);
	}


	/**
	 * @param $id
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
	 */
	public function getRecord($id)
	{
		return $this->getModel()->with(['post', 'service'])->find($id);
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
	 */
	public function getRecordsByPostId($id)
	{
		return $this->getModel()->where('post_id', (int) $id)->with(['service'])->get();
	}

	/**
	 * @param $request
	 *
	 * @return mixed
	 */
	public function createRecord($request)
	{
		$record = $this->model;
		$record->fill($request->all());
		$record->save();

		return $record;
	}

	/**
	 * @param $request
	 * @param $id
	 * @return mixed
	 */
	public function updateRecord($request, $id)
	{
		$record = $this->find($id);

		$record->fill($request->all());
		$record->update();

		return $record;
	}

	/**
	 * @param $id
	 */
	public function deleteRecord($id)
	{
		$record = $this->find($id);
		if(!$record) {
			abort(404);
		}

		$record->delete();
	}
}