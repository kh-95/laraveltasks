
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>


  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  
  
  <form   action="{{ url('http://localhost/group8laravel/public/store/blog') }}"  method="POST" >

    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" name="title" id="exampleInputName" value="{{old ('title')}}" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Content</label>
    <input type="text"   class="form-control"  name="content" value="{{ old('content')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail">Code</label>
    <input type="text"   class="form-control"  name="code" value="{{ old('code')}}"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
  </div>

  

  



  
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>

</body>
</html>




