<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412025004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE miseajour ADD idjeux INT DEFAULT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nomjeux nomjeu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE miseajour ADD CONSTRAINT FK_5E39C5B6E49A44AD FOREIGN KEY (idjeux) REFERENCES jeux (idjeux)');
        $this->addSql('CREATE INDEX IDX_5E39C5B6E49A44AD ON miseajour (idjeux)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE miseajour DROP FOREIGN KEY FK_5E39C5B6E49A44AD');
        $this->addSql('DROP INDEX IDX_5E39C5B6E49A44AD ON miseajour');
        $this->addSql('ALTER TABLE miseajour DROP idjeux, CHANGE id id INT NOT NULL, CHANGE nomjeu nomjeux VARCHAR(255) NOT NULL');
    }
}
