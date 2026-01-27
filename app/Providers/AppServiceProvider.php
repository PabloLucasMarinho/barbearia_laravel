<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Client;
use App\Policies\AppointmentPolicy;
use App\Policies\ClientPolicy;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  protected $policies = [
    Client::class => ClientPolicy::class,
    Appointment::class => AppointmentPolicy::class,
  ];

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
