<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Vaciamos la tabla para que no se mezclen con los viejos
            Book::truncate();

            Book::create([
                'title' => 'El Quijote',
                'author' => 'Alumno 1',
                'image' => 'Es una obra maestra, me encanta cómo Alonso Quijano ve gigantes donde hay molinos.',
                'is_available' => true,
            ]);

            Book::create([
                'title' => '1984',
                'author' => 'Alumno 2',
                'image' => 'Un poco aterrador pensar en el Gran Hermano, pero muy necesario leerlo.',
                'is_available' => true,
            ]);

            Book::create([
                'title' => 'Rayuela',
                'author' => 'Alumno 3',
                'image' => 'Un libro fascinante que se puede leer de muchas formas. ¡Súper recomendado!',
                'is_available' => true,
            ]);

            Book::create([
                'title' => 'Fahrenheit 451',
                'author' => 'Alumno 4',
                'image' => 'Me hizo reflexionar mucho sobre la importancia de los libros en nuestra sociedad.',
                'is_available' => true,
            ]);

            Book::create([
                'title' => 'El Principito',
                'author' => 'Alumno 5',
                'image' => 'Lo esencial es invisible a los ojos. Una nota llena de magia para la clase.',
                'is_available' => true,
            ]);
    }
}
