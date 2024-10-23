<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Подтверждение удаления поста') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg mb-4">Вы уверены, что хотите удалить пост "{{ $post->title }}"?</h3>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md">Удалить</button>
                    <a href="{{ route('posts.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded-md">Отмена</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
