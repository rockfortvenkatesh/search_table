
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <div class="container">    
     <h2>Users Details</h2>
           <br />
            <form action="/user/details" method="POST">
            @csrf  

            @method('Post')
    <input type="date" name="from" placeholder="from" >&nbsp;
    <input type="hidden" value="date('Y-m-d')" name="from">
    <input type="date" name="to" placeholder="to" >&nbsp;
    <input type="hidden" value="date('Y-m-d')" name="to">
    <button type="submit" >Search</button>
</form>
            <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="order_table">
    <thead>
           <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">Qualification</th>
      <th scope="col">Address</th>
      <th scope="col">Created At</th>
    </tr>
           </thead>

           <tbody>
           
  @foreach($users as $user)

  <tr>
<th>{{$users->firstItem()+$loop->index}} </th>
<td>{{$user->name}} </td>
<td>{{$user->email}}  </td>
<td>{{\Carbon\Carbon::parse($user->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y years')}}  </td>
<td>{{$user->qualification}}  </td>
<td>{{$user->address}}  </td>
<td>{{$user->created_at->diffForHumans()}}  </td>


<tr>
@endforeach
    
  </tbody>
       </table>
       {{$users->links()}}
   </div>
  </div>
 </body>
</html>

