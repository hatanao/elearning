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
        DB::statement("ALTER TABLE user_answer MODIFY COLUMN id INT NOT NULL PRIMARY KEY AUTO_INCREMENT");            
    }

  public function down()
    {
        DB::statement("ALTER TABLE user_answer MODIFY COLUMN id INT NOT NULL");
        DB::statement("ALTER TABLE user_answer DROP PRIMARY KEY");
        DB::statement("ALTER TABLE user_answer MODIFY COLUMN id INT NULL");
    }
}
