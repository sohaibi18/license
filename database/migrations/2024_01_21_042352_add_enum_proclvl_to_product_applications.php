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
            $table->enum('ProcLvl', ['Pending', 'Submitted', 'Finance Verified', 'License Approved', 'Issued',
                'Printed', 'Dispatched', 'Expired'])->after('Affidavit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_applications', function (Blueprint $table) {
            $table->dropColumn('ProcLvl');
        });
    }
};
