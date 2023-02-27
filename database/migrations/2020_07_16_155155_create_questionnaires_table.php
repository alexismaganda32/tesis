<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            //section one
            $table->string('email');
            $table->string('full_name');
            $table->integer('age');
            $table->string('nationality');
            $table->string('telephone');
            //section two
            $table->string('body_temperature');
            $table->tinyInteger('runny_nose')->comment('0 = no, 1 = yes');
            $table->tinyInteger('sore_throat')->comment('0 = no, 1 = yes');
            $table->tinyInteger('joint_pain')->comment('0 = no, 1 = yes');
            $table->tinyInteger('cough')->comment('0 = no, 1 = yes');
            $table->tinyInteger('abdominal_pain')->comment('0 = no, 1 = yes');
            $table->tinyInteger('headache')->comment('0 = no, 1 = yes');
            $table->tinyInteger('threw_up')->comment('0 = no, 1 = yes');
            $table->tinyInteger('diarrhea')->comment('0 = no, 1 = yes');
            $table->tinyInteger('muscle_pain')->comment('0 = no, 1 = yes');
            $table->tinyInteger('general_weakness_and_malaise')->comment('0 = no, 1 = yes');
            //section three
            $table->tinyInteger('have_recently_traveled_abroad')->comment('0 = no, 1 = yes');
            $table->tinyInteger('have_a_chronic_disease')->comment('0 = no, 1 = yes');
            $table->tinyInteger('has_had_contact_with_covid')->comment('0 = no, 1 = yes');
            //section signature
            $table->longText('signature');

            $table->string('language', 10);

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
        Schema::dropIfExists('questionnaires');
    }
}
