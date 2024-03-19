<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Users</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('users.index') }}>CRUD Users</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('users.create') }}>Add User</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      @foreach ($users as $user)
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
                <h5 class="card-title">User</h5>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Name:</b> {{ $user->name }}</p>
                <p class="card-text"><b>Email:</b> {{ $user->email }}</p>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm">
                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</body>
</html>
