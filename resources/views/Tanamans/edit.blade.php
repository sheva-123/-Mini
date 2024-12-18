<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Edit Tanaman</h1>
        <form action="{{ route('tanamans.update', $tanaman) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_tanaman" class="block font-medium">Nama Tanaman</label>
                <input type="text" name="nama_tanaman" id="nama_tanaman" value="{{ $tanaman->nama_tanaman }}" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="jenis" class="block font-medium">Jenis</label>
                <input type="text" name="jenis" id="jenis" value="{{ $tanaman->jenis }}" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block font-medium">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="border rounded p-2 w-full">{{ $tanaman->deskripsi }}</textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Perbarui</button>
        </form>
    </div>
</x-app-layout>
