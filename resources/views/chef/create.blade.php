@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h3 class="text-2xl font-semibold mb-6 text-[#fb5849]">
            {{ isset($chef) ? 'Edit' : 'Tambah' }} Chef
        </h3>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-[#ffe8e5] text-[#fb5849] border-l-4 border-[#fb5849] rounded-lg shadow-sm">
                <ul class="list-disc pl-5 space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($chef) ? route('chef.update', $chef) : route('chef.store') }}" method="POST"
            enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($chef))
                @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-medium mb-1">Nama Chef</label>
                <input type="text" name="nama" value="{{ old('nama', $chef->nama ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#fb5849]"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Spesialis</label>
                <input type="text" name="specialty" value="{{ old('specialty', $chef->specialty ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#fb5849]"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Foto Chef (Opsional)</label>
                <input type="file" name="gambar" class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0
                           file:bg-[#fb5849] file:text-white
                           hover:file:bg-[#e04d40] transition cursor-pointer">

                @if(isset($chef) && $chef->gambar)
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 mb-1">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $chef->gambar) }}" alt="Foto Chef"
                            class="h-32 rounded-lg shadow-md border">
                    </div>
                @endif
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-[#fb5849] text-white px-5 py-2 rounded-lg hover:bg-[#e04d40] transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection