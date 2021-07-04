<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware(['web'])
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

///--------------------------------(web)

Route::middleware(['web','role'])
    ->prefix('admin')
    ->namespace($this->namespace)
    ->group(base_path('routes/web/aadmin.php'));


// Route::middleware('web')
// ->prefix('category')
// ->namespace($this->namespace)
// ->group(base_path('routes/web/q/category.php'));

// Route::middleware('web')
// ->prefix('comment')
// ->namespace($this->namespace)
// ->group(base_path('routes/web/q/comment.php'));

// Route::middleware('web')
// ->prefix('post')
// ->namespace($this->namespace)
// ->group(base_path('routes/web/q/post.php'));

// Route::middleware(['web'])
// ->prefix('tag')
// ->namespace($this->namespace)
// ->group(base_path('routes/web/q/tag.php'));


// Route::middleware(['web'])
// ->prefix('user')
// ->namespace($this->namespace)
// ->group(base_path('routes/web/q/user.php'));








        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
