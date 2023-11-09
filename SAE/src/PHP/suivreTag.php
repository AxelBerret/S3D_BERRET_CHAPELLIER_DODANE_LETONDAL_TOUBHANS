<?php

declare(strict_types=1);

class suivreTag{

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function suivreTag(string $tagSuivis): bool {

        // Insérer un nouvel abonnement au tag dans la base de données
        $query = "INSERT INTO AbonnementTag (id_suivreT, tagSuivis, utilisateurSuiveurT) VALUES (UUID(), :tagSuivis, :utilisateurSuiveurT)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':tagSuivis', $tagSuivis, PDO::PARAM_STR);
        $stmt->bindParam(':utilisateurSuiveurT', $_SESSION['user_id'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Le suivi est réussi
            return true;
        } else {
            // Erreur lors du suivi
            return false;
        }
    }

}