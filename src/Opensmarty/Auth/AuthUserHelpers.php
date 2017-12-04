<?php
/**
 * Created for opensmarty-starter.
 * User: Nicolas Wan
 */

namespace Opensmarty\Auth;

trait AuthUserHelpers
{

    /**
     * @return \Opensmarty\Models\Foundation\User
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