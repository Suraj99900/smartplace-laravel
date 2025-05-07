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
        Schema::create('staff_upload', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('isbn')->nullable();
            $table->integer('semester')->index();
            $table->string('description');
            $table->string('file_name');
            $table->integer('file_type');
            $table->string('user_name')->nullable();
            $table->timestamp('added_on');
            $table->integer('status')->index()->default(1);
            $table->integer('deleted')->index()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_upload');
    }
};
