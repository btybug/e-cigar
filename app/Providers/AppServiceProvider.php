<?php

namespace App\Providers;

use App\Models\LogActivities;
use App\Models\Ticket;
use App\Observers\TicketObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Schema::defaultStringLength(191);


        \Blade::directive('ok', function ($expression) {
            return "<?php if(userCan($expression)): ?>";
        });

        \Blade::directive('endok', function ($expression) {
            return '<?php endif; ?>';
        });
        \Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });

        Ticket::observe(TicketObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
