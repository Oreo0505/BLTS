<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('documents_id')->unsigned();
            $table->unsignedBiginteger('tags_id')->unsigned();
            $table->foreign('documents_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents_tags');
    }
};
