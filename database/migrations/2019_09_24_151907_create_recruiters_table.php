<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('name')->index();
            $table->text('details')->nullable();
            $table->text('email')->nullable();
            $table->text('mobile')->nullable();
            $table->text('landline')->nullable();
            $table->text('linkedin')->nullable();
            $table->tinyInteger('notify_when_available')->index();
            $table->tinyInteger('follow_up_count')->index();
            $table->timestamp('latest_note_at')->nullable()->index();
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
        Schema::dropIfExists('recruiters');
    }
}
