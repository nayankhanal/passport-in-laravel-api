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
  <h2>Citizen Form</h2>
  <form action="{{route('citizens.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
        <label for="country_id">Country</label>
            <select name="country_id" id="country_id" class="form-control">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        @if($errors->has('country_id'))
        <span class="help-block text-danger" style="color: red;">{{$errors->first('country_id')}}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="city_id">City</label>
            <select name="city_id" id="city_id" class="form-control">
                <option value="">Select City</option>

            </select>
        @if($errors->has('city_id'))
        <span class="help-block text-danger" style="color: red;">{{$errors->first('city_id')}}</span>
        @endif
    </div>
    <button id="submit" type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>

<script type="module">
  // import axios from "axios";

    const country = document.querySelector('#country_id')

    country.addEventListener('change', function(){
      const country = document.querySelector('#country_id').value;
      // console.log(country);

      fetch(`/cities/${country}`)
      .then(response => response.json())
      .then((cities)=>{
        cities.map((city)=>{
          const option = document.createElement('option')
          option.setAttribute('value',city.id)
          option.innerHTML = city.name

          const select = document.getElementById('city_id')

          // const selectClone = select.cloneNode(false)
          // select.replaceWith(selectClone)
          // console.log(select);

          // while (select.hasChildNodes()) {
          //   console.log(select.firstChild);
          //   select.removeChild(select.firstChild);
          //   // select.firstChild.remove()
          // }
          // select.innerHTML = ''
          select.appendChild(option)
          // console.log(select);
        })

        console.log(cities);
      })
      .catch((err)=>{
        console.log(err);
      })
      
      // axios.get('create.blade.php')
      //   .then((data)=>{
      //     console.log(data);
      //   })
      //   .catch((err)=>{
      //     console.log(err);
      //   })

    })

    // const city = document.querySelector('#city_id')
    // city.addEventListener('change', function(){
    //   const city = document.querySelector('#city_id').value;
    //   console.log(city);
    // })



    // $(document).ready(()=>{
    //   $('#country_id').on('change', ()=>{
    //     $.ajax({
    //       url: 'create',
    //       type: 'GET',
    //       success: function (docs) {
    //         console.log($('#country_id').value)
    //       },
    //       error: function (xhr, status, error) {
    //         // console.error(xhr.responseText);
    //         console.log(error);
    //       }
    //     })
    //   })
    // })

</script>

</html>
