<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qa_page', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->timestamps();
        });

        $date = date('Y-m-d H:i:s');

        DB::table('qa_page')->insert([
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
        Schema::dropIfExists('qa_page');
    }
}
