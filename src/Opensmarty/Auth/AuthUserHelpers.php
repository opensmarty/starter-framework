<?php
/**
 * Created for opensmarty-starter.
 * User: Nicolas Wan
 */

namespace Someline\Auth;

trait AuthUserHelpers
{

    /**
     * @return \Someline\Models\Foundation\User
     */
    public function getAuthUser()
    {
        return current_auth_user();
    }

    /**
     * @return mixed|null
     */
    public function getAuthUserId()
    {
        return $this->getAuthUser()->getUserId();
    }

}