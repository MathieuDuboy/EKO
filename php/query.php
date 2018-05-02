<?php
// Récupération du tableau des SKU
$tab_sku = $_REQUEST['mes_sku'];

// Création de la variable à transmettre à l'API
$login = "FRJGP002";
$mot_de_passe = "y7ugSQwvaa";
$datas = "<PNARequest>\n  <Version>2.0</Version>\n  <TransactionHeader>\n    <SenderID>123456789</SenderID>\n    <ReceiverID>987654321</ReceiverID>\n    <CountryCode>FR</CountryCode>\n    <LoginID>$login</LoginID>\n    <Password>$mot_de_passe</Password>\n    <TransactionID>Transaction_ID</TransactionID>\n  </TransactionHeader>\n  ";
// Pour chaque SKU, je rajoute un petit élement dans ma variable
foreach($tab_sku as $value){
    $datas .= "<PNAInformation SKU=\"$value\" Quantity=\"1\"/>\n  ";
}
// Fin de la variable à transmettre à l'API
$datas .="  <ShowDetail>2</ShowDetail>\n</PNARequest>";


// Initialisation du cURL et des entêtes
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://newport.ingrammicro.com/im-xml",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $datas,
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"  ),
));

// La réponse et son traitement
$response = curl_exec($curl);
$xml=simplexml_load_string($response) or die("Erreur : Impossible de créer l'objet");
$le_Sku = new SimpleXMLElement($response);
foreach ($le_Sku->PriceAndAvailability as $produit) {
   // ON peut récupérer le SKU de ce produit :
   echo 'Le prix de l\'objet SKU n°'.$produit['SKU'].' : ';
   echo $produit->Price.'€ <br />';
   // Dans l'élément "Branch" vous pouvez retrouver pleins d'infos dont :
   // La dispo : "Availability"
   echo 'Availability : ';
   echo $produit->Branch->Availability.'<br />';
   // la quantité en commande chez le fabricant "OnOrder"
   echo 'OnOrder : ';
   echo $produit->Branch->OnOrder.'<br />';
   // la date estimée d’arrivée des premiers produits commandés chez le fabricant "ETADate" au format YYYY-MM-DD
   echo 'ETADate : ';
   echo $produit->Branch->ETADate.'<br /><br />';
}
?>
