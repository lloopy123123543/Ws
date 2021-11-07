<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->text('Title_ad')
                ->comment('Title_ad');


            $table->text('Info_ad')
                ->comment('Info_ad');


            $table->text('Contact_name')
                ->comment('Contact_name');


            $table->integer('contact_phone')
                ->comment ('Phone_ad');


            $table->dateTime('date_end')
                ->comment('date end');
            $table->string('key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad');
    }
}
