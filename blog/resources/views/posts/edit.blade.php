<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактировать Пост') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl mb-4">Редактировать пост</h1>
                <form id="edit-post-form" action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="title" class="block text-gray-700">Заголовок</label>
                        <input type="text" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="title" name="title" value="{{ $post->title }}" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="content" class="block text-gray-700">Содержание</label>
                        <textarea class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="content" name="content" required>{{ $post->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary border border-gray-700 bg-indigo-600 px-4 py-2 rounded-md hover:bg-indigo-500">Обновить пост</button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
