<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221102104142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE managers (id INT AUTO_INCREMENT NOT NULL, ename VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emp ADD mgr_id INT DEFAULT NULL, DROP mgr');
        $this->addSql('ALTER TABLE emp ADD CONSTRAINT FK_310BB40F768C624F FOREIGN KEY (mgr_id) REFERENCES managers (id)');
        $this->addSql('CREATE INDEX IDX_310BB40F768C624F ON emp (mgr_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emp DROP FOREIGN KEY FK_310BB40F768C624F');
        $this->addSql('DROP TABLE managers');
        $this->addSql('DROP INDEX IDX_310BB40F768C624F ON emp');
        $this->addSql('ALTER TABLE emp ADD mgr INT NOT NULL, DROP mgr_id');
    }
}
