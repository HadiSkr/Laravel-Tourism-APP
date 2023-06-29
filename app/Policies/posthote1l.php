<?php

namespace App\Policies;

use App\Models\comapny;
use App\Models\posthotel;
use Illuminate\Auth\Access\HandlesAuthorization;

class posthote1l
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\comapny  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\comapny  $user
     * @param  \App\Models\posthotel  $posthotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(comapny $user, posthotel $posthotel)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\comapny  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(comapny $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\comapny  $user
     * @param  \App\Models\posthotel  $posthotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(comapny $user, posthotel $posthotel)
    {
        return $company->id == $posthotel->company->id;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\comapny  $user
     * @param  \App\Models\posthotel  $posthotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(comapny $user, posthotel $posthotel)
    {
        return $company->id == $posthotel->company->id;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\comapny  $user
     * @param  \App\Models\posthotel  $posthotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(comapny $user, posthotel $posthotel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\comapny  $user
     * @param  \App\Models\posthotel  $posthotel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(comapny $user, posthotel $posthotel)
    {
        //
    }
}
