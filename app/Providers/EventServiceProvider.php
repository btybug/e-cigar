<?php

namespace App\Providers;

use App\Events\OrderCanceled;
use App\Events\OrderCompleted;
use App\Events\OrderCompletelyCollected;
use App\Events\OrderPartiallyCollected;
use App\Events\OrderSubmitted;
use App\Events\Registered;
use App\Events\Tickets;
use App\Listeners\SendEmailOrderCanceled;
use App\Listeners\SendEmailOrderCompleted;
use App\Listeners\SendEmailOrderCompletelyCollected;
use App\Listeners\SendEmailOrderPartiallyCollected;
use App\Listeners\SendEmailOrderSubmitted;
use App\Listeners\SendEmailTickets;
use App\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        Tickets::class => [
            SendEmailTickets::class,
        ],
        OrderCanceled::class=>[
            SendEmailOrderCanceled::class

        ],
        OrderCompleted::class=>[
            SendEmailOrderCompleted::class
        ],
        OrderCompletelyCollected::class=>[
            SendEmailOrderCompletelyCollected::class
        ],
        OrderPartiallyCollected::class=>[
            SendEmailOrderPartiallyCollected::class
        ],
        OrderSubmitted::class=>[
            SendEmailOrderSubmitted::class
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
