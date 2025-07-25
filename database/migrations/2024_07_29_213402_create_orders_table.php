<?php

use App\PaymentStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->float('total');
            $table->string('payment_method')->default('cash');
            $table->foreignId('coupon_id')->nullable();
            $table->string('payment_status')->default(PaymentStatus::Pending);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('shipping_address_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
