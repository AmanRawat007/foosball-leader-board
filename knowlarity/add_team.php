<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foosball";

$tn= $_POST['tname'];
$tmot= $_POST['tmoto'];
$tmem1= $_POST['mem1'];
$tmem2= $_POST['mem2'];

//echo "$tn".' '."$tmot".' '."$tmem1".' '."$tmem2".'<br>';

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
    $result = mysqli_query($conn,"SELECT MAX(id) FROM team");
    $row = mysqli_fetch_row($result);
    $highest_id = $row[0];
    ++$highest_id;
    if($highest_id==1)
    {
       $highest_id=1456;
    }   	

    $sql = "INSERT INTO team (id, tname, tmoto, memb1,memb2)
    VALUES ('$highest_id', '$tn', '$tmot', '$tmem1','$tmem2')";

if($tn!=null and $tmot!=null and $tmem1!=null and $tmem2!=null)
{
   if ($conn->query($sql) === TRUE) 
   {
     echo "";
   }
}

$conn->close();
?>

<html>
<head>
<title>Record Added</title>
</head>
<body>
<script>
   alert("Record added successfully. Your team id is "+ <?php echo $highest_id; ?> + "  ,It is recommended to note it down as it will be used for future processes."+"\n"+"Note:- All Fields are mendatory otherwise data will not be stored.")
   window.location.href = "index.html"
</script>
</body>
</html>