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
            
            <button id="ajouter_nationality">Ajouter nationality</button>
        </div>

        <div class="dash-content">

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>
                
                <div class="activity-data">
                    <div class="data email">
                        <span class="data-title">Photo</span>
                        <?php
                            $sql = "SELECT * FROM nationality";
                            $result = mysqli_query($connection,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<image src= "'.$row['flag'].'"/></br>';
                            }
                        ?>
                    </div>
                    <div class="data status">
                        <span class="data-title">name</span>
                        <?php
                            $sql = "SELECT * FROM nationality";
                            $result = mysqli_query($connection,$sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<span class="data-list">'.$row['nationality'].'</span></br>';
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
                        <i class="fa-solid fa-square-pen"></i>
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
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-trash"></i>
                    </div>

                    <div class="popup-nationality">
                        <div class="form-groupe-nationality">
                            <h2>Ajouter Nationality</h2>
                            <form method="POST">
                                <div class="uplaod">
                                    <div class="upload-flag-nationality">
                                        <div>
                                            <label for="flag">Flag</label>
                                            <input id="flag" type="url" name="flag" class="inputs" onchange="validation()" />
                                            <span class="erreur"></span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="nationality">Nationality</label>
                                    <select id="nationality" name="nationality" class="inputs" onchange="validation()">
                                        <option value=""></option>
                                        <option value="morocco">Morocco</option>
                                        <option value="albania">Albania</option>
                                        <option value="algeria">Algeria</option>
                                        <option value="argentina">Argentina</option>
                                        <option value="australia">Australia</option>
                                        <option value="brazil">Brazil</option>
                                        <option value="canada">Canada</option>
                                        <option value="china">China</option>
                                        <option value="egypt">Egypt</option>
                                        <option value="france">France</option>
                                        <option value="germany">Germany</option>
                                        <option value="india">India</option>
                                        <option value="italy">Italy</option>
                                        <option value="japan">Japan</option>
                                        <option value="mexico">Mexico</option>
                                        <option value="afghanistan">Afghanistan</option>
                                        <option value="russia">Russia</option>
                                        <option value="saudi-arabia">Saudi Arabia</option>
                                        <option value="spain">Spain</option>
                                        <option value="united-states">United States</option>
                                    </select>
                                    <span class="erreur"></span>
                                </div>

                                <button type="submit" class="submit-form-btn" onclick="add()">Add Nationality</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="nationality.js"></script>
    
    <script src="https://kit.fontawesome.com/6d9e6483d0.js" crossorigin="anonymous" async defer></script>
</body>
</html>
<?php
// $stmt = $mysqli->prepare("INSERT INTO nationality (nationality, flag) VALUES (?, ?)");
// $stmt->bind_param("ss", $var1, $var2);
mysqli_close($connection);
?>