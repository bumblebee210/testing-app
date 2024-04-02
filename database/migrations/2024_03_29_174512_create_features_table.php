<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id('featuresId');
            $table->string('due_dates');
            $table->string('time_tracking');
            $table->string('tags');
            $table->string('time_estimates');
            $table->string('checklists');
            $table->string('custom_fields');
            $table->string('remap_dependencies');
            $table->string('dependency_warning');
            $table->string('portfolios');
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
        Schema::dropIfExists('features');
    }
}
