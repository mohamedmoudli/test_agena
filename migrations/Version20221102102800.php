<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221102102800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dept (id INT AUTO_INCREMENT NOT NULL, dname VARCHAR(255) NOT NULL, dept_no INT NOT NULL, loc VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emp (id INT AUTO_INCREMENT NOT NULL, dept_id INT DEFAULT NULL, emp_no VARCHAR(255) NOT NULL, ename VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, mgr INT NOT NULL, hire_date DATE NOT NULL, comm INT NOT NULL, sal INT NOT NULL, INDEX IDX_310BB40F3E23E247 (dept_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emp ADD CONSTRAINT FK_310BB40F3E23E247 FOREIGN KEY (dept_id) REFERENCES dept (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emp DROP FOREIGN KEY FK_310BB40F3E23E247');
        $this->addSql('DROP TABLE dept');
        $this->addSql('DROP TABLE emp');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
