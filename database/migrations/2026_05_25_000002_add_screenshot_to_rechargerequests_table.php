<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rechargerequests', function (Blueprint $table) {
            $table->string('screenshot')->nullable()->after('method');
        });
    }

    public function down(): void
    {
        Schema::table('rechargerequests', function (Blueprint $table) {
            $table->dropColumn('screenshot');
        });
    }
};
