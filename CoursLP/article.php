<?php //////////bienvenue dans le formulaire pour ajouter des articles?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/header.inc.php';?>



    

    <body>
        <!-- Responsive navbar-->
        <?php include 'includes/menu.inc.php';?>


        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                
                <div class="col-12">
                    <h1 class="font-weight-light"><?php echo "Bienvenue dans le formulaire pour ajouter des articles" ?></h1>
                    <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
                    
                </div>
            </div>

            


            <!-- Content Row--> 
            <!-- Formulaire--> 
            <form>
                <!-- Titre--> 
                <div class="mb-3">
                <label for="texte" class="form-label">Titre</label>
                    <input type="text" name="texte" class="form-control" id="texte" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>

                <!-- Texte--> 
                <div class="input-group">
                    <span class="input-group-text">Mettre le texte de l'article ici</span>
                    <textarea class="form-control" name="texte" aria-label="With textarea"></textarea>
                </div>


                <br><br>

                 <!-- image--> 
                 <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control" id="image">
                    <label class="input-group-text" for="inputGroupFile02">Choisir Une Image</label>
                </div>
                    
                 <!-- publie--> 
                <div class="mb-3 form-check">
                    <input type="checkbox" name = "publie" class="form-check-input" id="publie">
                    <label class="form-check-label" for="exampleCheck1">Publie</label>
                 </div>
                 

                <button type="submit" class="btn btn-primary">Ajouter Mon Article</button>
            </form>
            <br>





        </div>

        



        <!-- Footer-->
        <?php include 'includes/footer.inc.php';?>
    </body>
</html>