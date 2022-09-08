<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <div class="container">
        <h1 class="text-center">CRUD Operation on JSON File using Laravel</h1>
        <div class="row">
          @if(count($errors) > 0)
            <div class="col-md-6 offset-3">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
          @endif
            <div class="col-md-6 offset-3">
              
                <form action="{{ route('students.update',$id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="name" class="form-label">Full Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$student['name']}}">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{$student['email']}}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone No</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$student['phone']}}">
                      </div>
                      <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" rows="4" cols="16" id="address" name="address" class="form-control">{{$student['address']}}</textarea>
                      </div>
                    <button type="submit" class="btn btn-primary">Update Student</button>
                  </form>
            </div>
        </div>
      </div>
    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>
