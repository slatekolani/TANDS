<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParticipantDetailsToEventRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('phone');
            $table->unsignedTinyInteger('age')->nullable()->after('gender');
            $table->string('school')->nullable()->after('age');
            $table->string('category')->nullable()->after('school');
            $table->decimal('amount_paid', 10, 2)->nullable()->after('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->dropColumn(['gender', 'age', 'school', 'category', 'amount_paid']);
        });
    }
}
