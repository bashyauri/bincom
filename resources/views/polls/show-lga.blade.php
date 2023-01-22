<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Government</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="px-4 py-5 my-5 text-center">

        <h1 class="display-5 fw-bold">BinCom</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route('lga.scores')}}" method="post">
                @csrf
            <select class="form-select"name = "lga" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach ($lgas as $lga)


                <option value="{{$lga->lga_id}}">{{$lga->lga_name}}</option>
                @endforeach
              </select>

              <button type="submit"  class="btn btn-success">Submit</button>
            </form>
                </div>
            </div>
            <br>

            <a href="/" class="btn btn-danger">Back</a>

      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

