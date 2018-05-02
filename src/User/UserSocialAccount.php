<?php
/**
 * User social account interface.
 *
 * @author      Anand Siddharth <anandsiddharth21@gmail.com>
 * @copyright   Copyright (c) Anand Siddharth
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/anandsiddharth/laravel-passport-socialite
 */
namespace Anand\Laravel\PassportSocialite\User;

interface UserSocialAccount {
    /**
     * Get user from social provider and from provider's user's id
     * 
     * @param string $provider Provider name as requested from oauth e.g. facebook
     * @param string $id Id used by provider
     */
    public static function findForPassportSocialite($provider, $id); 
}