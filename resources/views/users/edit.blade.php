@extends('layouts.main')

@section('title','Edit User')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Edit User
        </h1>

        <a href="{{ route('users.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

            Kembali

        </a>

    </div>

    @if ($errors->any())

    <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg p-4 mb-5">

        <ul class="list-disc ml-5">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <div class="bg-white shadow rounded-xl p-8">

        <form action="{{ route('users.update',$user) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name',$user->name) }}"
                    class="w-full border rounded-lg p-3"
                    required>

            </div>

            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email',$user->email) }}"
                    class="w-full border rounded-lg p-3"
                    required>

            </div>

            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Password Baru
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg p-3">

                <small class="text-gray-500">
                    Kosongkan jika tidak ingin mengganti password.
                </small>

            </div>

            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Role
                </label>

                <select
                    name="role"
                    class="w-full border rounded-lg p-3">

                    <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="guru" {{ $user->role=='guru' ? 'selected' : '' }}>
                        Guru
                    </option>

                    <option value="orang_tua" {{ $user->role=='orang_tua' ? 'selected' : '' }}>
                        Orang Tua
                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

                Update User

            </button>

        </form>

    </div>

</div>

@endsection