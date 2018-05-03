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

