<style>
    nav ul a .iconP{
        margin: 0 4px 0 0px;
    }

    .container-fluid-nav {
        display: flex;
        justify-content: space-around;
    }
</style>

<nav id="a" class="navbar navbar-expand-md navbar-light bg-light navbar-fixed-top">
    <!-- <i class="fab fa-accessible-icon"></i> -->
    <div class="navbar-header">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapseDIv">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <span class="navbar-text"> 
        <img src="images/icon.png" alt=""> 
        <a href="index.php" class="navbar-brand text-danger" style="font-family: Segoe Script">HajurKo Property</a>
    </span>
    <div class="container-fluid-nav text-center collapse navbar-collapse" id="collapseDIv">
        <ul class="navbar-nav" id="menuS">
            <li class="nav-item"><a href="design.html"  class="nav-link icon home"> <p class="iconP">Home</p></a></li>
            <li class="nav-item"><a href="forum.php"  class="nav-link icon forum"><p class="iconP">Flats</p></a></li>
            <li class="nav-item"><a href="events.php" class="nav-link icon events"><p class="iconP">Houses</p></a></li>
            <li class="nav-item"><a href="sports.php" class="nav-link icon sports"><p class="iconP">Room</p></a></li>
        </ul>
    </div>
    <div class="dropdown">
        <a class="nav-link dropdown-toggle mr-5 text-dark" href="#" id="navbarDropdown" data-target="#new" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Join-Us Now
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="new">
            <a class="dropdown-item" href="#">Login</a>
        <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Register</a>
        </div>
    </div>
</nav>






































