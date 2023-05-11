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
        Schema::create('authors_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('authors_id')->unsigned();
            $table->unsignedBiginteger('documents_id')->unsigned();
            $table->foreign('authors_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('documents_id')->references('id')->on('documents')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors_documents');
    }
};
