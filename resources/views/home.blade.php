<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Social App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Social App</h1>

        @auth
        <form method="post" action="{{ route('logout') }}" class="float-right ml-2">
            @csrf
            <button type="submit">Log out</button>
        </form>
       <a href="{{ route('admin.index') }}"> <div class="float-right">Dashboard</div></a>
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <form id="postForm" enctype="multipart/form-data">
                @csrf
                <textarea name="content" class="w-full p-2 border rounded-lg mb-4" placeholder="Write something..." required></textarea>
                <input type="file" name="image" id="imageInput" class="mb-4">
                <div id="imgDiv" class="hidden h-64 w-64 "><img id="selectedImage" class="hidden mb-4 h-full w-full" alt="Selected Image"></div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Post</button>
            </form>
        </div>
        @endauth

        <div id="posts">
            @foreach ($posts as $post)
            <div class="post bg-white p-6 rounded-lg shadow-lg mb-6" data-id="{{ $post->id }}">
                <p class="font-bold text-2xl">{{ $post->user->name }}:</p>
                <p class="mb-4">{{ $post->content }}</p>
                @if ($post->image)
                <div class="w-96 h-96">
                    <img src="{{ Storage::url($post->image) }}" alt="Post Image" class="max-w-full h-full mb-4">
                </div>
                @endif
                <div class="mt-2">
                    <button class="like-btn bg-gray-200 text-white py-2 px-4 rounded-lg mb-4" data-id="{{ $post->id }}" style="background-color: {{ $post->likes->contains('user_id', auth()->id()) ? 'green' : 'grey' }};">
                        Like ({{ $post->likes->count() }})
                    </button>
                </div>
                <div class="comments">
                    @foreach ($post->comments as $comment)
                    <div class="bg-gray-100 p-2 rounded-lg mb-2">
                        <p class="font-bold">{{ $comment->user->name }}:</p>
                        <p>{{ $comment->comment }}</p>
                    </div>
                    @endforeach
                    @auth
                    <form class="commentForm mt-4" data-id="{{ $post->id }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="comment" class="w-full p-2 border rounded-lg mb-2" placeholder="Write a comment..." required></textarea>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Comment</button>
                    </form>
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#postForm').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '{{ route("posts.store") }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    }
                }
            });
        });

        $(document).on('click', '.like-btn', function () {
            const postId = $(this).data('id');
            const button = $(this);
            $.ajax({
                type: 'POST',
                url: '{{ route("likes.store") }}',
                data: { post_id: postId },
                success: function (response) {
                    if (response.success) {
                        const liked = button.css('background-color') === 'rgb(0, 128, 0)';
                        button.css('background-color', liked ? 'grey' : 'green');
                        const count = parseInt(button.text().match(/\d+/)) + (liked ? -1 : 1);
                        button.text(`Like (${count})`);
                    }
                }
            });
        });

        $(document).on('submit', '.commentForm', function (e) {
            e.preventDefault();
            const form = $(this);
            $.ajax({
                type: 'POST',
                url: '{{ route("comments.store") }}',
                data: form.serialize(),
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        });

         // Update selected image when file input changes
        $('#imageInput').on('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    $('#imgDiv').removeClass('hidden');
                    $('#selectedImage').attr('src', event.target.result).removeClass('hidden');
                    
                };
                reader.readAsDataURL(file);
            }
        });

    });
    </script>
</body>
</html>
