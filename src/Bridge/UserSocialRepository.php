<?php


namespace Anand\Laravel\PassportSocialite\Bridge;

use Anand\League\OAuth2\Server\Repositories\UserSocialRepositoryInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use Socialite;
use InvalidArgumentException;


class UserSocialRepository implements UserSocialRepositoryInterface {

    /**
     * {@inheritdoc}
     */
    public function getUserEntityByUserCredentials(
        $username,
        $password,
        $grantType,
        ClientEntityInterface $clientEntity
    ) {
        // no use implemented as UserSocialRepository extends UserRepository Class
        return;
    }

     /**
     * {@inheritdoc}
     */
    public function getUserFromSocialProvider($accessToken, $provider, $grantType, ClientEntityInterface $clientEntity){
        try {
            $socialite = Socialite::with($provider);
            $user = $socialite->userFromToken($accessToken);
            
        } catch (InvalidArgumentException $e) {
            throw OAuthServerException::invalidRequest('provider');
        } catch (\Exception $e) {
            throw OAuthServerException::serverError($e->getMessage());   
        }
        
    }
}