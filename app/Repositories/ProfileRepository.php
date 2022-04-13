<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model
use App\Models\Profile;

/**
 * Class ProfileRepository.
 */
class ProfileRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Profile::class);  //đinh nghĩa model User
        $this->fields = $this->getInstance()->getFillable();
    }

    public function isExists($user_id)
    {
        return $this->getInstance()::where('user_id', $user_id)->exists();
    }
}
