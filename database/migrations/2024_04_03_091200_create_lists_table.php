<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('orderindex');
            $table->string('content');
            $table->string('assignee');
            $table->string('task_count');
            $table->integer('due_date');
            $table->string('start_date');
            $table->string('archived');
            $table->string('override_statuses');
            $table->string('permission_level');
            $table->string('status_id');
            $table->string('priority_id');
            $table->string('folder_id');
            $table->string('space_id');
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
        Schema::dropIfExists('lists');
    }
}
