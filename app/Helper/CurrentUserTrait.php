<?php

namespace App\Helper;

use App\Entity\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

/**
 * Trait CurrentUserTrait
 *
 * @package App\Helper
 */
trait CurrentUserTrait
{
    /**
     * @return User
     * @throws AuthenticationException
     */
    protected function getCurrentUser(): User
    {
        $user = Auth::user();

        if (empty($user)) {
            throw new AuthenticationException('User is not authenticated');
        }

        return $user;
    }
}
