<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('dni');
            $table->timestamps();
         });
 
         Schema::create('roles', function (Blueprint $table){
             $table->increments('id');
             $table->string('nombre');
         });
 
         Schema::create('role_user', function(Blueprint $table){
             $table->integer('role_id')->unsigned();
             $table->foreign('role_id')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
         });
 
         Schema::create('purchases', function(Blueprint $table){
             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->timestamps();
         });
 
         Schema::create('genres', function(Blueprint $table){
             $table->increments('id');
             $table->string('name');
         });
 
         Schema::create('artists', function(Blueprint $table){
             $table->increments('id');
             $table->string('firstname');
             $table->string('lastname');
             $table->string('stagename');
         });
 
         Schema::create('articles', function(Blueprint $table){
             $table->increments('id');
             $table->string('name');
             $table->mediumText('description');
             $table->integer('exist');
             $table->string('img_route');
             $table->date('year');
             $table->double('price', 3,2);
             $table->integer('artist_id')->unsigned();
             $table->foreign('artist_id')->references('id')->on('artists')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->timestamps();
         });
 
         Schema::create('article_genre', function(Blueprint $table){
             $table->integer('genre_id')->unsigned();
             $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->integer('article_id')->unsigned();
             $table->foreign('article_id')->references('id')->on('articles')->onUpdate('CASCADE')->onDelete('CASCADE');
         });
 
         Schema::create('article_purchase', function(Blueprint $table){
             $table->integer('purchase_id')->unsigned();
             $table->foreign('purchase_id')->references('id')->on('purchases')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->integer('article_id')->unsigned();
             $table->foreign('article_id')->references('id')->on('articles')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->integer('quant');
         });
 
         Schema::create('payments', function(Blueprint $table){
             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->double('total',3,2);
             $table->timestamps();
         });
 
         Schema::create('bills', function(Blueprint $table){
             $table->increments('id');
             $table->integer('payment_id')->unsigned();
             $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('CASCADE')->onDelete('CASCADE');
         });
 
         Schema::create('orders', function(Blueprint $table){
             $table->increments('id');
             $table->integer('quant');
             $table->timestamps();
             $table->integer('article_id')->unsigned();
             $table->foreign('article_id')->references('id')->on('articles')->onUpdate('CASCADE')->onDelete('CASCADE');
         });
 
         Schema::create('order_user', function(Blueprint $table){
             $table->integer('order_id')->unsigned();
             $table->foreign('order_id')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('order_user');
        Schema::dropIfExists('role_users');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('genres');
        Schema::dropIfExists('artist');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_genre');
        Schema::dropIfExists('article_purchase');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_user');
    }
}
