<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsCompleteColumnInLessonTakens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lesson_takens', function (Blueprint $table) {
            $table->tinyInteger('is_complete')->default(0)->after('lesson_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lesson_takens', function (Blueprint $table) {
            $table->dropColumn('is_complete');
        });
    }
}
