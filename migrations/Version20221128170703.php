<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128170703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, texte VARCHAR(255) NOT NULL, date_publication DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adherent (id INT AUTO_INCREMENT NOT NULL, id_categorie_adherent_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, INDEX IDX_90D3F0602BB9DD5A (id_categorie_adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, id_pole_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, agi_mini INT NOT NULL, age_maxi INT NOT NULL, INDEX IDX_497DD6349F019AF5 (id_pole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_adherent (id INT AUTO_INCREMENT NOT NULL, id_catehorie_id INT NOT NULL, annee DATETIME NOT NULL, INDEX IDX_A854B10A461480F3 (id_catehorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrainement (id INT AUTO_INCREMENT NOT NULL, jour VARCHAR(255) NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, terrain VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrainement_staff_personnel (entrainement_id INT NOT NULL, staff_personnel_id INT NOT NULL, INDEX IDX_35C280F1A15E8FD (entrainement_id), INDEX IDX_35C280F19984921D (staff_personnel_id), PRIMARY KEY(entrainement_id, staff_personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrainement_terrain (entrainement_id INT NOT NULL, terrain_id INT NOT NULL, INDEX IDX_5D1E4B82A15E8FD (entrainement_id), INDEX IDX_5D1E4B828A2D8B41 (terrain_id), PRIMARY KEY(entrainement_id, terrain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrainement_categorie (entrainement_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_AE7ABE3AA15E8FD (entrainement_id), INDEX IDX_AE7ABE3ABCF5E72D (categorie_id), PRIMARY KEY(entrainement_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pole (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff_personnel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terrain (id INT AUTO_INCREMENT NOT NULL, libelle_terrain VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F0602BB9DD5A FOREIGN KEY (id_categorie_adherent_id) REFERENCES categorie_adherent (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6349F019AF5 FOREIGN KEY (id_pole_id) REFERENCES pole (id)');
        $this->addSql('ALTER TABLE categorie_adherent ADD CONSTRAINT FK_A854B10A461480F3 FOREIGN KEY (id_catehorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE entrainement_staff_personnel ADD CONSTRAINT FK_35C280F1A15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_staff_personnel ADD CONSTRAINT FK_35C280F19984921D FOREIGN KEY (staff_personnel_id) REFERENCES staff_personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_terrain ADD CONSTRAINT FK_5D1E4B82A15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_terrain ADD CONSTRAINT FK_5D1E4B828A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_categorie ADD CONSTRAINT FK_AE7ABE3AA15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_categorie ADD CONSTRAINT FK_AE7ABE3ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F0602BB9DD5A');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6349F019AF5');
        $this->addSql('ALTER TABLE categorie_adherent DROP FOREIGN KEY FK_A854B10A461480F3');
        $this->addSql('ALTER TABLE entrainement_staff_personnel DROP FOREIGN KEY FK_35C280F1A15E8FD');
        $this->addSql('ALTER TABLE entrainement_staff_personnel DROP FOREIGN KEY FK_35C280F19984921D');
        $this->addSql('ALTER TABLE entrainement_terrain DROP FOREIGN KEY FK_5D1E4B82A15E8FD');
        $this->addSql('ALTER TABLE entrainement_terrain DROP FOREIGN KEY FK_5D1E4B828A2D8B41');
        $this->addSql('ALTER TABLE entrainement_categorie DROP FOREIGN KEY FK_AE7ABE3AA15E8FD');
        $this->addSql('ALTER TABLE entrainement_categorie DROP FOREIGN KEY FK_AE7ABE3ABCF5E72D');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_adherent');
        $this->addSql('DROP TABLE entrainement');
        $this->addSql('DROP TABLE entrainement_staff_personnel');
        $this->addSql('DROP TABLE entrainement_terrain');
        $this->addSql('DROP TABLE entrainement_categorie');
        $this->addSql('DROP TABLE pole');
        $this->addSql('DROP TABLE staff_personnel');
        $this->addSql('DROP TABLE terrain');
    }
}
