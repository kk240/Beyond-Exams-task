<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <title>Student table</title>
    
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-borderd data-table">
                   <thead>
                    <tr>
                       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                       
                    </tr>
                   </thead>
                   <tbody>

                   </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        $(function(){
         var table =   $(".data-table").DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{ route('students.index')}}",
            columns:[
                
                {data:'email', name:'email'},
                {data:'name', name:'name'},
                {data:'phone', name:'phone'},
               
            ]
         });
        })
    </script>
</body>
</html>