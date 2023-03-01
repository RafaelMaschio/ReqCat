<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_suggestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requirement_types_id')
            ->constrained('requirement_types')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('motivated_for')->nullable();
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
        Schema::dropIfExists('requirement_sugestions');
    }
};
