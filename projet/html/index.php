<?php
 
    $databaseinfo = include __DIR__ . "/connexion.php";

    $connection = mysqli_connect(
        $databaseinfo['servername'],
        $databaseinfo['username'],
        $databaseinfo['password'],
        $databaseinfo['database']
    );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
</head>
<body>

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">CodingLab</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Like</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comment</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>
                
                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <?php
                            $sql = "SELECT * FROM player";
                            $result = mysqli_query($connection,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<span class="data-list">'.$row['name_player'].'</span></br>';
                            }
                        ?>
                        
                    </div>
                    <div class="data email">
                        <span class="data-title">Photo</span>
                        <?php
                            $sql = "SELECT * FROM player";
                            $result = mysqli_query($connection,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<span class="data-list">'.$row['photo'].'</span></br>';
                            }
                        ?>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Position</span>
                        <?php
                            $sql = "SELECT * FROM player";
                            $result = mysqli_query($connection,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<span class="data-list">'.$row['position'].'</span></br>';
                            }
                        ?>
                    </div>
                    <div class="data status">
                        <span class="data-title">Rating</span>
                        <?php
                            $sql = "SELECT * FROM player";
                            $result = mysqli_query($connection,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<span class="data-list">'.$row['rating'].'</span></br>';
                            }
                        ?>
                    </div>
                    <div class="data type">
                        <span class="data-title">modifier</span>
                        <i class="fa-solid fa-square-pen"></i>
                    </div>
                    <div class="data type">
                        <span class="data-title">supprimer</span>
                        <i class="fa-solid fa-trash"></i>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
<?php
mysqli_close($connection);
?>