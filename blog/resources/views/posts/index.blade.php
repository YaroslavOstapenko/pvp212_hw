<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Посты') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Создать новый пост</a>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Заголовок</th>
                                <th class="border border-gray-300 px-4 py-2">Содержание</th>
                                <th class="border border-gray-300 px-4 py-2">Автор</th>
                                <th class="border border-gray-300 px-4 py-2">Дата создания</th>
                                <th class="border border-gray-300 px-4 py-2">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $post->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ Str::limit($post->content, 50) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $post->user->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $post->created_at->format('d.m.Y H:i') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600">Просмотреть</a>

                                        @if ($post->user_id === auth()->id())
                                            <a href="{{ route('posts.edit', $post->id) }}" class="text-green-600 ml-2">Редактировать</a>
                                            <form action="{{ route('posts.confirmDelete', $post->id) }}" method="GET" class="inline ml-2">
                                                <button type="submit" class="text-red-600">Удалить</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
