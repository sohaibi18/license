<?php

use App\Models\Business;
use App\Models\District;
use App\Models\LicenseCategory;
use App\Models\User;
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
        Schema::create('license_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Business::class)->constrained();
            $table->foreignIdFor(LicenseCategory::class)->constrained();
            $table->string('ProcLvl');
            $table->string('Affidavit')->nullable();
            $table->string('Medical_Certificate')->nullable();
            $table->date('Expire_Date')->nullable();
            $table->string('License_No')->nullable();
            $table->string('QRImage')->nullable();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(District::class)->constrained();
            $table->date('Update_Date');
            $table->date('Submit_Date');
            $table->date('Issue_Date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_applications');
    }
};
