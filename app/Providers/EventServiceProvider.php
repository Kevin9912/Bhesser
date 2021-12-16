<?php

namespace App\Providers;

use App\Models\People;
use App\Models\User;
use App\Models\Client;
use App\Models\company;
use App\Models\office;
use App\Models\proveedores;
use App\Models\caja;
use App\Models\ventas;
use App\Models\inventario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observers\uuidObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerUuidObservers();
        //
    }

    public function registerUuidObservers()
    {
        User::observe(app(uuidObserver::class));
        People::observe(app(uuidObserver::class));
        Client::observe(app(uuidObserver::class));
        company::observe(app(uuidObserver::class));
        office::observe(app(uuidObserver::class));
        proveedores::observe(app(uuidObserver::class));
        caja::observe(app(uuidObserver::class));
        ventas::observe(app(uuidObserver::class));
        inventario::observe(app(uuidObserver::class));
    }
}
