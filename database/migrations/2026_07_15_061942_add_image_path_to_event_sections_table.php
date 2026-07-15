<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToEventSectionsTable extends Migration
{
    public function up()
    {
        Schema::table('event_sections', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('body');
        });
    }

    public function down()
    {
        Schema::table('event_sections', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
}
