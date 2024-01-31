<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class CreatePepoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('street');
            $table->string('city');
            $table->string('country');
            $table->string('apartment_number');
            $table->timestamps();
        });

        // Wygeneruj 200 losowych instancji obiektu People
        $faker = Faker::create();
        for ($i = 0; $i < 200; $i++) {
            DB::table('people')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone_number' => $faker->phoneNumber,
                'street' => $faker->streetName,
                'city' => $faker->city,
                'country' => $faker->country,
                'apartment_number' => $faker->buildingNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}

