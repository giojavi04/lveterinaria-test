<?php

namespace LVeterinaria\Repositories;


use LVeterinaria\User;

class UserRepository extends BaseRepo
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return new User();
    }

	/**
	 * @return mixed
	 */
	public function getUsers()
    {
    	return $this->getModel()->all();
    }

	/**
	 * @return mixed
	 */
	public function getUsersPaginated()
    {
    	return $this->getModel()->paginate(10);
    }
}