<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home()
    {
        return view('FrontEnd.welcome');
    }

    public function about()
    {
        return view('FrontEnd.about');
    }

    public function gallery()
    {
        return view('FrontEnd.gallery');
    }
    public function EASDC()
    {
        return view('FrontEnd.Events.EASDC2024');
    }
      public function EASDC2025()
    {
        return view('FrontEnd.Events.EASDC2025');
    }
    public function ADC()
    {
        return view('FrontEnd.Events.ADC2025');
    }
    public function ADC2026()
    {
        return view('FrontEnd.Events.ADC2026');
    }
    public function TNDC2025()
    {
        return view('FrontEnd.Events.TNDC2025');
    }

    public function TNDC2026()
    {
        return view('FrontEnd.Events.TNDC2026');
    }

    public function contactUs()
    {
        return view('FrontEnd.contactUs');
    }
    
    public function TISDC2025()
    {
        return view('FrontEnd.Events.TISDC2025');
    }
    
}
