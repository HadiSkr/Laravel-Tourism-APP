<?php

namespace App\Policies;

use App\Models\User;
use App\Models\company;
use App\Models\flightCompany;
use Illuminate\Auth\Access\HandlesAuthorization;

class flight
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\comany  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\comany  $user
     * @param  \App\Models\flightCompany  $flightCompany
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, flightCompany $flightCompany)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\comany  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\comany  $user
     * @param  \App\Models\flightCompany  $flightCompany
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, flightCompany $flightCompany)
    {
        return $company->id == $flightCompany->company->id;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\comany  $user
     * @param  \App\Models\flightCompany  $flightCompany
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(comany $user, flightCompany $flightCompany)
    {
        return $company->id == $flightCompany->company->id;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\flightCompany  $flightCompany
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, flightCompany $flightCompany)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\flightCompany  $flightCompany
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, flightCompany $flightCompany)
    {
        //
    }
}
