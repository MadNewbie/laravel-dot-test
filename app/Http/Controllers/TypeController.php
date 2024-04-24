<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeController extends Controller
{
    public function index(): View
    {
        $types = Type::latest()->paginate(5);

        return view('types.index', compact('types'));
    }

    public function create(): View
    {
        return view('types.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Type::create([
            'name' => $request->name,
        ]);

        return redirect()->route('types.index')->with(['success' => 'Data berhasil tersimpan']);
    }

    public function show(string $id): View
    {
        $type = Type::findOrFail($id);

        return view('types.show', compact('type'));
    }

    public function edit(string $id): View
    {
        $type = Type::findOrFail($id);

        return view('types.edit', compact('type'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $type = Type::findOrFail($id);

        $type->update([
            'name' => $request->name,
        ]);

        return redirect()->route('types.index')->with(['success' => 'Data berhasil terubah']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $type = Type::findOrfail($id);

        $type->delete();

        return redirect()->route('types.index')->with(['success' => 'Data berhasil terhapus']);
    }
}
