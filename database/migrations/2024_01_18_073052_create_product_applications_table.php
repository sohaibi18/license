<?php

use App\Models\Business;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Business::class)->constrained();
            $table->foreignIdFor(Owner::class)->constrained();
            $table->string('Product_Name')->unique();
            $table->string('Lab_Analysis_Report');
            $table->enum('ProcLvl', ['Submitted', 'Finance Verified', 'Product Approved', 'Issued', 'Printed', 'Dispatched', 'Closed', 'Cancelled']);
            $table->string('Affidavit')->nullable();
            $table->date('Expire_Date')->nullable();
            $table->string('Product_Registration_No')->nullable();
            $table->string('QRImage')->nullable();
            $table->foreignIdFor(User::class)->constrained();
            $table->date('Update_Date')->nullable();
            $table->date('Submit_Date');
            $table->date('Finance_Verified_Date')->nullable();
            $table->date('Registration_Approved_Date')->nullable();
            $table->date('Printed_Date')->nullable();
            $table->date('Dispatched_Date')->nullable();
            $table->date('Issue_Date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_applications');
    }
};
