<?php

use App\Models\Discount;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unique('sku');
            $table->decimal("price", 18, 8);
            $table->foreignIdFor(Discount::class)->nullable()
                ->constrained('discounts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean("is_tax_exempt")->default(false);
            $table->boolean("status")->default(true);
            $table->boolean("is_kitchen_item")->default(false);
            $table->text("description")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
