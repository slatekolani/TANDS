<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\HeroSlide;
use App\Models\Setting;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home()
    {
        $heroSlides = HeroSlide::active()->orderBy('sort_order')->get();
        $homeGalleryImages = GalleryImage::where('is_featured_home', true)->orderBy('sort_order')->get();
        $homeAboutIntro = Setting::get('about_intro', '<b>Tanzania National Debate Society (TANDS)</b> is a fully registered society in accordance to the Societies Act Cap. 337 R.E of 2002 under registration number S.A 21806 with a mission of providing a platform for educational institutions to engage in fair, transparent and representative debating competitions so as to be able to participate in our Annual Debating Championships.');
        $aboutImage = GalleryImage::inRandomOrder()->first();

        return view('FrontEnd.welcome', compact('heroSlides', 'homeGalleryImages', 'homeAboutIntro', 'aboutImage'));
    }

    public function about()
    {
        return view('FrontEnd.about');
    }

    public function gallery()
    {
        $galleryImages = GalleryImage::orderBy('sort_order')->get();

        return view('FrontEnd.gallery', compact('galleryImages'));
    }

    public function contactUs()
    {
        $contactPhone = Setting::get('contact_phone', '+255 787 225 427');
        $contactEmail = Setting::get('contact_email', 'info@tands.or.tz');
        $contactAddress = Setting::get('contact_address', 'Arusha-Tanzania');
        $contactPoBox = Setting::get('contact_po_box', 'P.O.BOX 6221');

        return view('FrontEnd.contactUs', compact('contactPhone', 'contactEmail', 'contactAddress', 'contactPoBox'));
    }
}
