<?php

use App\Models\BusinessType;
use App\Models\District;
use App\Models\Owner;
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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Owner::class)->constrained();
            $table->string('Business_Name');
            $table->foreignIdFor(BusinessType::class)->constrained();
            $table->string('Business_Address');
            $table->string('Contact_Number');
            $table->string('Business_Email');
            $table->string('Website');
            $table->foreignIdFor(District::class)->constrained();
            $table->string('Start_Date');
            $table->string('Food_Handlers');
            $table->string('Latitude');
            $table->string('Longitude');
            $table->foreignIdFor(User::class)->constrained();
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
