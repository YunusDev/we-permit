<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('google_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->string('occupation')->nullable();
            $table->string('avatar')->nullable();
            $table->string('avatar_original')->nullable();
            $table->text('picture')->nullable();
            $table->text('word_doc')->nullable();
            $table->text('pdf_doc')->nullable();
            $table->string('dob')->nullable();
            $table->string('sex')->nullable();

            $table->string('state_of_origin')->nullable();
            $table->boolean('stage_1')->nullable()->default(0);
            $table->boolean('complete_reg')->nullable()->default(0);

            $table->boolean('not_reviewed')->nullable()->default(0);

            $table->boolean('reviewer_approves')->nullable()->default(0);
            $table->text('reviewer_comment')->nullable();

            $table->boolean('processor_approves')->nullable()->default(0);
            $table->text('processor_comment')->nullable();

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
