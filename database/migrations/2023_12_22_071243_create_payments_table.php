<?php

use App\Models\LicenseApplication;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(LicenseApplication::class)->constrained();
            $table->bigInteger('Due_Amount');
            $table->bigInteger('Paid_Amount');
            $table->date('Due_Date');
            $table->date('Deposit_Date');
            $table->date('Verified_Date');
            $table->foreignId('Verify_By')
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('Challan_Image');
            $table->string('Challan_No');
            $table->string('Remarks');
            $table->string('Transaction_Id');
            $table->string('Bank_Name');
            $table->string('Branch_Code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
