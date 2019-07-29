<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //NEW: Import Schema
use App\Categorie; 
use App\Template; 
use App\Page; 
use View ; 
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
         Schema::defaultStringLength(191);
        
        if ( Schema::hasTable("categories"))
        {
            //load variable categories to all view / controller 
            View::share('categories', Categorie::all());
            View::share('pages', Page::all());

            //set setting
            $template = Template::where("selected", "1")->first();
            if($template)
            {
            config(['template.folder' => $template->folder]);
            }
        } //NEW: Increase StringLength
    }
}
