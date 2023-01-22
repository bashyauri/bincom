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
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                                <h1 class="alert alert-info">Insert Party Score</h1>


                                                        @if (session('status'))

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>  {{ session('status') }}!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                            @endif

                            <table class="table table-striped" >
                                <thead>



                                  <tr>


                                    <th scope="col">Party Abbreviation</th>
                                    <th scope="col">Party Score</th>

                                  </tr>
                                </thead>
                                <tbody>
                                    <form action="{{route('results.store')}}" method="post">
                                        @csrf
                                        @foreach ($parties as $party)
                                        <tr>
                                            <td><input type="text"  name="partyname[]" value="{{$party->partyname}}" readonly></td>
                                            <td><input type="number" required name="score[]"></td>
                                            <td><input type="hidden"  name="polling_unit_uniqueid[]" value = "{{$id}}"></td>
                                        </tr>
                                        @endforeach



                                </tbody>

                              </table>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                              <a href="{{route('results.index')}}" class="btn btn-danger">Back</a>
                        </div>
                      </div>
                  </div>
                </div>
            </div>


      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

