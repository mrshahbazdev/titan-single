<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('systemsettings', function (Blueprint $table) {
            $table->text('chatbot_code')->nullable()->after('rechargeTimes');
        });
    }

    public function down(): void
    {
        Schema::table('systemsettings', function (Blueprint $table) {
            $table->dropColumn('chatbot_code');
        });
    }
};
