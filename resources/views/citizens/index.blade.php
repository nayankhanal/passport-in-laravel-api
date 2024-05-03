<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Citizens</h2>
  <table class="table">
    <thead>
      <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Country</th>
        <th>City</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($citizens as $citizen)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$citizen->name}}</td>
            <td>{{$citizen->city->name}}</td>
            <td>{{$citizen->city->country->name}}</td>
            <td>
                <a href="{{route('citizens.edit', $citizen->id)}}">Edit</a>
                <form action="{{route('citizens.destroy', $citizen->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
