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

        <h1 class="display-5 fw-bold">Bincom</h1>
        <div class="container">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped" >
                        <thead>






                          <tr>


                            <th scope="col">Party Abbreviation</th>
                            <th scope="col">Party Score</th>
                            {{-- <th scope="col">Polling Unit name</th>
                            <th scope="col">Description</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                    $i = 1;
                                @endphp
                            @foreach ($polling_units_results as $result)
                                   <tr>
                                    <td>{{$result->party_abbreviation}}</td>
                                    <td>{{$result->party_score}}</td>

                                  </tr>

                                @endforeach


                        </tbody>

                      </table>
                      <a href="{{route('polls.index')}}" class="btn btn-danger">Back</a>
                </div>
              </div>
          </div>

      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

