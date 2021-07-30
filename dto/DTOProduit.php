<?php
require_once('../classes/CartePostale.php');
require_once('../classes/Stylo.php');
require_once('../classes/Glace.php');
require_once('../classes/Pain.php');

class DTOProduit
{
	public static function selectAll()
	{
		try {
			$connexion = self::getBdd();

			$req = 'SELECT * FROM produit;';
			$reqCp = 'SELECT produit.id AS id_produit, auteur.id AS id_auteur, auteur.nom_auteur, auteur.prenom_auteur 
					FROM produit 
					JOIN auteurs_produits ON produit.id = auteurs_produits.id_produit
					JOIN auteur ON auteurs_produits.id_auteur = auteur.id;';
			
			$res = $connexion->query($req);
			$resCp = $connexion->query($reqCp);

			$listeAuteurs = [];
			while ($dataCp = $resCp->fetchObject())
			{
				$listeAuteurs[$dataCp->id_produit] []= new Auteur($dataCp->id_auteur, $dataCp->nom_auteur, $dataCp->prenom_auteur);
			}

			$produits = [];
			while ($data = $res->fetchObject()) {
				switch ($data->categorie) {
					 case 'Carte Postale':
						$produits []= new CartePostale( 
							$data->id,
							$data->nom_produit,
							$data->libelle,
							$data->description_produit,
							$data->marque,
							$data->prix_unitaire,
							$data->qte_stock,
							$data->ref_prod,
							$data->image_produit,
							$data->type_produit,
							$listeAuteurs[$data->id]
						);
						
						break;
					case 'Stylo':
						$produits []= new Stylo(
							$data->id,
							$data->nom_produit,
							$data->libelle,
							$data->description_produit,
							$data->marque,
							$data->prix_unitaire,
							$data->qte_stock,
							$data->ref_prod,
							$data->image_produit,
							$data->couleur,
							$data->type_produit
						);
						break;
					case 'Glace':
						$produits []= new Glace(
							$data->id,
							$data->nom_produit,
							$data->libelle,
							$data->description_produit,
							$data->marque,
							$data->prix_unitaire,
							$data->qte_stock,
							$data->ref_prod,
							$data->image_produit,
							new Datetime($data->dlc),
							$data->parfum,
							$data->temperature
						);
						break;
					case 'Pain':
						$produits []= new Pain(
							$data->id,
							$data->nom_produit,
							$data->libelle,
							$data->description_produit,
							$data->marque,
							$data->prix_unitaire,
							$data->qte_stock,
							$data->ref_prod,
							$data->image_produit,
							new Datetime($data->dlc),
							$data->poids
						);
						break;
				}
			}
		} catch (PDOException $e) {
			echo 'Erreur avec la BD!: '.$e->getMessage().'<br/>';
			die();
		}
		return $produits;
	}

	public static function selectById($id)
	{
		try {
			$connexion = self::getBdd();

			$req = 'SELECT * FROM produit WHERE id = ?;';
			$prep = $connexion->prepare($req);
			$prep->bindParam(1, $id, PDO::PARAM_INT);
			$prep->execute();

			$data = $prep->fetchObject();
			$listeAuteurs = ['Auteur1', 'Auteur2'];

			switch ($data->categorie) {
				case 'Carte Postale':
					$produit = new CartePostale( 
						$data->id,
						$data->nom_produit,
						$data->libelle,
						$data->description_produit,
						$data->marque,
						$data->prix_unitaire,
						$data->qte_stock,
						$data->ref_prod,
						$data->image_produit,
						$data->type_produit,
						$listeAuteurs
					);
					break;
				case 'Stylo':
					$produit = new Stylo(
						$data->id,
						$data->nom_produit,
						$data->libelle,
						$data->description_produit,
						$data->marque,
						$data->prix_unitaire,
						$data->qte_stock,
						$data->ref_prod,
						$data->image_produit,
						$data->couleur,
						$data->type_produit
					);
					break;
				case 'Glace':
					$produit = new Glace(
						$data->id,
						$data->nom_produit,
						$data->libelle,
						$data->description_produit,
						$data->marque,
						$data->prix_unitaire,
						$data->qte_stock,
						$data->ref_prod,
						$data->image_produit,
						new Datetime($data->dlc),
						$data->parfum,
						$data->temperature
					);
					break;
				case 'Pain':
					$produit = new Pain(
						$data->id,
						$data->nom_produit,
						$data->libelle,
						$data->description_produit,
						$data->marque,
						$data->prix_unitaire,
						$data->qte_stock,
						$data->ref_prod,
						$data->image_produit,
						new Datetime($data->dlc),
						$data->poids
					);
					break;
			}
			
		} catch (PDOException $e) {
			echo 'Erreur avec la BD!: '.$e->getMessage().'<br/>';
			die();
		}
		return $produit;
	}

	private static function getBdd()
	{
		require('../lib/localData.php');

		return new PDO($dns, $utilisateur, $mdp);
	}
}
