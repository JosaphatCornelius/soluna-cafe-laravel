<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // MySQL stores the role as an ENUM; add the view-only "user" value.
        // SQLite stores enums as plain text, so no schema change is needed there.
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'editor', 'user') NOT NULL DEFAULT 'user'");
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::table('users')->where('role', 'user')->update(['role' => 'editor']);
            DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'editor') NOT NULL DEFAULT 'editor'");
        }
    }
};
