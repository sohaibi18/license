<?php

use App\Models\District;
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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('Applicant_Name');
            $table->string('Applicant_Father_Name');
            $table->string('CNIC');
            $table->string('Mobile_Number');
            $table->string('Email');
            $table->string('Personal_Address');
            $table->foreignIdFor(District::class)->constrained();
            $table->string('Profile_Image');
            $table->string('CNIC_Image');
            $table->string('Gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
