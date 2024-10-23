<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создать пост') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="title" class="block text-gray-700">Заголовок</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="content" class="block text-gray-700">Содержание</label>
                        <textarea name="content" id="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                    </div>

                    <button type="submit" class="bg-dark-600 border border-gray-700 px-4 py-2 rounded-md hover:bg-indigo-500">Создать пост</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
