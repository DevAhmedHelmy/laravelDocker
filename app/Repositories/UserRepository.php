<?php
namespace App\Repositories;
use App\Models\User;
class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
      return User::latest()->paginate(2);
    }
    public function show(User $user)
    {
      return $user;
    }
    public function edit(User $user)
    {
      return $user;
    }
    public function destroy(User $user)
    {
      return $user->delete();
    }
}
