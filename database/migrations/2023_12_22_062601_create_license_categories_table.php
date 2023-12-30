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
        Schema::create('license_categories', function (Blueprint $table) {
            $table->id();
            $table->string('License_Category_Name');
            $table->bigInteger('License_Fee');
            $table->enum('Level',['Active','Inactive']);
            $table->unsignedBigInteger('Parent_Id')->nullable();
            $table->foreign('Parent_Id')
                ->references('id')
                ->on('license_categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_categories');
    }
};
