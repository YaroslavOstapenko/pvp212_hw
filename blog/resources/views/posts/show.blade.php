<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <strong>Заголовок:</strong> {{ $post->title }}
                </h2>
                <p><strong>Содержание:</strong> {{ $post->content }}</p>
                <p><strong>Автор:</strong> {{ $post->user->name }}</p>
                <p><strong>Дата создания:</strong> {{ $post->created_at->format('d.m.Y H:i') }}</p>

                <br>
                <h3 class="text-lg font-semibold">Комментарии:</h3>

                <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-4 flex items-center">
                    @csrf
                    <textarea name="comment_text" rows="3" class="flex-1 border border-gray-300 rounded-md p-2" placeholder="Введите ваш комментарий..." required></textarea>
                    <button type="submit" class="bg-blue-500 border border-blue-700 px-4 py-2 rounded-md ml-2"> Добавить комментарий </button>
                </form>

                @foreach ($post->comments as $comment)
                    <div class="border-b px-4 border-gray-300 py-2">
                        <div class="border border-gray-300 p-2 rounded mt-1">
                            <strong>
                                {{ $comment->user ? $comment->user->name : 'Удаленный пользователь' }}:
                            </strong>
                            <span class="text-sm text-gray-500">{{ $comment->created_at->format('d.m.Y H:i') }}</span>
                            <p>{{ $comment->comment_text }}</p>
                            @if ($comment->user && $comment->user->id === auth()->id())
                                <form action="{{ route('comments.destroy', ['commentId' => $comment->id, 'postId' => $post->id]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Удалить</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if (session('success'))
    <div class="bg-green-500 text-white p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
</x-app-layout>
