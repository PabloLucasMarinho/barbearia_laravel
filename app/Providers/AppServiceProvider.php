<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    ResetPassword::createUrlUsing(function ($user, $token) {
      $encryptedEmail = Crypt::encryptString($user->email);

      return config('app.url') . '/reset-password/' . $token . '?email=' . urlencode($encryptedEmail);
    });
  }
}
