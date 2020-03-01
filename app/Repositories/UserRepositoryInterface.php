<?php

namespace App\Repositories;
use App\Models\User;

/**
 *
 */
interface UserRepositoryInterface
{
  /*
  Get's all from db
  */
  public function getAll();

  /*
  Get's a data by ID from db
  */
  public function show(User $user);

  /*
  edit data by ID from db
  */
  public function edit(User $user);

  /*
  // deletea data by ID from db
  // */
  public function destroy(User $user);
}
