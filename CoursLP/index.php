<?php  
require_once 'config/init.conf.php' ;?>



<?php
$articles = new articles();

$articles->setTitre('mon titre');

$tab =[
'id'=> 1,
'titre'=>'mon titre',
];
$articles->hydrate($tab);
print_r2($articles);
?>



<?php
////////////////MONTRER CE QU'IL Y A DANS ARTICLES MANAGER PAR RAPPORT A L'id
$articlesManager = new articlesManager($bdd);
$articles = $articlesManager->get(1);
print_r2($articles);
?>


<?php
////////////////MONTRER la liste d'article
$articlesManager = new articlesManager($bdd);
$ListArticles = $articlesManager->getList2();
print_r2($articles);
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
                    <h1 class="font-weight-light"><?php echo "pour rentrer dans le parking il faut utiliser l'app web" ?></h1>
                    <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
                    
                </div>
            </div>

            


            <!-- Content Row--> 
            <div class="row gx-4 gx-lg-5">
                
            <?php
            foreach ($ListArticles as $key => $articles){   //////a chaque fois que tu trouve un article tu garde l'id dans cles et tu le compare(avec as comme alias) a l'article 

            
        
            ?>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                    <img class="card-img-top" src="img/<?= $articles->getId() ?>.jpg">
                   
                        <div class="card-body">
                            <h2 class="card-title"><?= $articles->getTitre();?></h2>
                            <p class="card-text"><?= $articles->getTexte();?></p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!"><?=$articles->getDate();?></a></div>
                    </div>
                </div>
                
                        <?php
                        }
                        ?>
            </div>
        </div>

        
        <!-- Footer-->
        <?php include 'includes/footer.inc.php';?>
    </body>
</html>
