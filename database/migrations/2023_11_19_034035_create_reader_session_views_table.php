<?php

use App\Models\File;
use App\Models\ReaderSession;
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
        Schema::create('reader_session_views', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('reader_session_id');
            $table->morphs('viewable');
            $table->foreignIdFor(File::class, 'advertising_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reader_session_views');
    }
};
