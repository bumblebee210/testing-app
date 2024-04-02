<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->id('spacesId');
            $table->string('name');
            $table->string('private');
            $table->string('color');
            $table->longtext('avatar');
            $table->boolean('admin_can_manage');
            $table->boolean('archived');
            $table->string('members');
            $table->string('statuses');
            $table->string('multiple_assignees');
            $table->string('features');
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
        Schema::dropIfExists('spaces');
    }
}
