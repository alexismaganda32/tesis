<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanionQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companion_questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('questionnaire_id');
            $table->string('full_name');
            $table->tinyInteger('younger')->comment('0 = no, 1 = yes');
            $table->longText('signature')->nullable();
            $table->timestamps();

            $table->foreign('questionnaire_id')->references('id')->on('questionnaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companion_questionnaires');
    }
}
