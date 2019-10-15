<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('details')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn('title')->nullable(false);
            $table->text('details')->nullable(false)->change();
        });
    }
}
