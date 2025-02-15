<?php
session_start();
if (!isset($_SESSION['uname'])) {
    echo"<script> alert('Failed! Please Register')";
    header("Location: ../login/index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bank-Balance Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
  <?php include("../navbar.php");?>
    <div class="container mt-5">
        <div class="row">
            <h5><a href="table.php" style="text-decoration:none;"><i class="bi bi-journal-richtext"></i> Balance Report</a></h5>
            <hr>
            <nav class="my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../main/index.php" style="text-decoration:none;">Home</a></li>
                    <li class="breadcrumb-item active">Add Balance </li>
                </ol>
            </nav>
            <div class="col-md-8">
                <form action="http://localhost/erp/balance/create.php" method="POST">
                    

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="type" class="form-label fw-bold">Payment Type:</label>
                        <select class="form-select" name="type" id="type" aria-label="Default select example">
                        <option selected>Payment Type</option>
                        <option value="Bank">Bank</option>
                        <option value="Cash">Cash</option>
                        </select>
                        </div>
                    </div>

                    <div class="row mb-3">
              
                        <div class="col-md-12">
                            <label for="amnt" class="form-label fw-bold">Amount:</label>
                            <input type="text" name="amnt" id="amnt" style="border-color:black;" class="form-control" placeholder="Enter Amount">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" name="btn" id="btn" class="btn btn-success">Save</button>
                    </div>

                </form>
            </div>
            <!-- row end -->
        </div>
        <!-- Container end -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  </body>
</html>