<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Visit::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'middle_name' => $faker->sentence,
        'last_name' => $faker->lastName,
        'married_last_name' => $faker->sentence,
        'first_name' => $faker->firstName,
        'second_name' => $faker->sentence,
        'observation' => $faker->sentence,
        'entry_date' => $faker->date(),
        'exit_date' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\State::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Dependency::class, static function (Faker\Generator $faker) {
    return [
        'id_dependency' => $faker->randomNumber(5),
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Visit::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'middle_name' => $faker->sentence,
        'last_name' => $faker->lastName,
        'married_last_name' => $faker->sentence,
        'first_name' => $faker->firstName,
        'second_name' => $faker->sentence,
        'entry_date' => $faker->dateTime,
        'exit_date' => $faker->dateTime,
        'state_id' => $faker->randomNumber(5),
        'dependency_id' => $faker->randomNumber(5),
        'observation' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Visit::class, static function (Faker\Generator $faker) {
    return [
        'ci' => $faker->randomNumber(5),
        'name' => $faker->firstName,
        'middle_name' => $faker->sentence,
        'last_name' => $faker->lastName,
        'married_last_name' => $faker->sentence,
        'first_name' => $faker->firstName,
        'second_name' => $faker->sentence,
        'entry_date' => $faker->dateTime,
        'exit_date' => $faker->dateTime,
        'observation' => $faker->sentence,
        'state_id' => $faker->randomNumber(5),
        'dependency_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Dependency::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Visit::class, static function (Faker\Generator $faker) {
    return [
        'CI' => $faker->randomNumber(5),
        'Full_Name' => $faker->sentence,
        'First_Surname' => $faker->sentence,
        'Second_Surname' => $faker->sentence,
        'Married_Surname' => $faker->sentence,
        'First_Name' => $faker->sentence,
        'Second_Name' => $faker->sentence,
        'Observation' => $faker->sentence,
        'Entry_Datetime' => $faker->dateTime,
        'Exit_Datetime' => $faker->dateTime,
        'state_id' => $faker->randomNumber(5),
        'dependency_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Visit::class, static function (Faker\Generator $faker) {
    return [
        'CI' => $faker->randomNumber(5),
        'Full_Name' => $faker->sentence,
        'First_Surname' => $faker->sentence,
        'Second_Surname' => $faker->sentence,
        'Married_Surname' => $faker->sentence,
        'First_Name' => $faker->sentence,
        'Second_Name' => $faker->sentence,
        'Reason' => $faker->sentence,
        'Observation' => $faker->sentence,
        'Entry_Datetime' => $faker->dateTime,
        'Exit_Datetime' => $faker->dateTime,
        'state_id' => $faker->randomNumber(5),
        'dependency_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Meeting::class, static function (Faker\Generator $faker) {
    return [
        'CI' => $faker->randomNumber(5),
        'Names' => $faker->sentence,
        'First_Names' => $faker->sentence,
        'Reason' => $faker->sentence,
        'Observation' => $faker->sentence,
        'With_whom' => $faker->sentence,
        'Meeting_Date' => $faker->dateTime,
        'Entry_Datetime' => $faker->dateTime,
        'Exit_Datetime' => $faker->dateTime,
        'state_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Reportev::class, static function (Faker\Generator $faker) {
    return [
        'inicio' => $faker->dateTime,
        'fin' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\RoleAdminUser::class, static function (Faker\Generator $faker) {
    return [
        'admin_users_id' => $faker->randomNumber(5),
        'roles_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Role::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Reportea::class, static function (Faker\Generator $faker) {
    return [
        'inicio' => $faker->date(),
        'fin' => $faker->date(),
        
        
    ];
});
