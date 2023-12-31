<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->string('Business_Email')->nullable()->change();
            $table->string('Website')->nullable()->change();
            $table->string('Start_Date')->nullable()->change();
            $table->string('Food_Handlers')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropColumn('Business_Email');
            $table->dropColumn('Website');
            $table->dropColumn('Start_Date');
            $table->dropColumn('Food_Handlers');
        });
    }
};
