
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Record Ur Task</title>
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

  <h2>Register</h2>
  
  
  <form   action = "{{ url('/Tasks')}}"  method="post">

   @csrf

<input type="hidden" name="user_id" value="{{ auth()->user()->id }}" >


  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" name="title" value="{{ old('title')}}" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Description</label>
    <input type="text"   class="form-control"  name="description" value=" {{ old('description') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail">Start_Date</label>
    <input type="date"   class="form-control"  name="start_date" value=" {{ old('start_date') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter StartDate">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail">End_Date</label>
    <input type="date"   class="form-control"  name="end_date" value=" {{ old('end_date') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter EndDate">
  </div>
 


      
    


  
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>

</body>
</html>




