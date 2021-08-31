<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSystemSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_setting', function (Blueprint $table) {
            $table->id();
            $table->text('line_link')->nullable();
            $table->text('fb_link')->nullable();
            $table->text('ig_link')->nullable();
            $table->text('business_hours')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->timestamps();
        });

        $date = date('Y-m-d H:i:s');

        DB::table('system_setting')->insert([
            'created_at' => $date,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_setting');
    }
}
