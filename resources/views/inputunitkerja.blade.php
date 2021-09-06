<!doctype html>
<html>
  <head>
    <title>Import CSV Data to MySQL database with Laravel</title>
  </head>
  <body>
     <!-- Message -->
      

     <!-- Form -->
     <form method="post" action="{{route('import.unit')}}" enctype="multipart/form-data" >
       @csrf
       <input type='file' name='file' >
       <input type='submit' name='submit' value='Import'>
     </form>
  </body>
</html>