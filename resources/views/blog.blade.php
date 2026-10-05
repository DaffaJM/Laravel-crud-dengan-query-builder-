<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="mt-5">
            <h1 class="text-center">Blog list</h1>
            <div class="table-responsive">
                <a href="{{ url('blog/add') }}" class="btn btn-primary mb-3">Add Data</a>

                <form action="/blog" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="searchTitle" value="{{ $title }}" class="form-control"
                            placeholder="Search Title" aria-label="Search Title" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>

                @if (Session::has('message'))
                    <p class="text-center alert alert-info">{{ Session::get('message') }}</p>
                @endif

                <table class="table table-striped table-hover">
                    <thead>
                        <th>No</th>
                        <th>Title</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="table-group-divider">

                        @if ($blogs->count() == 0)
                            <tr>
                                <td colspan="3" class="text-center">Tidak ditemukan title yang bernama
                                    {{ $title }}</td>
                            </tr>
                        @endif

                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ ($blogs->currentpage() - 1) * $blogs->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $blog->title }}</td>
                                <td><a href="{{ 'blog/' . $blog->id . '/detail' }}">view</a> | 
                                    <a href="blog/{{ $blog->id }}/edit">edit</a> | 
                                    <form action="{{ 'blog/' . $blog->id . '/delete' }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger border-0 bg-transparent p-0"
                                            onclick="return confirm('Yakin ingin menghapus {{ $blog->title }}?')">
                                            delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- pagination --}}
                {{ $blogs->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
