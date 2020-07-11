<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('category_id');
            $table->integer('vacancy');
            $table->string('title');
            $table->string('slug');
            $table->string('position');
            $table->string('job_type');
            $table->string('job_context');
            $table->integer('salary');
            $table->date('last_date');
            $table->text('education');
            $table->text('experience');
            $table->text('description');
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
        Schema::dropIfExists('jobs');
    }
}
