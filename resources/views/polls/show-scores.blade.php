<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Scores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="px-4 py-5 my-5 text-center">

        <h1 class="display-5 fw-bold">Bincom</h1>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if (count($party_scores) == 0)
                        <h1 class="alert alert-danger">No Scores found yet.</h1>
                    @else



                    <table class="table table-striped" >
                        <thead>






                          <tr>


                            <th scope="col">Party Abbreviation</th>
                            <th scope="col">Party Score</th>

                          </tr>
                        </thead>
                        <tbody>
                            @php
                                    $i = 1;
                                @endphp
                            @foreach ($party_scores as $result)
                                   <tr>
                                    <td>{{$result->party_abbreviation}}</td>
                                    <td>{{$result->scores}}</td>

                                  </tr>

                                @endforeach


                        </tbody>
                        @endif
                      </table>
                      <a href="{{route('lga')}}" class="btn btn-danger">Back</a>
                </div>
              </div>
          </div>

      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

