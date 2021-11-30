



<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>Read Students </h1> 
            <br>

        </div>

       

    <a href="">+ Account</a> 

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>         
            </tr>

           
        @foreach($data as $raw)    
           
       
           <tr>
           <td>{{$raw->name}}</td>
           <td>{{ $raw->email}} </td>
           
           
           <td>
            <img src="{{ url('storage/imagesstudent/'.$raw->image) }}" width="100px" alt="" title="" />



           </td>
            <td>
                    <a href='{{ url('/delete/'.$raw->id) }}' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='{{ url('/edit/'. $raw->id ) }}' class='btn btn-primary m-r-1em'>Edit</a>
                </td>
                

           {{-- basename($dataprofile['image']) --}}
           </tr> 
         @endforeach
           
               
        
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>







