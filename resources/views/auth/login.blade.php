<x-guest-layout>

<form method="POST"
      action="{{ route('login') }}"
      class="w-full max-w-lg mx-auto">

@csrf

<div class="w-full flex flex-col items-center text-center mb-10">

    <div class="w-24 h-24 rounded-full bg-blue-100 shadow-lg flex items-center justify-center">
        <span class="text-2xl">🛡️📄</span>
    </div>

    <h1 class="mt-6 text-2xl font-extrabold text-blue-900">
        Sistem Persuratan Digital
    </h1>

    <p class="mt-4 text-gray-500 max-w-md leading-7">
        Kelola surat dengan cepat, aman, dan efisien
        melalui satu platform.
    </p>

</div>

<!-- Email -->

<div>

<label class="font-semibold">

📧 Email

</label>

<input

type="email"

name="email"

value="{{ old('email') }}"

class="w-full mt-2 rounded-xl border-gray-300 focus:ring-blue-700 focus:border-blue-700"

required>

</div>

<!-- Password -->

<div class="mt-5">

<label class="font-semibold">

🔒 Password

</label>

<input

type="password"

name="password"

class="w-full mt-2 rounded-xl border-gray-300 focus:ring-blue-700 focus:border-blue-700"

required>

</div>

<div class="flex justify-between items-center mt-5">

<label class="flex items-center gap-2">

<input type="checkbox" name="remember">

<span>

Ingat Saya

</span>

</label>

@if(Route::has('password.request'))

<a href="{{ route('password.request') }}"

class="text-blue-700 hover:underline">

Lupa Password?

</a>

@endif

</div>

<button

type="submit"

class="w-full mt-8 bg-blue-900 hover:bg-blue-800 text-white py-3 rounded-xl font-bold">

LOGIN

</button>
<div class="mt-6 rounded-2xl bg-blue-50 border border-blue-100 p-4 text-center">

    <div class="text-2xl mb-2">🛡️</div>

    <h3 class="font-semibold text-blue-900">
        Keamanan Data Terjamin
    </h3>

    <p class="text-sm text-gray-600 mt-1">
        Seluruh data pengguna dikelola secara aman dan hanya dapat diakses oleh pengguna yang berwenang.
    </p>

</div>

</form>

</x-guest-layout>