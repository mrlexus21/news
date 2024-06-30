<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->smallInteger('status')->default(User::STATUS_ACTIVE)->after('remember_token');
            $table->string('verify_token')->after('status')->nullable()->unique();
        });

        DB::table('users')->update([
            'status' => User::STATUS_ACTIVE,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('verify_token');
        });
    }
};
