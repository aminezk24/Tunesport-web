<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220411215407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coaching ADD idjeux INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coaching ADD CONSTRAINT FK_CABE08CEE49A44AD FOREIGN KEY (idjeux) REFERENCES jeux (idjeux)');
        $this->addSql('CREATE INDEX IDX_CABE08CEE49A44AD ON coaching (idjeux)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coaching DROP FOREIGN KEY FK_CABE08CEE49A44AD');
        $this->addSql('DROP INDEX IDX_CABE08CEE49A44AD ON coaching');
        $this->addSql('ALTER TABLE coaching DROP idjeux');
    }
}
