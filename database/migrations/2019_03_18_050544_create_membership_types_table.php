<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membership_id');
            $table->boolean('is_specialized')->default(false);
            $table->boolean('is_engineer')->default(false);
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_types');
    }
}
