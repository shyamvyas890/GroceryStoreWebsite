<?php 
require_once("./class/httpResponse.php");
require_once("./util/httpUtil.php");
$request = json_decode(file_get_contents('php://input'), false);
if(strlen($request->name)>0 && strlen($request->address)>0 && strlen($request->creditcard)>0 && strlen($request->theOrder)>0 ){
    $host="localhost";
    $dbUsername= "root";
    $dbPassword="";
    $dbName="theorders";
    //connection created here
    $conn= new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if (mysqli_connect_error()) {
        $error= new HttpResponse(false, "I could not connect to the database :(");
        HttpUtil::send($error);
        die();
    }
    else{
        $insertStatement= "Insert Into theorders.orders(name, address, creditcard, theOrder) values(?,?,?,?)";
        $stmt= $conn->prepare($insertStatement);
        $stmt->bind_param('ssss',$request->name ,$request->address, $request->creditcard, $request->theOrder);
        $stmt->execute();

        if(mysqli_error($conn)){
            $error= new HttpResponse(false, "Failed to execute querry.");
            HttpUtil::send($error);
        }
        else{
            $success= new HttpResponse(true, "Successfully executed query!");
            HttpUtil::send($success );
        }
        $conn->close();
        die();
    }
}
else{
    $error= new HttpResponse(false, "Sorry, all fields are required. :(");
    HttpUtil::send($error);
    die();
}
?>