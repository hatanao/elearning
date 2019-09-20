<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeIdAsAutoIncrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_answer', function (Blueprint $table) {
            $table->increments('id')->first()->change();
        });    
    }

  public function down()
    {
        Schema::table('user_answer', function (Blueprint $table) {
        }); 
    }
}
