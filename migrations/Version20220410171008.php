<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220410171008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorieproduit (id INT AUTO_INCREMENT NOT NULL, nom_cp VARCHAR(255) NOT NULL, desc_cp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY fk_foreign_key_id');
        $this->addSql('ALTER TABLE commande CHANGE idP idP INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DD2BDD6EA FOREIGN KEY (idP) REFERENCES produit (idP)');
        $this->addSql('ALTER TABLE miseajour CHANGE idjeux idjeux INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorieproduit');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DD2BDD6EA');
        $this->addSql('ALTER TABLE commande CHANGE idP idP INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT fk_foreign_key_id FOREIGN KEY (idP) REFERENCES produit (idP) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE miseajour CHANGE idjeux idjeux INT NOT NULL');
    }
}
