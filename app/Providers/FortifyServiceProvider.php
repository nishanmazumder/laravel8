<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Fortify::loginView(function(){
        //     return view('web.pages.login');
        // });

        // Fortify::registerView(function(){
        //     return view('web.pages.register');
        // });

        // Fortify::requestPasswordResetLinkView(function(){
        //     return view('web.pages.register');
        // });

        // Fortify::resetPasswordView(function($request){
        //     $token = $request->route('token');
        //     $email = $request->email;

        //     return view('web.pages.reset', ['token'=>$token, 'email'=>$email]);
        // });
    }
}
