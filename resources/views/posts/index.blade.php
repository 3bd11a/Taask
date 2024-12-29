<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Posts</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('posts.import') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="file" name="file" class="form-control">
                <button type="submit" class="btn btn-primary">Import Excel</button>
                <a href="{{ url('export-posts') }}" class="btn btn-success">Export Posts to Excel</a>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
</body>
</html>
