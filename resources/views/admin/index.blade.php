<x-admin-layout>
    <div class="px-6 py-4">
        <h2 class="text-2xl font-bold mb-2">All Posts</h2>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">User</th>
                        <th class="px-4 py-2 text-left">Content</th>
                        <th class="px-4 py-2 text-left">Likes</th>
                        <th class="px-4 py-2 text-left">Comments</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="border-b border-gray-300">
                        <td class="px-4 py-2">{{ $post->id }}</td>
                        <td class="px-4 py-2">{{ $post->user->name }}</td>
                        <td class="px-4 py-2">{{ $post->content }}</td>
                        <td class="px-4 py-2">{{ $post->likes->count() }}</td>
                        <td class="px-4 py-2">
                            @foreach ($post->comments as $comment)
                                <p>{{ $comment->user->name }}: {{ $comment->comment }}</p>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</x-admin-layout>
