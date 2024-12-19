<?php
 
    $databaseinfo = require("./connexion.php");

    $connection = mysqli_connect(
        $databaseinfo['servername'],
        $databaseinfo['username'],
        $databaseinfo['password'],
        $databaseinfo['database']
    );

    if (!$connection) {
        die("Erreur de connexion : " . mysqli_connect_error());
    }
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $photo = $_POST["photo"];
        $flag = $_POST["flag"];
        $logo = $_POST["logo"];
        $position = $_POST["position"];
        $nationality = $_POST["nationality"];
        $club = $_POST["club"];
        $rating = $_POST["rating"];
        $pace = $_POST["pace"];
        $shooting = $_POST["shooting"];
        $passing = $_POST["passing"];
        $dribbling = $_POST["dribbling"];
        $defending = $_POST["defending"];
        $physical = $_POST["physical"];
        
        $diving = $_POST["diving"];
        $handling = $_POST["handling"];
        $kicking = $_POST["kicking"];
        $reflexes = $_POST["reflexes"];
        $speed = $_POST["speed"];
        $positioning = $_POST["positioning"];
    
        
        $sql = "INSERT INTO club (club_name, logo) VALUES ('$name', '$logo')";
    
        
        if (mysqli_query($connection, $sql)) {
            echo "Données insérées avec succès";
        } else {
            echo "Erreur d'insertion : " . mysqli_error($connection);
        }
    }
    
    // mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Team</title> 
</head>
<body>

    <nav>
        <div class="logo-name">
            <span class="logo_name">Dashboard Team</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="/FUT_Champions_Web_App/index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Home</span>
                </a></li>
                <li><a href="index.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Joueurs</span>
                </a></li>
                <li><a href="nationality.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Nationality</span>
                </a></li>
                <li><a href="club.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Club</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                

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
            
            <button id="ajouter_club">Ajouter club</button>
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
                            $sql = "SELECT * FROM club";
                            $result = mysqli_query($connection,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<span class="data-list">'.$row['club_name'].'</span></br>';
                            }
                        ?>
                        
                    </div>
                    <div class="data email">
                        <span class="data-title">Photo</span>
                        <?php
                            $sql = "SELECT * FROM club";
                            $result = mysqli_query($connection,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<image src= "'.$row['logo'].'" class="logo_club"/></br>';
                            }
                        ?>
                    </div>
                    
                    <div class="data type">
                        <span class="data-title">modifier</span>
                        <i class="fa-solid fa-square-pen"></i>
                        <i class="fa-solid fa-square-pen"></i>
                        <i class="fa-solid fa-square-pen"></i>
                        <i class="fa-solid fa-square-pen"></i>
                        <i class="fa-solid fa-square-pen"></i>
                    </div>
                    <div class="data type">
                        <span class="data-title">supprimer</span>
                        <i class="fa-solid fa-trash"></i>
                    </div>

                    <div class= "popup-club">
                        <div class="form-groupe-club">
                            <h2>Ajouter Player</h2>
                            <form method="POST" action ="club.php">
                                
                                <div class="uplaod">
                                    <div>
                                        <label for="logo">Logo</label>
                                        <input id="logo" type="url" name="logo" class="inputs" onchange="validation()" />
                                        <span class="erreur"></span>
                                    </div>
                                </div>
                                <div>
                                    <label for="club">Club</label>
                                    <select id="club" name="club" class="inputs" onchange="validation()">
                                        <option value=""></option>
                                        <option value="barcelona">FC Barcelona</option>
                                        <option value="real-madrid">Real Madrid</option>
                                        <option value="manchester-united">Manchester United</option>
                                        <option value="manchester-city">Manchester City</option>
                                        <option value="bayern-munich">Bayern Munich</option>
                                        <option value="paris-saint-germain">Paris Saint-Germain (PSG)</option>
                                        <option value="liverpool">Liverpool FC</option>
                                        <option value="chelsea">Chelsea FC</option>
                                        <option value="juventus">Juventus</option>
                                        <option value="inter-milan">Inter Milan</option>
                                        <option value="ac-milan">AC Milan</option>
                                        <option value="arsenal">Arsenal FC</option>
                                        <option value="ajax">Ajax</option>
                                        <option value="atletico-madrid">AtlÃ©tico Madrid</option>
                                        <option value="dortmund">Borussia Dortmund</option>
                                        <option value="tottenham">Tottenham Hotspur</option>
                                    </select>
                                    <span class="erreur"></span>
                                </div>
                               
                                <button type="submit" class="submit-form-btn" onclick="add()">Add Club</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="club.js"></script>
    
    <script src="https://kit.fontawesome.com/6d9e6483d0.js" crossorigin="anonymous" async defer></script>
</body>
</html>
<?php

mysqli_close($connection);
?>