# EKO - API INGRAM MICRO
## Objectifs
- Récuperer à partir d'un ou plusieurs SKU des données sur les produits de INGRAM (Prix et Disponibilités) 

Pour cela, nous avons créé : 
- Une page HTML permettant de remplir sur un formulaire de 1 à 50 (max) SKU : 
- Un système via jQuery qui permet d'ajouter et de supprimer des champs de saisie
- Une page PHP permettant de créer la requete vers la l'API de INGRAM
- Nous avons ajouté des commentaires dans chaque partie du code afin de faciliter l'intégration dans votre système.

## Démo en ligne
Vous pouvez tester en ligne ici : https://mon-chatbot.com/EKO/index.html

## Fonctionnement
- Rendez-vous sur https://mon-chatbot.com/EKO/index.html
- Saisissez de 1 à 50 SKU
- Vous pouvez à tout moment Ajouter / retirer un champs de saisie
- Une fois les SKU saisis, Validez en Appuyant sur le bouton "Valider les SKU" 
- Vous obtenez alors les infos sur le ou les produits 
	- Tarif : En euro
    - Availability : La dispo de cet article
    - OnOrder : la quantité en commande chez le fabricant
    - ETADate : Au format Anglais YYYY-MM-DD