<?php

class articlesManager{
//DECLARATION ET INSTANCIATION
public $bdd; //Instance de PDO
public $_result;
public $_message;
public $_articles; //instance de l'articles
public $_getLastInsertId;

public function __construct(PDO $bdd){
    $this->setBdd($bdd);
}


function getBdd() {
    return $this->bdd;
}

function get_result(){
    return $this->_result;
}

function get_message(){
    return $this->_message;
}

function get_articles(){
    return $this->_articles;
}

function get_getLastInsertId(){
    return $this->_getLastInsertId;
}

////////////SET

function setBdd($bdd){
    $this->bdd = $bdd;    
}

function set_result($_result){
    $this->_result = $_result;    
}

function set_message($_message){
    $this->_message = $_message;    
}

function set_articles($_articles){
    $this->_articles = $_articles;    
}

function set_getLastInsertId($_getLastInsertId){
    $this->_getLastInsertId = $_getLastInsertId;    
}


public function get($id){
    //prepare une requete de type select avec une clause WHERE  
    $sql='SELECT * FROM articles WHERE id = :id';
    $req = $this->bdd->prepare($sql);

//////execution de la requete avec attribution des valeurs
$req->bindValue(':id', $id, PDO::PARAM_INT); ///param init va permettre de verifier si ce qu'ont rentre comme données correspond bien a un INT sinon le programme renvoie une erreur
$req->execute();

/////on stocke les données obtenues dans un tableau
$donnees = $req->fetch(PDO::FETCH_ASSOC);
$articles = new articles();
$articles->hydrate($donnees);
////print r2($articles);
return $articles;

}













}