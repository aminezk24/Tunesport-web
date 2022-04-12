<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220411231755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorieproduit (id INT AUTO_INCREMENT NOT NULL, nom_cp VARCHAR(255) NOT NULL, desc_cp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit ADD id INT DEFAULT NULL, ADD categorieproduit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BF396750 FOREIGN KEY (id) REFERENCES categorieproduit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27EFF7D0E1 FOREIGN KEY (categorieproduit_id) REFERENCES categorieproduit (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BF396750 ON produit (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27EFF7D0E1 ON produit (categorieproduit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BF396750');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27EFF7D0E1');
        $this->addSql('DROP TABLE categorieproduit');
        $this->addSql('DROP INDEX IDX_29A5EC27BF396750 ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC27EFF7D0E1 ON produit');
        $this->addSql('ALTER TABLE produit DROP id, DROP categorieproduit_id');
    }
}
