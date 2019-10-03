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
            $table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('name')->index();
            $table->text('details')->nullable();
            $table->text('email')->nullable();
            $table->text('mobile')->nullable();
            $table->text('landline')->nullable();
            $table->text('linkedin')->nullable();
            $table->boolean('notify_when_available')->default(0)->index();
            $table->tinyInteger('follow_up_count')->nullable()->index();
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
