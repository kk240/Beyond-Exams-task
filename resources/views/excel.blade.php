<!DOCTYPE html>
<html lang="en">
<head>
  <title>Students</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-sm-6 mt-5">
                <div class="p-5 border-2 border border-secondary rounded">
                    <h2>Student Data :</h2>
                    <form class="form" method="POST" action="{{ route('import-student')}}" enctype="multipart/form-data">
                        @csrf
                        <label for="excelFile">Select File</label>
                        <input type="file" name="file" class="form-control" />
                        <div class="mt-5">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <a href="{{ route('export-student') }}" class="btn btn-primary float-right">Export excel</a>
                        </div>
                    </form>
                </div>
           </div>
        </div>
    </div>
</body>
</html>