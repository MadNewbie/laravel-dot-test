<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::latest()->paginate(5);

        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        $types = Type::pluck('name','id');
        $authors = Author::pluck('name','id');
        return view('books.create', compact('types', 'authors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required',
            'type_id' => 'required',
            'author_id' => 'required',
        ]);

        Book::create([
            'title' => $request->title,
            'type_id' => $request->type_id,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('books.index')->with(['success' => 'Data berhasil tersimpan']);
    }

    public function show(string $id): View
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function edit(string $id): View
    {
        $book = Book::findOrFail($id);
        $types = Type::pluck('name','id');
        $authors = Author::pluck('name','id');

        return view('books.edit', compact('book', 'types', 'authors'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required',
            'type_id' => 'required',
            'author_id' => 'required',
        ]);

        $book = Book::findOrFail($id);

        $book->update([
            'title' => $request->title,
            'type_id' => $request->type_id,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('books.index')->with(['success' => 'Data berhasil terubah']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $book = Book::findOrfail($id);

        $book->delete();

        return redirect()->route('books.index')->with(['success' => 'Data berhasil terhapus']);
    }
}
