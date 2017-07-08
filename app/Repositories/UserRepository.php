<?php

namespace app\Repositories;


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
}