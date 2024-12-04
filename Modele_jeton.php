<?php

namespace App\Modele;
use App\Utilitaire\Singleton_ConnexionPDO;
use PDO;

class Modele_jeton
{

    /**
     * @param $connexionPDO : connexion à la base de données
     */
    public static function InsertJeton(int $idUtilisateur, int $codeAction)
    // Inserer le token dans la BDD
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();

        $dateFin = date('Y-m-d',strtotime("+1 hour"));
        $octetsAleatoires = openssl_random_pseudo_bytes (256) ;
        $token = sodium_bin2base64($octetsAleatoires, SODIUM_BASE64_VARIANT_ORIGINAL);

        $requetePreparee = $connexionPDO->prepare(
            'INSERT INTO token (valeur, codeAction,idUtilisateur,dateFin)
            VALUES (:valeur, :codeAction, :idUtilisateur ,:dateFin);');
        $requetePreparee->bindValue(':valeur', $token);
        $requetePreparee->bindValue(':codeAction', $codeAction);
        $requetePreparee->bindValue(':idUtilisateur', $idUtilisateur);
        $requetePreparee->bindValue(':dateFin', $dateFin);
        $reponse = $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
        return $reponse;
    }


    public function Update(): void
    {

    }

    public function Research(): void
    {

    }
}