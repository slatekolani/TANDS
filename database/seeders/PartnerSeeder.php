<?php

namespace Database\Seeders;

use App\Models\Partner;
use Database\Seeders\Concerns\CopiesLegacyImages;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    use CopiesLegacyImages;

    public function run()
    {
        $partners = [
            [
                'name' => 'Bonite Bottlers',
                'logo' => 'Logo/Bonitte.jpeg',
                'description' => 'Bonite Bottlers Limited, based in Moshi, Kilimanjaro, is a leading beverage company in northern Tanzania and a franchise bottler for Coca-Cola products. The company produces and distributes soft drinks and the popular Kilimanjaro Drinking Water brand across regions',
                'website_url' => 'https://www.instagram.com/bonitebottlers/?hl=en',
            ],
            [
                'name' => "The African Court on Human and Peoples' Rights (AfCHPR)",
                'logo' => 'Logo/African court.png',
                'description' => "A continental court established by the African Union to ensure the protection of human and peoples' rights across Africa. It adjudicates cases of alleged human rights violations and ensures that member states adhere to the African Charter on Human and Peoples' Rights.",
                'website_url' => 'https://www.african-court.org/wpafc/',
            ],
            [
                'name' => 'Habari Node',
                'logo' => 'Logo/HabariNode.png',
                'description' => 'A company specializing in internet provision and connectivity solutions. It offers various services, including high-speed internet access, data solutions, and network infrastructure. The company aims to enhance connectivity in the region by providing reliable and efficient internet services to businesses and individuals.',
                'website_url' => 'https://www.habarinode.co.tz',
            ],
            [
                'name' => 'Tanzania National Debate Championship(TNDC)',
                'logo' => 'Logo/TNDC LOGO.png',
                'description' => 'Tanzania National Debate Championship (TNDC) is the branch of Tanzania National Debate Society.',
                'website_url' => null,
            ],
            [
                'name' => 'East African Schools Debate Championship(EASDC)',
                'logo' => 'Logo/EASDC Logo.png',
                'description' => 'East African Schools Debate Championship is a branch of Tanzania National Debate Society.',
                'website_url' => null,
            ],
            [
                'name' => 'The School of St Jude',
                'logo' => 'Images/St Jude Logo.png',
                'description' => 'The School of St Jude is a pioneering leader in charitable education within Africa.',
                'website_url' => 'https://www.schoolofstjude.org',
            ],
        ];

        foreach ($partners as $index => $partner) {
            Partner::updateOrCreate(
                ['name' => $partner['name']],
                [
                    'description' => $partner['description'],
                    'website_url' => $partner['website_url'],
                    'logo_path' => $this->copyLegacyImage($partner['logo'], 'partners'),
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
