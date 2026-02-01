<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Muestra el tablón de notas
     */
    public function index() {
        $books = Book::paginate(10);
        return view('projects.index', compact('books'));
    }

    /**
     * Guarda una nueva nota
     */
    public function store(Request $request)
    {
        // validamos que lleguen los datos
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'image' => 'required',
        ]);

        \App\Models\Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'image' => $request->image,
            'is_available' => true
        ]);

        return redirect()->route('projects.index')->with('success', __('Nota publicada correctamente'));
    }

    /**
     * Actualiza una nota existente
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('projects.index')->with('success', '¡Nota actualizada correctamente!');
    }

    /**
     * Elimina una nota
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('projects.index')->with('success', '¡Nota eliminada del tablón!');
    }
}
