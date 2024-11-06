<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106152002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, realisateur_id INT NOT NULL, titre VARCHAR(255) NOT NULL, duree INT NOT NULL, annee_sortie INT NOT NULL, INDEX IDX_8244BE22F1D8422E (realisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joue (id INT AUTO_INCREMENT NOT NULL, film_id INT NOT NULL, acteur_id INT NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_59C45C02567F5183 (film_id), INDEX IDX_59C45C02DA6F574A (acteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prefere (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, film_id INT DEFAULT NULL, INDEX IDX_16BC7415FB88E14F (utilisateur_id), INDEX IDX_16BC7415567F5183 (film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realise (id INT AUTO_INCREMENT NOT NULL, film_id INT NOT NULL, realisateur_id INT NOT NULL, INDEX IDX_15CCD99E567F5183 (film_id), INDEX IDX_15CCD99EF1D8422E (realisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22F1D8422E FOREIGN KEY (realisateur_id) REFERENCES realisateur (id)');
        $this->addSql('ALTER TABLE joue ADD CONSTRAINT FK_59C45C02567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE joue ADD CONSTRAINT FK_59C45C02DA6F574A FOREIGN KEY (acteur_id) REFERENCES acteur (id)');
        $this->addSql('ALTER TABLE prefere ADD CONSTRAINT FK_16BC7415FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE prefere ADD CONSTRAINT FK_16BC7415567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE realise ADD CONSTRAINT FK_15CCD99E567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE realise ADD CONSTRAINT FK_15CCD99EF1D8422E FOREIGN KEY (realisateur_id) REFERENCES realisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22F1D8422E');
        $this->addSql('ALTER TABLE joue DROP FOREIGN KEY FK_59C45C02567F5183');
        $this->addSql('ALTER TABLE joue DROP FOREIGN KEY FK_59C45C02DA6F574A');
        $this->addSql('ALTER TABLE prefere DROP FOREIGN KEY FK_16BC7415FB88E14F');
        $this->addSql('ALTER TABLE prefere DROP FOREIGN KEY FK_16BC7415567F5183');
        $this->addSql('ALTER TABLE realise DROP FOREIGN KEY FK_15CCD99E567F5183');
        $this->addSql('ALTER TABLE realise DROP FOREIGN KEY FK_15CCD99EF1D8422E');
        $this->addSql('DROP TABLE acteur');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE joue');
        $this->addSql('DROP TABLE prefere');
        $this->addSql('DROP TABLE realisateur');
        $this->addSql('DROP TABLE realise');
        $this->addSql('DROP TABLE utilisateur');
    }
}
