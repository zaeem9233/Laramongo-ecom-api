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
        Schema::create('products', function (Blueprint $table) {
            $table->string('name');
            $table->string('thumb_link')->nullable();
            $table->json('img_links')->nullable();
            $table->json('vid_links')->nullable();
            $table->string('price');
            $table->text('des')->nullable();
            $table->foreignIdFor(\App\Models\Category::class, 'category_id');
            $table->foreignIdFor(\App\Models\Brand::class, 'brand_id');
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->timestamps();

            $table->index('category_id');
            $table->index('brand_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
