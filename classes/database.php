<?php

// batabase connection

$conn = mysqli_connect('localhost','root',"root","todo-list",'10028');
// Check connection
if($conn){
    
}else{
    echo "Connection failed" . mysqli_connect_error();
}
