<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@if(session('success'))
    <p style="color: green;">{{session('success')}}</p>
@endif
<div class="container mt-5">
    <a  href="{{route('studentForm')}}" class="btn btn-success">Add Student</a>
    <h1 class="text-center mb-4">Student Record</h1>
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>City</th>
                <th>Address</th>
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stu as $res)
            <tr align="center">
                <td>{{ $res->id }}</td>
                <td>{{ $res->name }}</td>
                <td>{{ $res->city }}</td>
                <td>{{ $res->address }}</td>
                <td>
                    <img src="{{ asset('storage/' . $res->images) }}" alt="Image Not Found" width="100" style="border-radius: 10%">

                </td>
                <td> 
                    <a href="{{route('student.delete',$res->id)}}" class="btn btn-sm btn-danger" onclick="javascript: return confirm('Are you Sure to Delete This Record')">Delete</a>
                    <a href="{{route('student.edit',$res->id)}}" class="btn btn-sm btn-warning" >Update</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <center>
    <div class="mt-5">
        {{$stu->links()}}
    </div>
</center>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
