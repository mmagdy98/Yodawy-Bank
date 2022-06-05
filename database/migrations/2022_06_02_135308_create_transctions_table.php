<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transctions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('send_account_id');
            $table->foreign('send_account_id')->references('id')->on('accounts')->restrictOnDelete();
            $table->unsignedBigInteger('receive_account_id');  
            $table->foreign('receive_account_id')->references('id')->on('accounts')->restrictOnDelete();        
            $table->unsignedBigInteger('currency_id');        
            $table->foreign('currency_id')->references('id')->on('currencies')->restrictOnDelete();//foreign key form currencies           
            $table->decimal('amount');         
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
        Schema::dropIfExists('transctions');
    }
}
