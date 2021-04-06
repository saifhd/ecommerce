<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();


            $table->string('category')->nullable();
            $table->string('coupon')->nullable();
            $table->string('product')->nullable();
            $table->string('blog')->nullable();
            $table->string('order')->nullable();
            $table->string('other_pro')->nullable();
            $table->string('report')->nullable();
            $table->string('role')->nullable();
            $table->string('return_pro')->nullable();
            $table->string('contact')->nullable();
            $table->string('comment')->nullable();
            $table->string('setting')->nullable();
            $table->string('type')->nullable();
            $table->string('stock')->nullable();


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
        Schema::dropIfExists('admins');
    }
}
