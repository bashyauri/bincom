
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

        <h1 class="display-5 fw-bold">BinCom</h1>
        <div class="col-lg-6 mx-auto">

          <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            {{-- <a href="#" class=""></a> --}}
            <a href="{{route('polls.index')}}"  class="btn btn-primary btn-lg px-4 gap-3">Display Polling Unit result(q1)</a>
            <a href="{{route('results.index')}}"  class="btn btn-primary btn-lg px-4 gap-3">Insert Results(q3) </a>
            <a href="{{route('lga')}}"  class="btn btn-primary btn-lg px-4 gap-3">Total Result of all polling Units in LGA(q2) </a>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

