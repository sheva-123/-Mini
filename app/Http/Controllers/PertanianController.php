<?php

namespace App\Http\Controllers;

use App\Models\Pertanian;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PertanianController extends Controller
{

    public function index(Request $request)
    {
        $query = Pertanian::with('tanaman');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_pertanian', 'like', "%$search%")
                    ->orWhere('lokasi_pertanian', 'like', "%$search%")
                    ->orWhereHas('tanaman', function ($subQ) use ($search) {
                        $subQ->where('nama_tanaman', 'like', "%$search%");
                    });
            });
        }

        if ($request->filled('sort')) {
            $sort = $request->sort;
            if ($sort === 'a-z') {
                $query->orderBy('created_at', 'desc');
            } elseif ($sort === 'z-a') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $dataFilter = Pertanian::all();

        $pertanians = $query->latest()->paginate(5)->appends([
            'search' => $request->search,
            'sort' => $request->sort,
        ]);
        return view('admin.pertanians.index', compact('pertanians', 'dataFilter'));
    }

    public function show(Pertanian $pertanian)
    {
        $pertanians = Pertanian::with('tanaman')->get();
        return view('admin.pertanians.show', compact('pertanian'));
    }


    public function create()
    {
        $tanamans = Tanaman::all();
        return view('admin.pertanians.create', compact('tanamans'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pertanian' => 'required|string|max:255',
            'lokasi_pertanian' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric',
            'tanaman_id' => 'required|exists:tanamans,id'
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pertanians.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        $pertanian = Pertanian::firstWhere("nama_pertanian", $request->nama_pertanian);
        if($pertanian){
            return redirect()->back()->with('error', 'Data yang anda tambahkan sudah ada, masukkan data yang berbeda!') ->withInput();
        }

        Pertanian::create($request->all());

        return redirect()->route('pertanians.index')->with('success', 'Data berhasil ditambahkan');

        //     $pertanian = Pertanian::create($validated);

        //     // Pastikan properti dikembalikan dengan nama yang benar
        //     return response()->json([
        //         'id' => $pertanian->id ?? '',
        //         'nama_pertanian' => $pertanian->nama_pertanian ?? '',
        //         'lokasi_pertanian' => $pertanian->lokasi_pertanian ?? '',
        //         'luas_lahan' => $pertanian->luas_lahan ?? '',
        //         'created_at' => $pertanian->created_at ? $pertanian->created_at->format('Y-m-d H:i:s') : '',
        //     ]);
        //
    }


    public function edit(Pertanian $pertanian)
    {
        $tanamans = Tanaman::all();
        return view('admin.pertanians.edit', compact('pertanian', 'tanamans'));
    }


    public function update(Request $request, Pertanian $pertanian)
    {
        $validator = Validator::make($request->all(), [
            'nama_pertanian' => 'required|string|max:255',
            'lokasi_pertanian' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric',
        ]);

            if ($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('pertanians.index')
                ->withErrors($validator)
                    ->withInput();
            }

        $pertanian->update([
            'nama_pertanian' => $request->nama_pertanian,
            'lokasi_pertanian' => $request->lokasi_pertanian,
            'luas_lahan' => $request->luas_lahan,
        ]);

        return redirect()->route('pertanians.index')->with('success', 'Data pertanian berhasil diperbarui!');
    }


    public function destroy(Pertanian $pertanian)
    {
        try {
            $pertanian->delete();
            return redirect()->route('pertanians.index')
            ->with('success', 'Pertanian Delete Success');
        } catch (\Exception $e) {
            return redirect()->route('pertanians.index')
            ->with('error', 'Pertanian Delete Error');
        }
    }
}
