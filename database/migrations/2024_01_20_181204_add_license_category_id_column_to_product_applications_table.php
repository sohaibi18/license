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
            $table->foreignIdFor(\App\Models\LicenseCategory::class)->nullable()->constrained()->after('owner_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_applications', function (Blueprint $table) {
            $table->dropColumn('license_category_id');
            $table->dropForeign('license_category_id');
        });
    }
};
