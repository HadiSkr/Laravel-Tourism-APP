<?php

namespace App\Policies;

use App\Models\company;
use App\Models\flightpost;
use Illuminate\Auth\Access\HandlesAuthorization;

class flightpost1
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
     * @param  \App\Models\flightpost  $flightpost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(company $user, flightpost $flightpost)
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
     * @param  \App\Models\flightpost  $flightpost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(company $user, flightpost $flightpost)
    {
        return $company->id == $flightpost->company->id;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\flightpost  $flightpost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(company $user, flightpost $flightpost)
    {
        return $company->id == $flightpost->company->id;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\flightpost  $flightpost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(company $user, flightpost $flightpost)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\flightpost  $flightpost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(company $user, flightpost $flightpost)
    {
        //
    }
}
