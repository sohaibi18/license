<?php

use App\Models\ProductApplication;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Before adding the foreign key constraint
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('product_application_id')->nullable()->after('license_application_id');
        });

// Update existing records
        DB::table('payments')
            ->whereNotNull('product_application_id')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('product_applications')
                    ->whereColumn('product_applications.id', 'payments.product_application_id');
            })
            ->update(['product_application_id' => null]);

// Add the foreign key constraint
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('product_application_id')->references('id')->on('product_applications');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['product_application_id']);
            $table->dropColumn('product_application_id');
        });
    }
};
