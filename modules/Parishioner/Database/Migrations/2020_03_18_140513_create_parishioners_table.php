<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParishionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parishioners', function (Blueprint $table) {
            $table->bigIncrements('id');

            //individualt details
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("title")->nullable();
            $table->string("surname")->nullable();
            $table->string("address")->nullable();
            $table->string("email")->nullable();
            $table->string("telephone_number")->nullable();
            $table->string("whatsapp_number")->nullable();
            $table->string("gender")->default("male");
            $table->string("marital_status")->nullable();
            $table->string("small_christian_community")->nullable();
            $table->dateTime("date_of_birth")->nullable();
            $table->string("state")->nullable();
            $table->string("town")->nullable();
            $table->string("village")->nullable();
            $table->string("parishioner_status")->default("employed");
            $table->string("occupation")->nullable();

            // sacredment details
            $table->string("are_you_baptized")->nullable();
            $table->string("baptized_parish_name")->nullable();
            $table->string("baptized_parish_state_town")->nullable();
            $table->string("baptized_date")->nullable();
            $table->string("are_you_communicant")->nullable();
            $table->string("communicant_parish_name")->nullable();
            $table->string("communicant_parish_state_town")->nullable();
            $table->string("communicant_date")->nullable();
            $table->string("are_you_confirmed")->nullable();
            $table->string("confirmed_parish_name")->nullable();
            $table->string("confirmed_parish_state_town")->nullable();
            $table->string("confirmed_date")->nullable();
            $table->string("are_you_married")->nullable();
            $table->string("married_parish_name")->nullable();
            $table->string("married_parish_state_town")->nullable();
            $table->string("married_date")->nullable();

            // society details
            $table->string("statutory_organization")->default("None");
            $table->string("are_you_society_member")->nullable();
            $table->text("sunday_mass_attend")->nullable();

            $table->string("registration_number")->nullable();

            // profile_picture
            $table->string("profile_picture")->nullable();

            $table->longText("organisation_1")->nullable();
            $table->longText("organisation_2")->nullable();
            $table->longText("organisation_3")->nullable();
            $table->longText("organisation_4")->nullable();
            $table->longText("organisation_5")->nullable();

            // other things
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('parishioner_societies', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("title")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parishioners');
        Schema::dropIfExists('parishioner_societies');
    }
}
