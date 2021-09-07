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
            $table->string('periods');
            $table->string('name');
            $table->string('phone');
            $table->string('profession');
            $table->string('age');
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
