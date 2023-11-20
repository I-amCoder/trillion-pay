<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Language;
use App\Models\Payment;
use App\Models\Withdraw;
use App\Models\Ticket;
use App\Notifications\DepositNotification;
use App\Notifications\NewUserNotification;
use Illuminate\Pagination\Paginator;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
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


        $general = GeneralSetting::first();
      

        View::composer('backend.layout.sidebar', function ($view) {
            $deactiveUser = User::where('status',0)->count();
            $view->with('deactiveUser',  $deactiveUser);
        });


        View::composer('backend.layout.navbar', function ($view) {
            $notifications = auth()->guard('admin')->user()->unreadNotifications()->where('type', NewUserNotification::class)->get();
            $view->with('notifications',  $notifications);

            $depositNotifications = auth()->guard('admin')->user()->unreadNotifications()->where('type', DepositNotification::class)->get();
            $view->with('depositNotifications', $depositNotifications);
        });


        View::composer('backend.layout.navbar', function ($view) {
            $pendingpayment = Payment::where('payment_status',2)->get();
            $view->with('pendingpayment',  $pendingpayment);
        });

        View::composer('backend.layout.navbar', function ($view) {
            $pendingWithdraw = Withdraw::where('status',0)->get();
            $view->with('pendingWithdraw',  $pendingWithdraw);
        });

        View::composer('backend.layout.navbar', function ($view) {
            $pendingTicket= Ticket::where('status',2)->get();
            $view->with('pendingTicket', $pendingTicket);
        });

        Paginator::useBootstrap();



        view()->share('general', $general);
     

        $urlSections = [];

        $jsonUrl = resource_path('views/').'sections.json';

        $urlSections = array_filter(json_decode(file_get_contents($jsonUrl),true));

        $pages = Page::where('name','!=','home')->where('status',1)->get();

        view()->share('pages',$pages);
        view()->share('urlSections',$urlSections);
        view()->share('language_top', Language::latest()->get());


        Blade::directive('canaccess', function ($expression) {

           $getPermissions = array_map(function($item){
                return $this->removeSpecialChar($item);
           },explode(',',$expression));

           return "<?php if(" .auth()->guard('admin')->user()->canany($getPermissions) ."):?>";
        });

        Blade::directive('endcanaccess', function ($expression) {
            return '<?php endif; ?>';
        });


        Blade::directive('canSingle', function ($expression) {

           return "<?php if(" .auth()->guard('admin')->user()->can($this->removeSpecialChar($expression)) ."):?>";
        });

        Blade::directive('endcanSingle', function ($expression) {
            return '<?php endif; ?>';
        });


    }

    function removeSpecialChar($str) {

        $res = trim(str_replace( array( '[', ']',
        '\''), '', $str));
        return $res;
        }
}
