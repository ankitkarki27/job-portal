{{-- resources/views/company/profile/logo_edit.blade.php --}}
@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-24 rounded-lg shadow-md">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Update Company Logo</h2>

    @if(session('error'))
        <div class="mb-4 text-red-600">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('profile.logo.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="logo" class="block text-gray-700 font-medium mb-2">Upload New Logo</label>
            <input type="file" name="logo" id="logo" class="border rounded-lg p-2 w-full" required>
            @error('logo')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Update Logo
            </button>
        </div>
    </form>
</div>
@endsection
