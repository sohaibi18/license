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

    public function license(User $user)
    {

        return $user->hasPermission('license');
    }

    public function finance(User $user)
    {

        return $user->hasPermission('finance');
    }

    public function license_divisional(User $user)
    {

        return $user->hasPermission('license-divisional');
    }

    public function license_district(User $user)
    {

        return $user->hasPermission('license-district');
    }

    public function license_issue_print_draft(User $user)
    {

        return $user->hasPermission('license-issue-print-draft');
    }
    public function complete_access(User $user)
    {

        return $user->hasPermission('complete-access');
    }

}
