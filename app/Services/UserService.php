<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    public function get($id)
    {
        return User::find($id);
    }

    public function getAll()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function update($id, array $user_data){
        $user = tap(User::where('id', $id))->update($user_data);
        return response()->json($user);
    }

    public function delete($id)
    {
        $user = User::destroy($id);
        return response()->json($id);
    }
}