<?php //////////bienvenue dans le formulaire pour ajouter des articles?>

<?php require_once 'config/init.conf.php' ;?>









<?php
    if(isset($_POST['submit'])){
        //print_r2($_POST);
       // print_r2($_FILES);
       // exit();
        $articles = new articles();
        $articles->hydrate($_POST);
    
        $articles->setDate(date('Y-m-d'));


        $publie = $articles->getPublie() === 'on' ? 1 : 0; // Condition ternaire. Si $publie = on, publie vaut 1 sinon il vaut 0.
    
    
        // Insertion ou mise à jour de l'article.
        $articlesManager = new articlesManager($bdd);
        $articlesManager->addArticles($articles);
            
        //var_dump($articlesManager)
    
        // Traitement de l'image

        if ($_FILES['image']['error'] == 0) {
            $fileInfos = pathinfo($_FILES['image']['name']);///ont regarde les infos l'image recupere 
            move_uploaded_file($_FILES['image']['tmp_name'],///ont recup en memoire l'image ajouter

            'img/'.$articlesManager->get_getLastInsertId() ///ont place l'image upload dans le dossier img et ont recup le dernier ID de l'article creer
            . '.' . $fileInfos['extension']); ///ont renomme l'image par le dernier id et ont lui rajoute l'extension   


        }
        if($articlesManager->get_result() == true){
            $_SESSION['notification']['result'] = 'success';
            $_SESSION['notification']['message'] = 'votre article est ajouter';
        }
        else{
            $_SESSION['notification']['result'] = 'danger';
            $_SESSION['notification']['message'] = 'une erreur est survenue pendant la creation';
        }

        
        
    header("Location: index.php"); ///Retour a l'index apres avoir creer le fichier
    exit();

    }
    
    else{

    
   
?>













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
            <form method=POST id="articleForm" action="FormArticles.php" enctype="multipart/form-data">

                <!-- Titre--> 
                <div class="mb-3">
                <label for="texte" class="form-label">Titre</label>
                    <input type="text" name="titre" class="form-control" id="texte" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text"></div>
                </div>

                <!-- Texte--> 
                <div class="input-group">
                    <span class="input-group-text">Article texte</span>
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
                    <input type="checkbox" name="publie" class="form-check-input" id="publie" >
                  
                    <label class="form-check-label" for="exampleCheck1">Publie</label>
                 </div>
                

                   <button type="submit" class="btn btn-primary" name="submit" >Ajouter Mon Article</button>
              
            </form>



            
            <?php/*
            /////montrer l'article ajouter grace au formulaire
            print_r2($_POST);
            print_r2($_FILES);*/
            ?>
    

            <br>

        </div>

        



        <!-- Footer-->
        <?php include 'includes/footer.inc.php';?>
    </body>
</html>

    <?php 
} 
?>