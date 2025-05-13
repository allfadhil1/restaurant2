@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Manajemen Chef</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if($mode === 'index')
        <a href="{{ route('menu.chef.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Chef</a>

        <table class="w-full border mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 text-left">Nama</th>
                    <th class="p-2 text-left">Spesialis</th>
                    <th class="p-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($chefs as $chef)
                <tr class="border-t">
                    <td class="p-2">{{ $chef->name }}</td>
                    <td class="p-2">{{ $chef->specialty }}</td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('menu.chef.edit', $chef->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('menu.chef.destroy', $chef->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2 class="text-xl font-semibold mb-4">{{ $mode === 'create' ? 'Tambah' : 'Edit' }} Chef</h2>

        <form action="{{ $mode === 'create' ? route('menu.chef.store') : route('menu.chef.update', $chef->id) }}" method="POST" class="space-y-4">
            @csrf
            @if($mode === 'edit') @method('PUT') @endif

            <div>
                <label class="block font-medium">Nama</label>
                <input type="text" name="name" class="w-full border rounded p-2" value="{{ old('name', $chef->name ?? '') }}" required>
            </div>

            <div>
                <label class="block font-medium">Spesialis</label>
                <input type="text" name="specialty" class="w-full border rounded p-2" value="{{ old('specialty', $chef->specialty ?? '') }}" required>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('menu.chef.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    @endif
</div>
@endsection