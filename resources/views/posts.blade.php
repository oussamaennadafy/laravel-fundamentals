@extends('layouts.master')

@section('content')
<h1 class="text-red-500">posts</h1>
<ul class="flex items-center justify-between flex-col gap-5">
 @foreach ($posts as $post)
 <li class="border-gray-300 px-5 py-2 bg-slate-500 min-w-1/2 text-white">
  <p>{{ $post->title }}</p>
 </li>
 @endforeach
</ul>
@endsection