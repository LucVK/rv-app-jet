<?php

use App\Models\Rv\ClubMember;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ClubMember::class); // ->constrained()->cascadeOnDelete();

            $table->string('firstname', 32);
            $table->string('lastname', 32);
            $table->string('birthdate')->nullable();
            $table->string('streetandnumber')->nullable();
            $table->string('zipcode', 4)->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();

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
        Schema::dropIfExists('profiles');
    }
};
