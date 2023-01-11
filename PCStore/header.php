<?php
$search = @$_GET['search'];
$connection = new PDO('mysql:host=localhost:3307;dbname=pcstoreproject',"root","");


if ($search) {
    $query = $connection->prepare('SELECT * from products where name LIKE ?');

    $query->execute(["%".$search."%"]);

    $products = $query->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Style.css?<?php echo time(); ?>">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <title>PcStore</title>
</head>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

<!-- Fontawesome -->
<script src="https://kit.fontawesome.com/117970980f.js" crossorigin="anonymous"></script>

<!--- HEADER ---->

<div class="switch">
    <label class="theme-switch" for="checkbox">
    <input type="checkbox" id="checkbox" />
        <div class="slider round"></div>
    </label>
</div>

<div class="container-fluid mx-auto text-center theme">
    <a href="index.php">
        <img src="Pictures\Main Page\logo6v2.png" class="logo">
    </a>    
</div>

<div class="container band">
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <button onmouseover="myFunction()" class="dropBtn dropBtnTxt hideMobile">Components</button>
                <img onmouseover="myFunction()" class = "menuBtn dropbtn showMobile hideDesktop" src="Pictures/Main Page/menu.png">

                <div id="myDropdown" class="dropdown-content">
                    <!----- foreach php ---->
                    <a href="itm_cpu.php">Processors</a>
                    <a href="itm_mobo.php">Motherboards</a>
                    <a href="itm_ram.php">RAM</a>
                    <a href="itm_psu.php">Power suplies</a>
                    <a href="itm_gpu.php">Videocards</a>
                    <a href="itm_storage.php">Storage</a>
                    <a href="itm_cool.php">Cooling</a>
                </div>
            </div>
        </div>

        <div class="col">
            <form>
                <div class="input-group rounded search showMobile">
                    <input type="text" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" autocomplete="off"/>
                </div>
            </form>
        </div>

        <div class="col">
            <img class="menuBtn" src="Pictures\Main Page\cart.png">
        </div>

        <div class="col">
            <a href="login.php" class="loginbtn">
            <!-- <img class="loginBtn static" src="Pictures\Main Page\login_v3.png"> -->
            <img class="loginBtn active" src="Pictures\Main Page\login_v3.gif">
        </div>
    </div>
</div>

<!-- -------------------------------------------------- -->
<script>
    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);
    
        if (currentTheme === 'light') {
            toggleSwitch.checked = true;
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
        }
        else {        document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        }    
    }
    function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

    toggleSwitch.addEventListener('change', switchTheme, false);
</script>
