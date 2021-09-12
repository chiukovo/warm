<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply', function (Blueprint $table) {
            $table->id();
            $table->integer('types_id')->default(0);
            $table->integer('products_id')->default(0);
            $table->integer('status')->default(0);
            $table->string('name');
            $table->string('id_number');
            $table->string('age');
            $table->text('res_address');
            $table->text('current_address');
            $table->string('phone');
            $table->string('identity');
            $table->string('line_id');
            $table->string('ip');
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
        Schema::dropIfExists('apply');
    }
}
