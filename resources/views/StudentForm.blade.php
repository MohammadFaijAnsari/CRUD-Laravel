<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h1 class="text-center mb-4">Student Registration Form</h1>
      <form action="{{route('student.save')}}" method="post" class="p-4 border rounded shadow-sm bg-light" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="mb-3">
          <label for="city" class="form-label">City</label>
          <input type="text" name="city" id="city" class="form-control">
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" name="address" id="address" class="form-control">
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Select Image</label>
          <input type="file" name="images" id="images" class="form-control">
        </div>
    
        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-primary">Save Data</button>
          <button type="reset" class="btn btn-danger">Clear Data</button>
        </div>
      </form>
      <br><br>
    </div>
  </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
