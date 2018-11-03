<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foosball";

$tm1 = $_POST['team1'];
$tid1= $_POST['id1'];
$tm2 = $_POST['team2'];
$tid2= $_POST['id2'];
$c   = $_POST['choice'];

//echo "tm1 -> ".' '.gettype($tm1).'<br>';
//echo "tid1 -> ".' '.gettype($tid1).'<br>';
//echo "tm2 -> ".' '.gettype($tm2).'<br>';
//echo "tid2 -> ".' '.gettype($tid1).'<br>';
//echo "c -> ".' '.gettype($c).'<br>';
//echo "$tm1".'  '."$tid1".' '."$tm2".' '."$tid2".' '."$c".'<br>';


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

if($tm1!=null and $tm2!=null and $tid1!=null and $tid2!=null)
{

   $temp= mysqli_query($conn,"SELECT * FROM team");
   $t1="null";//store orignal id of team1 
   $t2="null";//store orignal id of team2
   $t1p="0";
   $t2p="0";

   while($r = mysqli_fetch_array($temp))
   {   
      // echo $r['id'].' '.$r['tname'].' '.$r['tmoto'].' '.$r['memb1'].' '.$r['memb2'].' '.$r['points'].'<br>';
      // echo gettype($r['tname']).'<br>'; 
      
      if( strcmp($tm1,$r['tname'])==0 )
      {
        //echo "match".' '."tm1 :- ".' '.$tm1.' '." and tname is ".$r['tname'].'<br>';
        $t1=$r['id'];
        $t1p=$r['points'];
      }
       
      if( strcmp($tm2,$r['tname'])==0 )
      {
        //echo "match".' '."tm1 :- ".' '.$tm1.' '." and tname is ".$r['tname'].'<br>';
        $t2=$r['id'];
        $t2p=$r['points'];
      }

   }    	
   
   // echo $t1.'  with points '.$t1p.'<br>';
   // echo $t2.' with points '.$t2p.'<br>'; 
   
   if( strcmp($t1,"null") and strcmp($t2,"null") )
   {
     if( strcmp($t1,$tid1)==0 and strcmp($t2,$tid2)==0 )
      { 
        if( strcmp($c,"Team 1") )
        {
           $t2p=$t2p+20;
           $sql1 = "UPDATE team SET points=$t2p WHERE id=$t2";
           $t1p=$t1p-20;
           $sql2 = "UPDATE team SET points=$t1p WHERE id=$t1";
           $conn->query($sql1);
           $conn->query($sql2);
        } 
        else
        {
           $t1p=$t1p+20;
           $sql1 = "UPDATE team SET points=$t1p WHERE id=$t1";
           $t2p=$t2p-20;
           $sql2 = "UPDATE team SET points=$t2p WHERE id=$t2";
           $conn->query($sql1);
           $conn->query($sql2);
        }
      }      
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
   alert("Points Updated Successfully")
   window.location.href = "index.html"
</script>

}

</body>
</html>