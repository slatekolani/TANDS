<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Event;
use App\Models\GrowthStat;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('FrontEnd.includes.team', function ($view) {
            $view->with('teamMembers', TeamMember::active()->orderBy('sort_order')->get());
        });

        View::composer('FrontEnd.includes.testimonials', function ($view) {
            $view->with('testimonials', Testimonial::active()->orderBy('sort_order')->get());
        });

        View::composer('FrontEnd.includes.partners', function ($view) {
            $view->with('partners', Partner::active()->orderBy('sort_order')->get());
        });

        View::composer('FrontEnd.includes.programs', function ($view) {
            $view->with('programs', Program::active()->orderBy('sort_order')->get());
        });

        View::composer('FrontEnd.includes.growthStatistics', function ($view) {
            $view->with('growthStats', GrowthStat::active()->orderBy('sort_order')->get());
        });

        View::composer('FrontEnd.includes.activities', function ($view) {
            $view->with('activities', Activity::active()->orderBy('sort_order')->get());
        });

        View::composer('FrontEnd.includes.about', function ($view) {
            $view->with([
                'aboutIntro' => Setting::get('about_intro'),
                'aboutMission' => Setting::get('about_mission'),
                'aboutVision' => Setting::get('about_vision'),
            ]);
        });

        View::composer('FrontEnd.includes.header', function ($view) {
            $view->with([
                'navEvents' => Event::published()->orderByDesc('year')->get()->groupBy('series'),
                'socialInstagram' => Setting::get('social_instagram_url', '#'),
                'socialTwitter' => Setting::get('social_twitter_url', '#'),
                'socialFacebook' => Setting::get('social_facebook_url', '#'),
            ]);
        });

        View::composer('FrontEnd.includes.footer', function ($view) {
            $view->with([
                'contactPhone' => Setting::get('contact_phone', '+255 787 225 427'),
                'contactEmail' => Setting::get('contact_email', 'info@tands.or.tz'),
                'contactAddress' => Setting::get('contact_address', 'Arusha-Tanzania'),
                'contactPoBox' => Setting::get('contact_po_box', 'P.O.BOX 6221'),
                'socialInstagram' => Setting::get('social_instagram_url', '#'),
                'socialTwitter' => Setting::get('social_twitter_url', '#'),
                'socialFacebook' => Setting::get('social_facebook_url', '#'),
            ]);
        });
    }
}
