<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            'about_intro' => '<p><b>Tanzania National Debate Society (TANDS)</b> is a fully registered society in accordance to the Societies Act Cap. 337 R.E of 2002 under registration number S.A 21806 with a mission of providing a platform for educational institutions to engage in fair, transparent and representative debating competitions so as to be able to participate in our Annual Debating Championships.</p><p>At the moment the society is running an annual national tournament labeled as The <b>Tanzania National Debate Championship (TNDC)</b> and a regional tournament labeled, <b>The East African Schools Debate Championship (EASDC)</b> in partnership with <b>East African Community</b> under the patronage of the <b>East African Legislative Assembly (EALA)</b>.</p>',
            'about_mission' => "The Mission of the Society is to provide a platform for primary, secondary and university learners to engage in a fair, transparent and representative debating competition to identify an annual debating champion.",
            'about_vision' => 'The vision of the Society is to have a generation of well-equipped academicians with soft skills as self-confidence, critical thinking and team work.',
            'contact_phone' => '+255 787 225 427',
            'contact_address' => 'Arusha-Tanzania',
            'contact_po_box' => 'P.O.BOX 6221',
            'contact_email' => 'info@tands.or.tz',
            'social_instagram_url' => '#',
            'social_twitter_url' => '#',
            'social_facebook_url' => '#',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
