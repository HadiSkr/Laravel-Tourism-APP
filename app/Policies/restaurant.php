<?php

namespace App\Policies;

use App\Models\company;
use App\Models\restuarant;
use Illuminate\Auth\Access\HandlesAuthorization;

class restaurant
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\company  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(company $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\restuarant  $restuarant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(company $user, restuarant $restuarant)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\company  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(company $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\restuarant  $restuarant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(company $user, restuarant $restuarant)
    {
        return $company->id == $restuarant->company->id;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\restuarant  $restuarant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(company $user, restuarant $restuarant)
    {
        return $company->id == $restuarant->company->id;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\restuarant  $restuarant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(company $user, restuarant $restuarant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\restuarant  $restuarant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(company $user, restuarant $restuarant)
    {
        //
    }
}
