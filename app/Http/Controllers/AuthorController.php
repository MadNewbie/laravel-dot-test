<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        $authors = Author::latest()->paginate(5);

        return view('authors.index', compact('authors'));
    }

    public function create(): View
    {
        return view('authors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Author::create([
            'name' => $request->name,
        ]);

        return redirect()->route('authors.index')->with(['success' => 'Data berhasil tersimpan']);
    }

    public function show(string $id): View
    {
        $author = Author::findOrFail($id);

        return view('authors.show', compact('author'));
    }

    public function edit(string $id): View
    {
        $author = Author::findOrFail($id);

        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $author = Author::findOrFail($id);

        $author->update([
            'name' => $request->name,
        ]);

        return redirect()->route('authors.index')->with(['success' => 'Data berhasil terubah']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $author = Author::findOrfail($id);

        $author->delete();

        return redirect()->route('authors.index')->with(['success' => 'Data berhasil terhapus']);
    }
}
