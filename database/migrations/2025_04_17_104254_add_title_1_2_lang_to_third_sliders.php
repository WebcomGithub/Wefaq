<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('third_sliders', function (Blueprint $table) {
            $table->string('title_1_lang')->nullable();
            $table->string('title_2_lang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('third_sliders', function (Blueprint $table) {
            $table->dropColumn(['title_1_lang', 'title_2_lang']);
        });
    }
};
