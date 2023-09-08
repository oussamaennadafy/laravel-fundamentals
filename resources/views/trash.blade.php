@extends('layouts.master')

@section('content')
    <main class="min-h-[calc(100vh-216px)]">
        <h1 class="text-3xl text-center my-7">trashed posts</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg lg:w-3/4 mx-auto">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 table-auto">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            author
                        </th>
                        <th scope="col" class="px-6 py-3">
                            status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $post->title }}
                            </th>
                            <td class="px-6 py-4 overflow-hidden">
                                {{ $post->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->author }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->status === 1 ? 'active' : 'inactive' }}
                            </td>
                            <td class="px-6 py-4 flex items-center justify-center gap-6">
                                <form action="/posts/{{ $post->id }}/restore" method="POST">
                                    @csrf
                                    <input
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer"
                                        type="submit" value="Restore">
                                </form>
                                <form action="/posts/{{ $post->id }}/deletePermanently" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer"
                                        type="submit" value="Delete Permanently">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection