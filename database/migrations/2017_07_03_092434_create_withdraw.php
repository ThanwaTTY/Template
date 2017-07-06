<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdraw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('withdraw', function(Blueprint $table) {

    		    $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
    		    $table->string('username', 45)->nullable();
    		    $table->integer('balance')->nullable();
    		    $table->text('bankwithdraw')->nullable();
    		    $table->string('accountnumberwithdraw', 45)->nullable();
    		    $table->string('accountnamewithdraw', 45)->nullable();
    		    $table->dateTime('datetime')->nullable();
    		    $table->string('channelwithdraw', 45)->nullable();
    		    $table->string('tel', 45)->nullable();
    		    $table->string('opinion', 300)->nullable();



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
		Schema::drop('withdraw');
    }
}
