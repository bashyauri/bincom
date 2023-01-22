<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="px-4 py-5 my-5 text-center">

        <h1 class="display-5 fw-bold">Polling Units</h1>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <a href="/" class="btn btn-danger">Home</a>

                    <table class="table table-striped" >
                        <thead>






                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Unique id</th>
                            <th scope="col">Polling Unit Number</th>
                            <th scope="col">Polling Unit name</th>
                            <th scope="col">Description</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                    $i = 1;
                                @endphp
                            @foreach ($all_polling_units as $polling_unit)

                                   @if ($polling_unit->polling_unit_id != 0)
                                   <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$polling_unit->uniqueid}}</td>
                                    <td>{{$polling_unit->polling_unit_number}}</td>
                                    <td>{{strtoupper($polling_unit->polling_unit_name)}}</td>
                                    <td>{{strtoupper($polling_unit->polling_unit_description)}}</td>
                                    <td><a href="{{route('results.show',['result'=>$polling_unit->uniqueid])}}" class="btn btn-primary">Add Result</a></td>
                                  </tr>
                                   @endif
                                @endforeach


                        </tbody>
                      </table>
                </div>
              </div>
          </div>

      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

