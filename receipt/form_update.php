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
    <title>Receipt Update Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">
     
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
     crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
 <?php include("../navbar.php");?>
    <div class="container mt-5">
        <div class="row">
            <h5><i class="bi bi-plus-square-fill"></i> Update Receipt</h5>
            <hr>
            <nav class="my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="table.php" style="text-decoration:none;">Home</a></li>
                    <li class="breadcrumb-item active">Update Receipt</li>
                </ol>
            </nav>
            <div class="col-md-8">
              <?php
              $id=$_GET['id'];
              ?>
                <form action="http://localhost/erp/receipt/update.php?id=<?php echo $id; ?>" method="POST">
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold">Bill No:</label>
                            <input type="text" name="bill" id="bill" style="border-color:black;" class="form-control" value="<?php echo $_GET['bill'];?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="date" class="form-label fw-bold">Date:</label>
                            <input type="date" name="date" id="date" style="border-color:black;" class="form-control" value="<?php echo $_GET['date'];?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-3">
                            <label for="amnt" class="form-label fw-bold"> Total Amount:</label>
                            <input type="text" name="amnt" id="amnt" style="border-color:black;" class="form-control" value="<?php echo $_GET['amnt'];?>">
                        </div>
                        <div class="col-md-3">
                            <label for="receive" class="form-label fw-bold">Received Amount:</label>
                            <input type="text" name="receive" id="receive" style="border-color:black;" class="form-control" value="<?php echo $_GET['receive'];?>">
                            <input type="hidden" name="receive1" id="receive1" class="form-control" value="<?php echo $_GET['receive'];?>">
                        </div>
                        <div class="col-md-3">
                            <label for="pend" class="form-label fw-bold">Pending Amount:</label>
                            <input type="text" name="pend" id="pend" style="border-color:black;" class="form-control" value="<?php echo $_GET['pend'];?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="type" class="form-label fw-bold">Payment Type:</label>
                            <input type="text" name="type" id="type" style="border-color:black;" class="form-control" value="<?php echo $_GET['type'];?>">
                        </div>
                    </div>
                
                    <div class="mb-3">
                        <button type="submit" name="update" id="update" class="btn btn-success">Update</button>
                    </div>

                </form>
            </div>
            <!-- row end -->
        </div>
        <!-- Container end -->
    </div>
    
  </body>
  <script>
    $(document).ready(function() {
        $('#billno').on('change', function() {
            var code = $(this).val();
            if (code) {
                $.ajax({
                    url: "get_products.php",
                    method: "POST",
                    data: { code: code },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#amnt').val(data.total);
                        } else {
                            $('#amnt').val("");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", error);
                    }
                });
            } else {
                $('#amnt').val("");
            }
        });
    });




    $('#amnt, #receive').on('input', function() {
        var amnt = parseFloat($('#amnt').val()) || 0;
        var paid = parseFloat($('#receive').val()) || 0;
        var pend = amnt - paid;
        $('#pend').val(pend.toFixed(2));
    });

    </script>

</html>