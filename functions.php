 <?php
function connect()
{
//1 cnx bdd
$servername="localhost";
$DBuser="root" ;
$DBpassword= "" ;
$DBname= "e_commerce";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  return $conn;
}
function getAllCategories()
{
    $conn = connect();
//2 creer req
$requette = "SELECT * FROM categories";

//3 execution req 
$resultat = $conn->query($requette);
//4 resultat de req
$categories = $resultat->fetchAll();

//var_dump($categories);
return $categories;
}

function getAllProducts()
{
$conn = connect();
//2 creer req
$requette = "SELECT * FROM produits";

//3 execution req 
$resultat = $conn->query($requette);
//4 resultat de req
$produits = $resultat->fetchAll();

//var_dump($categories);
return $produits;
}

function searchProduits($keywords)
{
    $conn = connect();
//2 creer req
$requette = "SELECT * FROM produits WHERE nom LIKE '%$keywords%' ";
//3 execution 
$resultat = $conn->query($requette);
//resultat
$produits = $resultat ->fetchAll();
return $produits;
}

function getProduitById($id){
    $conn = connect();
    //creer req
    $requette = "SELECT * FROM produits WHERE id=$id";
    //3 execution req 
$resultat = $conn->query($requette);
//4 resultat de req fetch pcq on retourne un seule produit
$produit = $resultat->fetch();
//var_dump($categories);
return $produit;
}
function AddVisiteur($data)
{
    $conn = connect();
    //crtptez
    //$mphash=md5($data['mp']);
    $requette = "INSERT INTO clients(nom,prenom,email,mp,telephone)VALUES ('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$data['mp']."','".$data['telephone']."')";
    $resultat = $conn->query($requette);
    if($resultat)
    {
        return true;
    }else{
        return false;
    }
}
function ConnectVisiteur($data)
{
    $conn = connect();
    $email = $data['email'];
    $mp = $data['mp'];
    $requette = "SELECT * FROM clients WHERE email='$email' AND mp='$mp'";
   $resultat = $conn->query($requette);
   $user = $resultat->fetch();
   //var_dump($user);
   return $user;
}
function ConnectAdmin($data){
    $conn = connect();
    $email = $data['email'];
    $mp = $data['mp'];
    $requette = "SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";
   $resultat = $conn->query($requette);
   $user = $resultat->fetch();
   //var_dump($user);
   return $user;
}
function getAllUsers()
{
    $conn = connect();
    $requette = "SELECT * FROM clients WHERE etat=0";
    $resultat = $conn->query($requette);
    $users = $resultat->fetchAll();
    //var_dump($user);
    return $users;
}
function getStocks()
{
    $conn = connect();
    $requette = "SELECT s.id,p.nom,s.quantite FROM produits p, stocks s WHERE p.id = s.produit";
    $resultat = $conn->query($requette);
    //fetchall pour prendre bq de ligne (tableau)
    $stocks = $resultat->fetchAll();
    //var_dump($user);
    return $stocks;
}
function getAllPaniers(){
    $conn = connect();
    $requette = "SELECT c.nom,c.prenom,c.telephone,p.total,p.etat,p.date_creation ,p.id FROM paniers p , clients c WHERE p.client = c.id";
    $resultat = $conn->query($requette);
    //fetchall pour prendre bq de ligne (tableau)
    $paniers = $resultat->fetchAll();
    //var_dump($user);
    return $paniers ;
}

function getAllCommandes(){

    $conn = connect();
    $requette = "SELECT p.nom,p.image,c.quantite,c.total,c.panier FROM commandes c , produits p WHERE c.produit = p.id";
    $resultat = $conn->query($requette);
    //fetchall pour prendre bq de ligne (tableau)
    $commandes = $resultat->fetchAll();
    //var_dump($user);
    return $commandes ;
}
function changerEtatPanier($data){
    $conn = connect();
$requette = "Update paniers SET etat='".$data['etat']."' WHERE id='".$data['panier_id']. "'";
$resultat = $conn->query($requette);

}
function getPaniersByEtat($paniers,$etat){
    $paniersEtat = array();
    foreach($paniers as $p)
    {
        if($p['etat'] == $etat){
            array_push($paniersEtat,$p);
            // $paniersEtat.push($p);
        }
        return $paniersEtat;
    }
}
function EditAdmin($data){
    $conn = connect();
    if ($data['mp'] != "")
    {
         $requette = "Update administrateur SET nom='".$data['nom']."' , email='".$data['email']."', mp='".$data['mp']."' WHERE id='".$data['id_admin']."'";
    }else{
        $requette = "Update administrateur SET nom='".$data['nom']."' , email='".$data['email']."' WHERE id='".$data['id_admin']."'";
    }
    $resultat = $conn->query($requette);  
return true;
 
}
function getData(){
    $data = array();
    $conn = connect();
    $requette = "SELECT COUNT(*) FROM produits";
   $resultat = $conn->query($requette);    
   $nbrPrds = $resultat->fetch();

    $requette1 = "SELECT COUNT(*) FROM categories";
    $resultat1 = $conn->query($requette1);
    $nbrCat = $resultat1->fetch();

    $requette2 = "SELECT COUNT(*) FROM clients";
    $resultat2 = $conn->query($requette2);
    $nbrClients = $resultat2->fetch();

    $data["produits"] = $nbrPrds[0];
    $data["categories"] = $nbrCat[0];
    $data["clients"] = $nbrClients[0];
return $data;
}

?>