

<?php
    $title_page = "Page d'accueil ";
    include("header.inc.php");
?>

  <body>
  <nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">Family League Arena</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-lg-0">
      <a class="navbar-brand" href="Liste_Jeux.php">Nos Jeux</a>
    
        </ul>
        <ul class="navbar-nav mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">S'inscrire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="connexion.php">Se connecter</a>
        </li>
</ul>
    </div>
  </div>
</nav>

     


              </div>
            </div>

            <div class="container-fluid">
          <div class="row">
            <div class="col-3">
              <div style="height:10vh;"></div>
            </div>
          </div>
         <div  class="row" id="block1">
            <div class="col-lg-8" id="block1-1">
              <p class="fw-bold" style="margin-left:10vw; font-size:3.1rem;">Bienvenue à la <span class="text-primary "> Family <span style="margin-left:7vw;">League Arena! </span></span> </p>
              <p style="margin-left:7vw; font-size:2.3rem;"><span class="text-primary">Rejoignez</span> la plus grande table de jeux</p>
              <p class="text-primary" style="margin-left:23vw; font-size:2.3rem;">au monde</p>
              <p class="text-primary" style="margin-left:17vw; font-size:2.3rem; margin-top:5vh;">Qu'attendez vous!!</p>
            </div>
            <div class="col-lg-4 d-flex align-items-center">
              <div>
              <div style="width:100%" class="rounded-circle col-sm-8"><div class="rounded-circle col-sm-8" style="height:0;padding-bottom:56.25%;position:relative;width:100%"><iframe allowfullscreen="" frameBorder="0" height="100%" src="https://giphy.com/embed/P6trDNTPCVBuH9clMl/video" style="left:0;position:absolute;top:0" width="100%"></iframe></div></div>
                <video class="rounded-circle col-sm-8" autoplay loop muted src="https://giphy.com/embed/P6trDNTPCVBuH9clMl/video" ></video>
              </div>
            </div>
          </div>
      </div>
            <div class="row"> 
             
              
              </div>
            </div>
          </div>
              
              
            
          </div>
        </div>
              <div class="container">
                  <div class="row">
                    
                      <div class="col">
                        <form action="inscription.php" method="POST" >
                          <button type="submit" class="btn btn-primary col-sm-7" style="margin-left:15vw;">Commencez à jouer maintenant !</button>
                        </form>
                      </div>
                </div>
            </div>
            

  </body>

</html>

