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
  <h2>Citizen Edit</h2>
  <form action="{{route('citizens.update', $citizen->id)}}" method="post">
    @method('put')
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" value="{{old('name',$citizen->name)}}" class="form-control" id="name" placeholder="Enter name" name="name">
        @if($errors->has('name'))
            <span class="help-block text-danger" style="color: red;">{{$errors->first('name')}}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="country_id">Country</label>
            <select name="country_id" id="country_id" class="form-control">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}" {{$country->id === $citizen->country_id ? 'selected' : '' }}>{{$country->name}}</option>
                @endforeach
            </select>
        @if($errors->has('country_id'))
        <span class="help-block text-danger" style="color: red;">{{$errors->first('country_id')}}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="city_id">Course</label>
            <select name="city_id" id="city_id" class="form-control">
                <option value="">Select City</option>
                @foreach($cities as $city)
                <option value="{{$city->id}}" {{$city->id === $citizen->city_id ? 'selected' : '' }}>{{$city->name}}</option>
                @endforeach
            </select>
        @if($errors->has('city_id'))
        <span class="help-block text-danger" style="color: red;">{{$errors->first('city_id')}}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
