<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220409200407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD id_cat INT NOT NULL, ADD name_cat VARCHAR(255) NOT NULL, ADD status VARCHAR(255) NOT NULL, DROP nameCat, DROP statusCat');
        $this->addSql('ALTER TABLE coaching CHANGE imageCoa imageCoa VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD nameCat VARCHAR(255) NOT NULL, ADD statusCat VARCHAR(255) NOT NULL, DROP id_cat, DROP name_cat, DROP status');
        $this->addSql('ALTER TABLE coaching CHANGE imageCoa imageCoa VARCHAR(255) NOT NULL');
    }
}
