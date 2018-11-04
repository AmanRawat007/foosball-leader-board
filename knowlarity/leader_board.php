<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/font-awesome.min.css"> <!-- for signs symbols -->
  <link rel="stylesheet" href="css/bootstrap.css"> <!-- for layout -->
  <link rel="stylesheet" href="css/style.css">
  <title>foosball-leader-board Admin Area</title>
</head>
<body>
  <nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" data-target="#mynavbar" data-toggle="collapse">
        <span class="navbar-toggle-icon"></span>
      </button>
      <a href="index.html" class="navbar-brand mr-5">FOOSBALL 2018</a>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="index.html" class="nav-link"> Dashboard</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="leader_board.php" class="nav-link active"> LeaderBoard</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="index.html" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user-circle-o"></i> Welcome  Admin
            </a>
            <div class="dropdown-menu">
              <a href="team_registered.php" class="dropdown-item"><i class="fa fa-group"></i> Total Team Registered</a>
              <a href="leader_board.php" class="dropdown-item"><i class="fa fa-binoculars"></i> LeaderBoard</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!--header-->
  <header id="main-header" class="bg-success py-2 text-white">
    <div class="container">
      <div classs="row">
        <div class="col-md-6">
          <h1><i class="fa fa-binoculars"></i> LeaderBoard (2018)</h1>
      </div>
    </div>
  </header>

  <section id="blank"  class="py-3"></section>
<!--Section Table-->
  <section id="table"  class="py-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4><b>Top 5 Teams</b></h4>
            </div>
            <table id="myTable" class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>#Rank</th>
                  <th>Team Name</th>
                  <th>Member1</th>
                  <th>Member2</th>
                  <th>Points</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  include 'connect.php';
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  if ($conn->connect_error)
                  {
                      die("Connection failed: " . $conn->connect_error);
                  }

                  $result = mysqli_query($conn,"SELECT * FROM team order by points DESC");
                  $x=1;
                  while($r = mysqli_fetch_array($result) and $x<6)
                  {
                    echo '<tr>
                          <td> '.$x          .'</td>
                          <td> '.$r["tname"] .'</td>
                          <td> '.$r["memb1"] .'</td>
                          <td> '.$r["memb2"] .'</td>
                          <td> '.$r["points"] .'</td>
                          </tr>';
                    $x++;
                  }

                  $conn->close();
                ?>

              </tbody>
            </table>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card card-info mb-3 text-center text-white">
            <div class="card-block">
              <h3>Total Team Registered</h3>
              <h1 class="display-4"><i class="fa fa-group"></i> </h1>
              <a href="team_registered.php" class="btn btn-sm btn-outline-secondary text-white">View</a>
            </div>
          </div>

          <div class="card card-success mb-3 text-center text-white">
            <div class="card-block">
              <h3> Present LeaderBoard(2018)</h3>
              <h1 class="display-4"><i class="fa fa-binoculars"></i></h1>
              <a href="leader_board.php" class="btn btn-sm btn-outline-secondary text-white">View</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<!--Footer-->
 <footer id="main-footer" class="text-center text-white bg-inverse mt-4  py-1">
   <div class="container">
     <div class="row">
       <div class="col">
         <p class="lead">Copyright 2018  &copy; Foosball</p>
       </div>
     <div>
   </div>
 </footer>

  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
