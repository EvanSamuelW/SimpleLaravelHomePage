<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <title>Customer page</title>

</head>

<body>
  @include('components.navbar')

  @if(\Session::has('message'))
  <div class="alert alert-info">
    {{\Session::get('message')}}
  </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($customers as $item)
      <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->user->email}}</td>
        <td>{{$item->status}}</td>

        <td>
          <div>
            <a class="btn btn-outline-primary" href="{{ route('detail',$item->user->id) }}">Detail</a>
            @if($item->status == 'INACTIVE')
            <a class="btn btn-outline-primary" href="{{ route('approve',$item->id) }}">Approve</a>
            @endif

          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>