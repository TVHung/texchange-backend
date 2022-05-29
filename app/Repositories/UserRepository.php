<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\User;

/**
 * Class UserRepository.
 */
class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(User::class);  //đinh nghĩa model User
        $this->fields = $this->getInstance()->getFillable();
    }

    public function isExists($user_id)
    {
        return $this->getInstance()::where('id', $user_id)->exists();
    }
}
