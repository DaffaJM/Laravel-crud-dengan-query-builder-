<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="mt-5">
            <h1>ini adalah blog edit {{ $blog->title }}</h1>

            <form action="{{ url('blog/' . $blog->id . '/update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="col-md-6">
                    <label for="title" class="form-label">Title Baru:</label>
                    <input placeholder="Fill in title here.." type="text" class="form-control" id="title"
                        name="title" value="{{ $blog->title }}">
                </div>
                <div class="col-md-6 mt-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" placeholder="Fill the description here.." id="desc-textarea" rows="4"
                        name="description">{{ $blog->description }}</textarea>
                </div>

                {{-- menampilkan error --}}
                @if ($errors->any())
                    <div class="alert alert-danger col-md-6 mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-md-6 mt-3">
                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
