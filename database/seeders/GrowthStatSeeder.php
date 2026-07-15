<?php

namespace Database\Seeders;

use App\Models\GrowthStat;
use Illuminate\Database\Seeder;

class GrowthStatSeeder extends Seeder
{
    public function run()
    {
        $stats = [
            ['icon_class' => 'fas fa-school', 'label' => 'Partner Schools', 'value' => 21, 'sort_order' => 0],
            ['icon_class' => 'fas fa-user-graduate', 'label' => 'Students Impacted', 'value' => 1800, 'sort_order' => 1],
            ['icon_class' => 'fas fa-user', 'label' => 'Alumni Network', 'value' => 1500, 'sort_order' => 2],
        ];

        foreach ($stats as $stat) {
            GrowthStat::updateOrCreate(['label' => $stat['label']], $stat + ['suffix' => '+', 'is_active' => true]);
        }
    }
}
