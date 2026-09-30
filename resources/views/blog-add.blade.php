<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<style>
    #desc-textarea {
        resize: none;
    }
</style>

<body>
    <div class="container">
        <h2 class="mt-5 mb-5">halo ini add data </h2>

        <form action="{{ url('/blog/create') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="title" class="form-label">Title:</label>
                <input placeholder="Fill in title here.." type="text" class="form-control" id="title"
                name="title" value="{{ old('title') }}">
            </div>
            <div class="col-md-6 mt-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" placeholder="Fill the description here.." id="desc-textarea" rows="4"
                name="description">{{ old('description') }}</textarea>
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
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
