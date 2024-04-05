<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('id');
            $table->string('custom_id');
            $table->string('custom_item_id');
            $table->string('text_content');
            $table->string('description');
            $table->string('mark_description');
            $table->string('status');
            $table->integer('orderindex');
            $table->integer('date_created');
            $table->integer('date_updated');
            $table->string('date_closed');
            $table->string('date_done');
            $table->string('creator');
            $table->string('assignees');
            $table->string('watchers');
            $table->string('checklists');
            $table->string('tags');
            $table->string('parent');
            $table->string('priority');
            $table->string('due_date');
            $table->string('start_date');
            $table->string('time_estimate');
            $table->string('time_spent');
            $table->string('custom_fields');
            $table->string('list');
            $table->string('folder');
            $table->string('space');
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
        Schema::dropIfExists('tasks');
    }
}
