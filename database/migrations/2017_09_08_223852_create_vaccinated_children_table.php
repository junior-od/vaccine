<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVaccinatedChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccinated_children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('child_first_name');
            $table->string('child_last_name');
            $table->string('child_age');
            $table->string('guardian_first_name');
            $table->string('guardian_last_name');
            $table->string('contact_phone');
            $table->string('address');
            $table->string('vaccine_name')->nullable();
            $table->integer('vaccine_given')->default(false);
            $table->integer('reported_by')->unsigned();
            $table->foreign('reported_by')->references('id')->on('users');
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
        Schema::dropIfExists('vaccinated_children');
    }
}
