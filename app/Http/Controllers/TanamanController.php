<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tanaman::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama_tanaman', 'like', "%$search%")
                ->orWhere('umur_panen', 'like', "%$search%");
        }

        if ($request->filter) {
            $filter = $request->filter;
            if ($filter === 'Herbal') {
                $query->where('jenis', 'Herbal');
            } elseif ($filter === 'Sayuran') {
                $query->where('jenis', 'Sayuran');
            } elseif ($filter === 'Buah') {
                $query->where('jenis', 'Buah');
            }
        }

        if ($request->filled('sort')) {
            $sort = $request->sort;
            if ($sort === 'a-z') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort === 'z-a') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $tanamans = $query->latest()->paginate(5)->appends([
            'search' => $request->search,
            'filter' => $request->filter,
            'sort' => $request->sort,
        ]);
        return view('admin.tanamans.index', compact('tanamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanaman = Tanaman::getJenisOptions();

        return view('admin.tanamans.create', compact('tanaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_tanaman' => 'required|string|max:255',
            'jenis' => 'required|',
            'deskripsi' => 'nullable|string',
            'umur_panen' => 'required|integer|max:365'
        ], [
            'nama_tanaman.required' => 'Nama tanaman wajib diisi.',
            'jenis.required' => 'Jenis tanaman wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tanamans.create')
                ->withErrors($validator)
                ->withInput();
        }

        Tanaman::create($request->all());
        return redirect()->route('tanamans.index')->with('success', 'Data tanaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanaman $tanaman)
    {
        // Add functionality if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanaman $tanaman)
    {
        return view('admin.tanamans.edit', compact('tanaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tanaman $tanaman)
    {
        $validator = Validator::make($request->all(), [
            'nama_tanaman' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ], [
            'nama_tanaman.required' => 'Nama tanaman wajib diisi.',
            'jenis.required' => 'Jenis tanaman wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tanamans.edit', $tanaman->id)
                ->withErrors($validator)
                ->withInput();
        }

        $tanaman->update($request->all());
        return redirect()->route('tanamans.index')->with('success', 'Data tanaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanaman $tanaman)
    {
        try {
            $tanaman->delete();
            return redirect()->route('tanamans.index')->with('success', 'Data tanaman berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('tanamans.index')->with('error', 'Gagal menghapus data tanaman.');
        }
    }
}
