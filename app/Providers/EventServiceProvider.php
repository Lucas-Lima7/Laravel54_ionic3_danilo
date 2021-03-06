<?php

namespace DeskFlix\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Dingo\Api\Event\ResponseWasMorphed::class => [
            \DeskFlix\Listeners\AddTokenToHeaderListener::class,
        ],
        \DeskFlix\Events\PayPalPaymentApproved::class => [
            \DeskFlix\Listeners\CreateOrderListener::class
        ],
        \Prettus\Repository\Events\RepositoryEntityCreated::class => [
            \DeskFlix\Listeners\CreateSubscriptionListener::class,
            \DeskFlix\Listeners\CreatePayPalWebProfileListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
