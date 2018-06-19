<?php
/**
 * Passport Socialite Service Provider for laravel
 *
 * @author      Anand Siddharth <anandsiddharth21@gmail.com>
 * @copyright   Copyright (c) Anand Siddharth
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/schedula/laravel-passport-socialite
 */

namespace Schedula\Laravel\PassportSocialite;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Passport;
use League\OAuth2\Server\AuthorizationServer;
use Schedula\League\OAuth2\Server\Grant\SocialGrant;
class PassportSocialiteServiceProvider extends ServiceProvider {

    public function register () {
        app()->afterResolving(AuthorizationServer::class, function(AuthorizationServer $oauthServer) {
            $oauthServer->enableGrantType($this->makeSocialGrant(), Passport::tokensExpireIn());
        });
    }

    /**
     * Create and configure Social Grant
     * 
     * @return Schedula\League\OAuth2\Server\Grant\SocialGrant
     */
    public function makeSocialGrant() {
        $grant = new SocialGrant(
            $this->app->make(Bridge\UserSocialRepository::class),
            $this->app->make(RefreshTokenRepository::class)
        );
        $grant->setRefreshTokenTTL(Passport::refreshTokensExpireIn());
        return $grant;        
    }
}
