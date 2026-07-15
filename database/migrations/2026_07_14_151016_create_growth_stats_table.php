<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrowthStatsTable extends Migration
{
    public function up()
    {
        Schema::create('growth_stats', function (Blueprint $table) {
            $table->id();
            $table->string('icon_class')->default('fas fa-chart-line');
            $table->string('label');
            $table->unsignedInteger('value')->default(0);
            $table->string('suffix')->default('+');
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('growth_stats');
    }
}
