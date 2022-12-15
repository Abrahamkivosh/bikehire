<?php

use App\Models\User;

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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_number');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(\App\Models\Bike::class);
            $table->integer('quantity');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('price_per_hour', 8, 2);
            $table->decimal('total_hours', 8, 2);
            $table->decimal('total', 8, 2);
            $table->enum('status', ['pending', 'approved', 'rejected', 'canceled','completed']);
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
        Schema::dropIfExists('books');
    }
};
