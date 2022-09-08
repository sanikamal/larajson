<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <title>Laravel Json CRUD</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">LaraJson</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{route('students.index')}}">Student</a>
              </li>
              
            </ul>
            
          </div>
        </div>
      </nav>
      <div class="container text-center">
        <h1>CRUD Operation on JSON File using Laravel</h1>
        <div>
            
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
          <p>{{ $message }}</p>
          </div>
          @endif
         </div>
        <div class="table-responsive">
          <div>
            <p style="float: right;"><a href="{{route('students.create')}}" class="btn btn-primary btn-lg">Add New Student</a></p>
          
          </div>
           
            <table class="table align-middle table-bordered">
              <thead class="bg-primary">
                <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $k=>$row)
                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->phone; ?></td>
                        <td><?php echo $row->address; ?></td>
                        <td>
                            <form action="{{ route('students.destroy',$k) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('students.edit',$k) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> 
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>
