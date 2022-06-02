<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();  
            $table->bigInteger('account_number')->unique();    
            $table->boolean('active');         
            $table->decimal('balance');       
            $table->unsignedBigInteger('user_id');        
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();//foreign key from table users
            $table->unsignedBigInteger('currency_id');    
            $table->foreign('currency_id')->references('id')->on('currencies')->restrictOnDelete();//foreign key form currencies   
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
        Schema::dropIfExists('accounts');
    }
}
