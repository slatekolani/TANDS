<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('series')->nullable();
            $table->string('year')->nullable();
            $table->string('theme')->nullable();
            $table->enum('status', ['upcoming', 'ongoing', 'past'])->default('upcoming');
            $table->date('event_date')->nullable();
            $table->string('location')->nullable();
            $table->string('banner_image')->nullable();
            $table->longText('description')->nullable();
            $table->string('registration_url')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
