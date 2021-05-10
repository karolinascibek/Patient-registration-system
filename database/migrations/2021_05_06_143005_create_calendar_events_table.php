<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("calendar_id");
            $table->unsignedBigInteger("user_id");

            $table->foreign("calendar_id")->references("id")->on("calendars")->onDelete('cascade');
            $table->foreign("user_id")->references("id")->on("users");

            $table->string('contents');
            $table->date('date');
            $table->time("time_start");
            $table->time("time_end");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendar_events');
    }
}
