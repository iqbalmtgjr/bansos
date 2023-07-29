<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => random_int(123456789012, 923456789012),
            'no_kk' => random_int(123456789012, 923456789012),
            'nama_penduduk' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['pria', 'wanita']),
            'agama' => fake()->randomElement(['islam', 'krister', 'hindu', 'katolik']),
            'tgl_lahir' => fake()->dateTime(),
            'rt' => fake()->randomElement(['1', '2', '3', '4']),
            'rw' => fake()->randomElement(['1', '2', '3', '4']),
            'kel_desa' => fake()->cityPrefix(),
            'kecamatan' => fake()->cityPrefix(),
            'kabupaten' => fake()->city(),
            'provinsi' => fake()->stateAbbr(),
            'status_kawin' => fake()->randomElement([1, 0]),
            'pekerjaan' => fake()->randomElement(['wiraswasta', 'pns', 'polri', 'karyawan', 'petani']),
            'kewarganegaraan' => fake()->randomElement(['wni', 'wna']),
            'no_hp' => random_int(81111111111, 89999999999),
            'penghasilan' => fake()->randomElement(['>2juta', '<2juta', '>5juta']),
            'tanggungan' => fake()->randomElement(['1', '2', '3']),
            'cacat' => fake()->randomElement([1, 0]),
        ];
    }
}
