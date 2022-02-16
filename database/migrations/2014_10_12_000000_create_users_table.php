<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email',128)->unique();
            $table->string('image')->default('assets/avatar.png');
            $table->string('role')->nullable(); //0=admin ; 1=Lab attendent; 2=Patient;
            //Lab attendent
            $table->string('business_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('postal')->nullable();
            $table->string('notes')->nullable();
            //Patient
            $table->integer('creator_id')->nullable();
            $table->string('u_r_num')->nullable();
            $table->string('c_r_num')->nullable();
            $table->string('dob')->nullable();
            $table->string('passport')->nullable();
            $table->string('gender')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('address2')->nullable();
            $table->string('town')->nullable();
            $table->string('country')->nullable();
            $table->string('swab_date')->nullable();
            $table->string('swab_time')->nullable();
            $table->string('wish')->nullable();
            $table->string('pcr_rate')->nullable();
            $table->string('result_date')->nullable();
            $table->string('certifacte_link')->nullable();

            $table->integer('status')->default(0);

            $table->string('password',128)->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
