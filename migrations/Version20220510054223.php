<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510054223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C479218644 FOREIGN KEY (titre_article) REFERENCES article (id_article) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX teeee ON commentaires (titre_article)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C479218644');
        $this->addSql('DROP INDEX teeee ON commentaires');
    }
}
