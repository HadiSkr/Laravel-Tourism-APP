<?php

namespace App\Policies;

use App\Models\company;
use App\Models\hotel;
use Illuminate\Auth\Access\HandlesAuthorization;

class hotel1
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
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(company $user, hotel $hotel)
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
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(company $user, hotel $hotel)
    {
        return $company->id == $hotel->company->id;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(company $user, hotel $hotel)
    {
        return $company->id == $hotel->company->id;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(company $user, hotel $hotel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\hotel  $hotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(company $user, hotel $hotel)
    {
        //
    }
}
