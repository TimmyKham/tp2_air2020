<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200703084611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60ED9F966B');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60ED9F966B FOREIGN KEY (description_id) REFERENCES aircraft (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60ED9F966B');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60ED9F966B FOREIGN KEY (description_id) REFERENCES flight (id)');
    }
}
