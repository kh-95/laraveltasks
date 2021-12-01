<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Edit</h2>
        <form action="{{ url('/Tasks/' . $data->id) }}" method="post">

            @csrf
            @method('put')

            {{-- <input type="hidden" name="_method" value="put"> --}}


            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $data->title }}" id="exampleInputName"
                    aria-describedby="" placeholder="Enter Title">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Description</label>
                <input type="text" class="form-control" name="description" value=" {{ $data->description }}"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">Start_Date</label>
                <input type="date" class="form-control" name="start_date" value=" {{ $data->start_date }}"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">End_Date</label>
                <input type="date" class="form-control" name="end_date" value=" {{ $data->end_date }}"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description">
            </div>
          


            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

</body>

</html>