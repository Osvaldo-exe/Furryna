<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_owner')->after('product_name');
            
            // Tambahkan foreign key constraint
            $table->foreign('product_owner')
                  ->references('email')
                  ->on('users')
                  ->onDelete('cascade'); // Atur tindakan jika data dihapus
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_owner']);

            $table->dropColumn('product_owner');
        });
    }
};