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
        Schema::table('product_applications', function (Blueprint $table) {
            $table->string('Product_Label')->after('Lab_Analysis_Report')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_applications', function (Blueprint $table) {
            $table->dropColumn('Product_Label');
        });
    }
};
