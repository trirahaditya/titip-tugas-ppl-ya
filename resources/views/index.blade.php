<!DOCTYPE html>
<html>
<head>
    <title>laravel File Uploading with Amazon S3 </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
    
<body>
  <div class="container" style="margin-top:100px;">    
      <div class="panel panel-primary">
        <div class="panel-heading"><h2>laravel File Uploading with Amazon S3</h2></div>
          <div class="panel-body">
            <a href="{{Route('image.upload')}}"><div class="btn btn-primary">+ Upload Image</div></a>
            <table class="table " style="margin-top:50px;">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Name</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Download</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($contents as $content)
                <tr>
                  <th scope="row">{{$loop->index+1}}</th>
                  <td><img src="../storage/{{$content->foto}}" style="width:100px;"></td>
                  <td>{{$content->foto}}</td>
                  <td>{{$content->created_at}}</td>
                  <td>
                    <div class="d-flex">
                      <div class="sweetalert">
                        <form action="{{Route('image.download', $content->id)}}" method="get">
                          @csrf
                          <button type="submit" onclick="return confirm('Yakin Ingin Mendownload data?')" class="btn btn-warning shadow btn-xs sharp sweet-success-cancel">Download</i></button>                 
                        </form>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex">
                      <div class="sweetalert">
                        <form action="{{Route('image.delete', $content->id)}}" method="POST">
                          @csrf
                          <button type="submit" onclick="return confirm('Yakin Ingin Mengapus Data?')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel">Delete</i></button>                 
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
  
</html>