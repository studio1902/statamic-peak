<?php

namespace App\Policies;

use Statamic\Facades\User;
use Statamic\Policies\UserPolicy;

class CustomUserPolicy extends UserPolicy
{
    public function edit($authed, $user)
    {
        $user = User::fromUser($user);
        $authed = User::fromUser($authed);

        if (! $authed->isSuper() && $user->isSuper()) {
            return false; // Non-super users may not edit super users.
        }

        return parent::edit($authed, $user);
    }

    public function editPassword($authed, $user)
    {
        $user = User::fromUser($user);
        $authed = User::fromUser($authed);

        if (! $authed->isSuper() && $user->isSuper()) {
            return false; // Non-super users may not edit super users.
        }

        return parent::editPassword($authed, $user);
    }
}
