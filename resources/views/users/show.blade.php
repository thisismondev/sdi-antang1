@extends('layouts.main')

@section('title','Detail User')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Detail User
        </h1>

        <a href="{{ route('users.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg">

            Kembali

        </a>

    </div>

    <div class="bg-white rounded-xl shadow p-8">

        <table class="w-full">

            <tr class="border-b">

                <td class="py-4 font-semibold w-60">
                    Nama
                </td>

                <td>
                    {{ $user->name }}
                </td>

            </tr>

            <tr class="border-b">

                <td class="py-4 font-semibold">
                    Email
                </td>

                <td>
                    {{ $user->email }}
                </td>

            </tr>

            <tr class="border-b">

                <td class="py-4 font-semibold">
                    Role
                </td>

                <td>

                    @if($user->role=="admin")

                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">

                            Admin

                        </span>

                    @elseif($user->role=="guru")

                        <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full">

                            Guru

                        </span>

                    @else

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                            Orang Tua

                        </span>

                    @endif

                </td>

            </tr>

            <tr class="border-b">

                <td class="py-4 font-semibold">
                    Dibuat
                </td>

                <td>

                    {{ $user->created_at->format('d-m-Y H:i') }}

                </td>

            </tr>

        </table>

    </div>

</div>

@endsection