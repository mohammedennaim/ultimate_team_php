<?php
 
    $databaseinfo = include __DIR__ . "/connexion.php";

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
        if ($position =="GK") {
            $diving = $_POST["diving"];
            $handling = $_POST["handling"];
            $kicking = $_POST["kicking"];
            $reflexes = $_POST["reflexes"];
            $speed = $_POST["speed"];
            $positioning = $_POST["positioning"];
            $gk_info = "INSERT INTO gool_keeper (diving, handling, kicking, reflexes, speed, positioning) VALUES ('$diving', '$handling','$kicking','$reflexes','$speed','$positioning')";
            mysqli_query($connection, $gk_info);
        }else {
            $pace = $_POST["pace"];
            $shooting = $_POST["shooting"];
            $passing = $_POST["passing"];
            $dribbling = $_POST["dribbling"];
            $defending = $_POST["defending"];
            $physical = $_POST["physical"];
            $player_info = "INSERT INTO player_info (pace, shooting, passing, dribbling, defending, physical) VALUES ('$pace', '$shooting','$passing','$dribbling','$defending','$physical')";
            mysqli_query($connection, $player_info);
        }
        
        
    
        
        $club_info = "INSERT INTO club (club_name, logo) VALUES ('$club', '$logo')";
        $nationality_info = "INSERT INTO nationality (nationality, flag) VALUES ('$nationality', '$flag')";
        $player = "INSERT INTO player (name_player, photo, position, rating) VALUES ('$name', '$photo','$position','$rating')";
    
        
        mysqli_query($connection, $club_info);
        mysqli_query($connection, $nationality_info);
        mysqli_query($connection, $player);
        // if (mysqli_query($connection, $gk_info)||mysqli_query($connection, $player_info)||mysqli_query($connection, $club_info)||mysqli_query($connection, $nationality_info)||mysqli_query($connection, $player)) {
        //     echo "Données insérées avec succès";
        // } else {
        //     echo "Erreur d'insertion : " . mysqli_error($connection);
        // }
    }
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
            
            <button id="ajouter_player">Ajouter player</button>
        </div>

        <div class="dash-content">

            <div class="activity">
                <div class="title">
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
                                echo '<image src= "'.$row['photo'].'" class="image_joueur"/></br>';
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
                        <i class="fa-solid fa-square-pen"></i>
                        <i class="fa-solid fa-square-pen"></i>
                        <i class="fa-solid fa-square-pen"></i>
                        <i class="fa-solid fa-square-pen"></i>
                    </div>
                    <div class="data type">
                        <span class="data-title">supprimer</span>
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-trash"></i>
                    </div>
                    <div class="data type">
                        <span class="data-title">info_player</span>
                        <i class="fa-solid fa-circle-info"></i>
                        <i class="fa-solid fa-circle-info"></i>
                        <i class="fa-solid fa-circle-info"></i>
                        <i class="fa-solid fa-circle-info"></i>
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <div id= "popup_info_player">
                    <i class="fa-solid fa-x fa-x-info"></i>
                            <?php
                                if ($position =="GK") {
                                    $gk_data = "SELECT * FROM player 
                                    inner join gool_keeper where id = player_id";
                                    $result = mysqli_query($connection,$gk_data);
                                    echo '<div>'.mysqli_fetch_assoc($result)[''].' : '.$_POST["positioning"].'</div>';
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<div> diving : '.$row['diving'].'</div>';
                                        echo '<div> handling : '.$row['handling'].'</div>';
                                        echo '<div> kicking : '.$row['kicking'].'</div>';
                                        echo '<div> reflexes : '.$row['reflexes'].'</div>';
                                        echo '<div> speed : '.$row['speed'].'</div>';
                                        echo '<div> positioning : '.$row['positioning'].'</div>';
                                    }
                                }else {
                                    echo '<div>pace : '.$_POST["pace"].'</div>';
                                    echo '<div>shooting : '.$_POST["shooting"].'</div>';
                                    echo '<div>passing : '.$_POST["passing"].'</div>';
                                    echo '<div>dribbling : '.$_POST["dribbling"].'</div>';
                                    echo '<div>defending : '.$_POST["defending"].'</div>';
                                    echo '<div>physical : '.$_POST["physical"].'</div>';
                                }
                            ?>
                    </div>
                    <div id= "popup">
                        <div class="form-groupe">
                            <h2>Ajouter Player</h2>
                            <form action="" method="post">
                                <div>
                                    <label for="name">Name</label>
                                    <input type="text" id="name" placeholder="Enter player name" name="name" class="inputs"
                                        onchange="validation()" />
                                    
                                    <span class="erreur"></span>
                                </div>
                                <div class="uplaod">
                                    <div class="upload-photo">
                                        <div>
                                            <label for="photo">Photo</label>
                                            <input id="photo" type="url" name="photo" class="inputs" onchange="validation()" />
                                            <span class="erreur"></span>
                                        </div>
                                    </div>
                                    <div class="upload-flag">
                                        <div>
                                            <label for="flag">Flag</label>
                                            <input id="flag" type="url" name="flag" class="inputs" onchange="validation()" />
                                            <span class="erreur"></span>
                                        </div>
                                    </div>
                                    <div class="upload-logo">
                                        <div>
                                            <label for="logo">Logo</label>
                                            <input id="logo" type="url" name="logo" class="inputs" onchange="validation()" />
                                            <span class="erreur"></span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="position">Position</label>
                                    <select id="position" name="position" class="inputs" onchange="validation()">
                                        <option value=""></option>
                                        <option value="GK">GK</option>
                                        <option value="LB">LB</option>
                                        <option value="LCB">LCB</option>
                                        <option value="RCB">RCB</option>
                                        <option value="RB">RB</option>
                                        <option value="LCM">LCM</option>
                                        <option value="CM">CM</option>
                                        <option value="RCM">RCM</option>
                                        <option value="LW">LW</option>
                                        <option value="ST">ST</option>
                                        <option value="RF">RF</option>
                                    </select>
                                    <span class="erreur"></span>
                                </div>
                                <div>
                                    <label for="nationality">Nationality</label>
                                    <select id="nationality" name="nationality" class="inputs" onchange="validation()">
                                        <option value=""></option>
                                        <?php
                                            $sql = "SELECT * FROM nationality";
                                            $result = mysqli_query($connection,$sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value='.$row['nationality'].'>'.$row['nationality'].'</option>';
                                            }
                                        ?>
                                        
                                    </select>
                                    <span class="erreur"></span>
                                </div>

                                <div>
                                    <label for="club">Club</label>
                                    <select id="club" name="club" class="inputs" onchange="validation()">
                                        <option value=""></option>
                                        <?php
                                            $sql = "SELECT * FROM club";
                                            $result = mysqli_query($connection,$sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value='.$row['club_name'].'>'.$row['club_name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <span class="erreur"></span>
                                </div>
                                <div class="formation">
                                    <div class="changerFormation">
                                        <label class="label" for="rating">Rating</label>
                                        <input type="number" id="rating" name="rating" min="1" max="99"
                                            class="inputs inputsFormation" placeholder="rating" onchange="validation()">
                                        <span class="erreur"></span>
                                    </div>
                                    <div class="changerFormation">
                                        <label class="label" for="pace">pace</label>
                                        <input type="number" id="pace" name="pace" min="1" max="100" placeholder="pace"
                                            class="inputs inputsFormation" onchange="validation()">
                                        <span class="erreur"></span>
                                    </div>
                                    <div class="changerFormation">
                                        <label class="label" for="shooting">shooting</label>
                                        <input type="number" id="shooting" name="shooting" min="1" max="99"
                                            class="inputs inputsFormation" placeholder="shooting" onchange="validation()">
                                        <span class="erreur"></span>
                                    </div>
                                    <div class="changerFormation">
                                        <label class="label" for="passing">passing</label>
                                        <input type="number" id="passing" name="passing" min="1" max="99"
                                            class="inputs inputsFormation" placeholder="passing" onchange="validation()">
                                        <span class="erreur"></span>
                                    </div>
                                    <div class="changerFormation">
                                        <label class="label" for="dribbling">dribbling</label>
                                        <input type="number" id="dribbling" name="dribbling" min="1" max="99"
                                            class="inputs inputsFormation" placeholder="dribbling" onchange="validation()">
                                        <span class="erreur"></span>
                                    </div>
                                    <div class="changerFormation">
                                        <label class="label" for="defending">defending</label>
                                        <input type="number" id="defending" name="defending" min="1" max="99"
                                            class="inputs inputsFormation" placeholder="defending" onchange="validation()">
                                        <span class="erreur"></span>
                                    </div>
                                    <div class="changerFormation">
                                        <label class="label" for="physical">physical</label>
                                        <input type="number" id="physical" name="physical" min="1" max="99"
                                            class="inputs inputsFormation" placeholder="physical" onchange="validation()">
                                        <span class="erreur"></span>
                                    </div>
                                </div>
                                
                                <button type="submit" class="submit-form-btn" onclick="add()">Add player</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    
    <script src="https://kit.fontawesome.com/6d9e6483d0.js" crossorigin="anonymous" async defer></script>
</body>
</html>
<?php
// $stmt = $mysqli->prepare("INSERT INTO player (column1, column2) VALUES (?, ?)");
// $stmt->bind_param("ss", $var1, $var2);
mysqli_close($connection);
?>