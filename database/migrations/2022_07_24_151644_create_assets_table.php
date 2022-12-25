<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('assetId'); //item code
            $table->string('assetEntity')->nullable();//Article
            $table->string('assetDescription')->nullable();
            $table->string('assetPackageDetails')->nullable();
            $table->string('assetCategory');
            $table->string('assetUnitofMeasure')->nullable();
            $table->integer('assetCurrentStock');
            $table->string('assetLocation')->nullable();
            $table->string('assetExp')->nullable();
            $table->string('assetBufferLevel')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
