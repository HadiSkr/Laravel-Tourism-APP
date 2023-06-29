<?php

namespace App\Policies;

use App\Models\User;
use App\Models\company;
use App\Models\carscompanypost;
use Illuminate\Auth\Access\HandlesAuthorization;

class carpost
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
     * @param  \App\Models\carscompanypost  $carscompanypost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(company $user, carscompanypost $carscompanypost)
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
     * @param  \App\Models\carscompanypost  $carscompanypost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(company $user, carscompanypost $carscompanypost)
    {
        return $company->id == $carscompanypost->company->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\carscompanypost  $carscompanypost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(company $user, carscompanypost $carscompanypost)
    {
        return $company->id == $carscompanypost->company->id;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\company  $user
     * @param  \App\Models\carscompanypost  $carscompanypost
   
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $company, carscompanypost $carscompanypost)
    {
        //
    }



    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\carscompanypost  $carscompanypost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, carscompanypost $carscompanypost)
    {
        //
    }
}
