<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220422235227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livreur (id INT AUTO_INCREMENT NOT NULL, nomliv VARCHAR(255) NOT NULL, prenomliv VARCHAR(255) NOT NULL, telliv INT NOT NULL, zone VARCHAR(255) NOT NULL, typevehi VARCHAR(255) NOT NULL, dispo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DD2BDD6EA FOREIGN KEY (idP) REFERENCES produit (idP)');
        $this->addSql('CREATE INDEX fk_idp ON commande (idP)');
        $this->addSql('ALTER TABLE livraison ADD livreur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FF8646701 FOREIGN KEY (livreur_id) REFERENCES livreur (id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1FF8646701 ON livraison (livreur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FF8646701');
        $this->addSql('DROP TABLE livreur');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DD2BDD6EA');
        $this->addSql('DROP INDEX fk_idp ON commande');
        $this->addSql('DROP INDEX IDX_A60C9F1FF8646701 ON livraison');
        $this->addSql('ALTER TABLE livraison DROP livreur_id');
    }
}
