<?php  
require_once 'config/init.conf.php' ;
print_r2($_SESSION);
?>



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




<?php/*PREMIER TEST 

////////////////MONTRER l'index du tableau et celui de la page et fait en sorte a ce qu'il correspondent a un model de 2 article par page

////recup les données de l'url avec un $get qu'ont met dans une variable $page exemple salut.com/lpcours/?p=1 le programme va afficher lalala1
$page = $_GET['p']; ///ceci est la page sur laquelle vous etes

//////////constante
define('__nb_articles_par_page', 2);///ont defini une constante
echo 'bienvenue sur la page '.$page; ///ont echo pour savoir sur qu'elle page ont est (?p=1 dans l'url)

$resultat = ($page -1) * __nb_articles_par_page; ///calcul pour mettre le bon index du tableau a la bonne page (2 par 2)
echo 'nous sommes sur lindex du tableau numero : '.$resultat; //l'index du tableau ou nous sommes (regarde le tableau qu'il y a dans le fichier explication)

*/?>


<?php
define('__nb_articles_par_page', 2);
$page = !empty($_GET['p']) ? $_GET ['p'] : 1; /////////si la page n'a pas de parametre alors la page vaut 1///////////


$nbArticlesTotalLAPublie = $articlesManager->countArticlesPublie();
$nbpage = ceil($nbArticlesTotalLAPublie / __nb_articles_par_page);



$indexDepart = ($page -1) * __nb_articles_par_page;

$ListArticles = $articlesManager->getList3($indexDepart, __nb_articles_par_page);

?>


<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/header.inc.php';?>



    

    <body>
        <!-- Responsive navbar-->
        <?php include 'includes/menu.inc.php';?>


        <!-- Page Content-->
        <div class="container px-4 px-lg-5">

            <?php
            if (isset($_SESSION['notification'])){
            ?>

            <div class="alert alert-<?= $_SESSION['notification']['result'] ?> alert-dismissible mt-3 " role="alert">
                <?= $_SESSION['notification']['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                
            <?php
            unset($_SESSION['notification']);
            }
            ?>



            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                
                <div class="col-12">
                    <h1 class="font-weight-light"><?php echo "Bienvenue sur le site d'article" ?></h1>
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





            <?php//////////////////////////////////PAGINATION AUTO INCREMENT?>
            <div class="row mt-3">
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                        
                        <?php for ($index=1; $index <= $nbpage; $index++) { ?>
                            <li class="page-item <?php if ($page == $index) { ?>active<?php } ?>">
                            <a class="page-link" href="index.php?p=<?= $index ?>"><?= $index ?></a>
                            </li>
                            <?php
                        }?>
                        

                        </ul>
                    </nav>
                </div>

     
            </div>





        </div>

        



        <!-- Footer-->
        <?php include 'includes/footer.inc.php';?>
    </body>
</html>
            