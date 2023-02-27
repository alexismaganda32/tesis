<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSafeControl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safe_control', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();           
            $table->string('rsv_folio')->nullable();
            $table->string('rsv_room')->nullable();
            $table->timestamp('check_in')->useCurrent();
            $table->timestamp('check_out')->useCurrent();
            $table->text('data_emergency')->nullable();
            $table->tinyInteger('accept_terms')->default(-1);
            $table->string('signature_img');
            $table->integer('id_lang');
            $table->tinyInteger('status')->default(1);            
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
        Schema::dropIfExists('safe_control');
    }
}
