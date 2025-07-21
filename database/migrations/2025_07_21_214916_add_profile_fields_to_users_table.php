<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->string('display_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('photo')->nullable();
            $table->string('invoice_address')->nullable();
            $table->string('invoice_postcode')->nullable();
            $table->string('invoice_city')->nullable();
            $table->foreignId('invoice_country_id')->nullable()->constrained('countries')->nullOnDelete();
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['invoice_country_id']);
            $table->dropColumn([
                'display_name',
                'phone_number',
                'phone_verified_at',
                'photo',
                'invoice_address',
                'invoice_postcode',
                'invoice_city',
                'invoice_country_id',
            ]);
        });
    }
};
