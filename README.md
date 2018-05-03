# Laravel Passport Socialite
The missing social authentication plugin (i.e. SocialGrant) for laravel passport.

## Description
This package helps integrate social login using laravel's native packages i.e. (passport and socialite). This package allows social login from the providers that is supported 

## Getting Started
To get started add the following package to your composer.json file using this command.
`composer require anandsiddharth/laravel-paytm-wallet`

## Configuration
When composer installs this package successfully, register the   `Anand\Laravel\PassportSocialite\PassportSocialiteServiceProvider::class` in your config/app.php configuration file.


```
'providers' => [
    // Other service providers...
    Anand\Laravel\PassportSocialite\PassportSocialiteServiceProvider::class,
],
```

**Note: You need to configure third party social provider keys and secret strings as mentioned in laravel socialite documentation https://laravel.com/docs/5.6/socialite#configuration**

## Usage

### Step 1

Implement `UserSocialAccount` on your `User` model and then add method `findForPassportSocialite`.
`findForPassportSocialite` should accept two arguments i.e. `$provider` and `$id`
    
    **$provider - will be the social provider i.e. facebook, google, github etc.**
    **$id - is the user id as per social provider for example facebook's user id 1234567890**

```
use Anand\Laravel\PassportSocialite\User\UserSocialAccount;
class User extends Authenticatable implements UserSocialAccount {
    
    public static function findForPassportSocialite($provider,$id) {
        $account = SocialAccount::where('service', $provider)->where('external_user_id', $id)->first();
        if($account) {
            if($account->user){
                return $account->user;
            }
        }
        return;
    }
}
```
