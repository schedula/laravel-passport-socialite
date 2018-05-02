<?php

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Passport;
use League\OAuth2\Server\AuthorizationServer;
use Anand\League\OAuth2\Server\Grant\SocialGrant;
class PassportSocialiteServiceProvider extends ServiceProvider {

    public function register () {
        app()->afterResolving(AuthorizationServer::class, function(AuthorizationServer $oauthServer) {
            $oauthServer->enableGrantType($this->makeSocialGrant(), Passport::tokensExpireIn());
        });
    }

    /**
     * Create and configure Social Grant
     * 
     * @return Anand\League\OAuth2\Server\Grant\SocialGrant
     */
    public function makeSocialGrant() {

    }
}