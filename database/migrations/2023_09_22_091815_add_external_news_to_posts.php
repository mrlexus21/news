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
        Schema::table('posts', function (Blueprint $table) {
            $table->text('source_name')->after('content')->nullable();
            $table->text('source_link')->after('content')->nullable();
            $table->text('source_image')->after('content')->nullable();
            $table->boolean('partner_news')->after('content')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('source_name');
            $table->dropColumn('source_link');
            $table->dropColumn('source_image');
            $table->dropColumn('partner_news');
        });
    }
};
