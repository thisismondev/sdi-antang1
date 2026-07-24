@extends('layouts.main')

@section('title','Kelola User')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold">
        Kelola User
    </h1>

    <a href="{{ route('users.create') }}"
        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

        + Tambah User

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded mb-5">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-4">No</th>

<th>Nama</th>

<th>Email</th>

<th>Role</th>

<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($users as $user)

<tr class="border-t">

<td class="p-4">

{{ $loop->iteration }}

</td>

<td>

{{ $user->name }}

</td>

<td>

{{ $user->email }}

</td>

<td>

@if($user->role=="admin")

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

Admin

</span>

@elseif($user->role=="guru")

<span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

Guru

</span>

@else

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

Orang Tua

</span>

@endif

</td>

<td>

<div class="flex gap-2 justify-center">

<a
href="{{ route('users.show',$user) }}"
class="bg-blue-500 text-white px-3 py-2 rounded">

👁

</a>

<a
href="{{ route('users.edit',$user) }}"
class="bg-yellow-500 text-white px-3 py-2 rounded">

✏

</a>

<form
action="{{ route('users.destroy',$user) }}"
method="POST">

@csrf
@method('DELETE')

<button
onclick="return confirm('Yakin ingin menghapus user?')"
class="bg-red-500 text-white px-3 py-2 rounded">

🗑

</button>

</form>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center py-10">

Belum ada data user.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection