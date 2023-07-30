<?php

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
        Schema::table('books', function (Blueprint $table) {
            $table -> unsignedBigInteger('type_id');
            $table -> Foreign('type_id')
                ->references("id")
                ->on('types');
        });

        Schema::table('book_technology', function (Blueprint $table) {
            $table -> foreignId('book_id') -> constrained();
            $table -> foreignId('technology_id') -> constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table -> dropForeign("books_type_id_foreign");
            $table ->dropColumn('type_id');
        });

        Schema::table('book_technology', function (Blueprint $table) {
            $table -> dropForeign("book_technology_book_id_foreign");
            $table -> dropForeign("book_technology_technology_id_foreign");

            $table ->dropColumn('book_id');
            $table ->dropColumn('technology_id');
        });


    }
};
