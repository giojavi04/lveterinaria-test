<?php

namespace LVeterinaria\Repositories;


use LVeterinaria\Service;

class ServiceRepository extends BaseRepo
{
	/**
	 * @return mixed
	 */
	public function getModel()
	{
		return new Service();
	}

	/**
	 * @return mixed
	 */
	public function getServices()
	{
		return $this->getModel()->paginate(10);
	}

	/**
	 * @return mixed
	 */
	public function getServicesAll()
	{
		return $this->getModel()->get();
	}
}