<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;

class LicensePolicy
{
    public function before(User $user): ?bool
    {
        if ($user->id === 1) {
            return true;
        }
        return null;
    }

    public function viewlicprodappform(User $user)
    {

       return $user->hasPermission('licprod-applications');
    }

//    public function licenseapproval(User $user)
//    {
//        return $user->hasRole('license-approval');
//    }
}
