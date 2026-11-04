<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\HeroSlide;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Testimonial;

/**
 * /sitemap.xml, built live from the database: every static page plus every
 * published event, so a new event appears in it the moment it's published.
 */
class SitemapController extends Controller
{
    public function __invoke()
    {
        $base = config('app.site_url');
        $latest = fn (...$dates) => collect($dates)->filter()->max();

        $events = Event::published()->orderByDesc('year')->get();
        $galleryUpdated = GalleryImage::max('updated_at');
        $siteUpdated = $latest(
            $events->max('updated_at'),
            $galleryUpdated,
            HeroSlide::max('updated_at'),
            Setting::max('updated_at'),
        );

        $urls = collect([
            ['loc' => $base . '/', 'lastmod' => $siteUpdated, 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['loc' => $base . '/about', 'lastmod' => $latest(Setting::max('updated_at'), TeamMember::max('updated_at'), Testimonial::max('updated_at')), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => $base . '/gallery', 'lastmod' => $galleryUpdated, 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => $base . '/contactUs', 'lastmod' => Setting::max('updated_at'), 'changefreq' => 'yearly', 'priority' => '0.5'],
        ]);

        foreach ($events as $event) {
            $urls->push([
                'loc' => $base . parse_url($event->url, PHP_URL_PATH),
                'lastmod' => $event->updated_at,
                'changefreq' => $event->status === 'past' ? 'yearly' : 'weekly',
                'priority' => $event->status === 'past' ? '0.6' : '0.9',
            ]);
        }

        $xml = view('sitemap', ['urls' => $urls])->render();

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }
}
