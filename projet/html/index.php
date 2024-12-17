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
            
            <button id="ajout">Ajouter player</button>
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
                                echo '<image src= "'.$row['photo'].'"/></br>';
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
                    </div>

                    <div id= "popup">
                        <div class="form-groupe">
                            <h2>Ajouter Player</h2>
                            <form>
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
                                <button type="button" class="submit-form-btn" onclick="add()">Add player</button>
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
mysqli_close($connection);
?>