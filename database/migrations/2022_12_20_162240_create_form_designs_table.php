<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_designs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_name',100);
            $table->string('fathers_name',100);
            $table->string('mothers_name',100);
            $table->longtext('address')->nullable();
            $table->double('fees',10,2);
            $table->integer('status')->comment(' 0 = inactive , 1 = Active');
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
        Schema::dropIfExists('form_designs');
    }
}
