<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('promotions', function (Blueprint $table) {
            if (!Schema::hasColumn('promotions', 'tag')) {
                $table->string('tag')->nullable()->after('description');
            }
            if (!Schema::hasColumn('promotions', 'cta')) {
                $table->string('cta')->nullable()->after('tag');
            }
        });
    }

    public function down(): void
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->dropColumn(array_filter(['tag', 'cta'], fn ($col) => Schema::hasColumn('promotions', $col)));
        });
    }
};
