<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_item', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\AppOfHolding\Character::class)
                ->references('id')
                ->on('characters')
                ->onDelete('cascade');

            $table->foreignIdFor(\App\Models\AppOfHolding\Item::class)
                ->references('id')
                ->on('items')
                ->onDelete('cascade');

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
        Schema::dropIfExists('character_item');
    }
}
