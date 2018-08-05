<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view the post.
     *
     * @param  \App\Model\admin\admin  $admin
     * @return mixed
     */
    public function view(admin $admin)
    {
      foreach ($admin->roles as $role ) {
        foreach ($role->permissions as $rolePerm) {
          if ($rolePerm->name == 'post_view') {
            return true;
          }
        }
      }
      return false;
    }

    /**
     * Determine whether the admin can create posts.
     *
     * @param  \App\Model\admin\admin  $admin
     * @return mixed
     */
    public function create(admin $admin)
    {
      foreach ($admin->roles as $role ) {
        foreach ($role->permissions as $rolePerm) {
          if ($rolePerm->name == 'post_create') {
            return true;
          }
        }
      }
      return false;
    }

    /**
     * Determine whether the admin can update the post.
     *
     * @param  \App\Model\admin\admin  $admin
     * @return mixed
     */
    public function update(admin $admin)
    {
      foreach ($admin->roles as $role ) {
        foreach ($role->permissions as $rolePerm) {
          if ($rolePerm->name == 'post_update') {
            return true;
          }
        }
      }
      return false;
    }

    /**
     * Determine whether the admin can delete the post.
     *
     * @param  \App\Model\admin\admin  $admin
     * @return mixed
     */
    public function delete(admin $admin)
    {
      foreach ($admin->roles as $role ) {
        foreach ($role->permissions as $rolePerm) {
          if ($rolePerm->name == 'post_delete') {
            return true;
          }
        }
      }
      return false;
    }
}
