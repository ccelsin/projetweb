
<?php
    $title_page = "Page d'accueil ";
    include("header.inc.php");
?>

  <body>
      <main>
            <p class="fs-1" style="margin-left:25px">Bienvenue à la <span class="text-primary"> Family League Arena! </span>  </p>
            <p class="fs-3"><span class="text-primary">Rejoignez</span> le plus grand jeux de table</p>
            <p class="text-primary fs-3">au monde</p>
            <p class="text-primary fs-3">Qu'attendez vous!!</p>
            
              <div class="container">
                  <div class="row"  style="margin-top :80vh">
                    <div class="col-4"></div>
                    <div class="col-5"></div>
                      <div class="col">
                        <form action="index_traitement.php" method="POST" >
                          <input type="submit" value="Commencez à jouer maintenant !" ><br>
                        </form>
                      </div>
                </div>
            </div>
            

            <div class="row">
              <p>
                <br><br><br>
              </p>
            </div>
            <div class="row ">
              <div class="col-lg-4">
              <img src="images/ordi.png" class="rounded float-start img-fluid " id="monitor">
              </div>
              <div class="col-lg-3">
              <p>
                <br><br><br><br><br>
              </p>
              <img src="images/tablette.png" class=" img-fluid " id="monitor">
              </div>

              <div class="col-lg-1">
              <p>
                <br><br><br><br><br><br>
              </p>
              <img src="images/ecran.png" class=" img-fluid " id="monitor">
              </div>


              </div>
            </div>




      </main>

  </body>

</html>

