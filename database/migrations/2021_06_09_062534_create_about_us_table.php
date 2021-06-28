<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image')->nullable();
            $table->string('banner_name')->nullable();
            $table->string('service_title')->nullable();
            $table->string('service_intro')->nullable();
            $table->longtext('service_description')->nullable();
            $table->string('service_image')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->longtext('testimonial_feedback')->nullable();
            $table->longtext('testimonial_name')->nullable();
            $table->longtext('testimonial_post')->nullable();
            $table->longtext('testimonial_image')->nullable();
            $table->longtext('staff_name')->nullable();
            $table->longtext('staff_post')->nullable();
            $table->longtext('staff_image')->nullable();
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
        Schema::dropIfExists('about_us');
    }
}
