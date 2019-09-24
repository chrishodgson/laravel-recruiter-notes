<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::disableForeignKeyConstraints();

        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->index();
            $table->bigInteger('recruiter_id')->index();
            $table->text('details');
            $table->tinyInteger('follow_up')->index();
            $table->timestamps();
        });

//        Schema::table('notes', function (Blueprint $table) {
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('recruiter_id')->references('id')->on('recruiters');
//        });

//        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
