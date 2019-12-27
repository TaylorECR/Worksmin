<?php

use App\Job;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->unsignedInteger('job_type_id');
            $table->foreign('job_type_id')->references('id')->on('job_types');
            $table->unsignedInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->float('min_salary', 8,2)->nullable();
            $table->float('max_salary', 8,2)->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->string('slug');
            $table->string('external_link')->nullable();
            $table->enum('status', [Job::PUBLISHED, Job::PENDING, Job::REJECTED])->default(Job::PENDING);
            $table->boolean('previous_approved')->default(false);
            $table->boolean('previous_rejected')->default(false);
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
        Schema::dropIfExists('jobs');
    }
}
