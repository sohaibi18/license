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
        Schema::table('license_applications', function (Blueprint $table) {
            $table->enum('ProcLvl', ['Submitted', 'Finance Verified', 'License Approved', 'Issued',
                'Printed', 'Dispatched', 'Expired']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('license_applications', function (Blueprint $table) {
            $table->dropColumn('ProcLvl');
        });
    }
};
