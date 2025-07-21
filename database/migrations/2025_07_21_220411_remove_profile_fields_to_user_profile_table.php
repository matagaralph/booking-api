<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['invoice_country_id']);
            $table->dropColumn([
                'invoice_address',
                'invoice_postcode',
                'invoice_city',
                'invoice_country_id',
            ]);
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->string('invoice_address')->nullable();
            $table->string('invoice_postcode')->nullable();
            $table->string('invoice_city')->nullable();
            $table->foreignId('invoice_country_id')->nullable()->constrained('countries')->nullOnDelete();
        });
    }
};
