<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200703084125 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60E6DE44026');
        $this->addSql('DROP INDEX IDX_C257E60E6DE44026 ON flight');
        $this->addSql('ALTER TABLE flight CHANGE description description_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60ED9F966B FOREIGN KEY (description_id) REFERENCES flight (id)');
        $this->addSql('CREATE INDEX IDX_C257E60ED9F966B ON flight (description_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60ED9F966B');
        $this->addSql('DROP INDEX IDX_C257E60ED9F966B ON flight');
        $this->addSql('ALTER TABLE flight CHANGE description_id description INT DEFAULT NULL');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60E6DE44026 FOREIGN KEY (description) REFERENCES flight (id)');
        $this->addSql('CREATE INDEX IDX_C257E60E6DE44026 ON flight (description)');
    }
}
