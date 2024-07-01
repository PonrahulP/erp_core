<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Method:GET');
header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers,Authorization,X-Request-With');
include ('function.php');
$requestmethod=$_SERVER['REQUEST_METHOD'];
if($requestmethod=="GET"){
    if(isset($_GET['id'])){
        $receipt=getreceipt($_GET);
        header("Location:table.php");
        echo $receipt;
    }
    else{
        $receiptlist=getreceiptlist();
        header("Location:table.php");
        echo $receiptlist;
        
    }
}
else{
    $data=[
        'status'=>404,
        'message'=>$requestmethod ."Method Not Allowed",
    ];
    header("HTTP/1.0 404 Method Not Allowed");
    echo json_encode($data);
}
?>