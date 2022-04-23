<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420143358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY fk_foreign_key_idCP');
        $this->addSql('ALTER TABLE produit CHANGE categorieproduit_id categorieproduit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27EFF7D0E1 FOREIGN KEY (categorieproduit_id) REFERENCES produit (idP)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27EFF7D0E1');
        $this->addSql('ALTER TABLE produit CHANGE categorieproduit_id categorieproduit_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT fk_foreign_key_idCP FOREIGN KEY (categorieproduit_id) REFERENCES produit (idP) ON DELETE CASCADE');
    }
}
