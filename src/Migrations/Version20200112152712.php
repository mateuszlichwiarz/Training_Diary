<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200112152712 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE all_settings (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, sub_settings LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE general_settings (id INT AUTO_INCREMENT NOT NULL, weight_unit VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE homepage_settings (id INT AUTO_INCREMENT NOT NULL, days_earlier INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE progres (id INT AUTO_INCREMENT NOT NULL, user VARCHAR(64) NOT NULL, day VARCHAR(32) NOT NULL, exercise VARCHAR(64) NOT NULL, weight INT DEFAULT NULL, sets INT DEFAULT NULL, reps INT DEFAULT NULL, date DATE NOT NULL, time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE program_trening ADD date DATE NOT NULL, ADD time TIME NOT NULL');
        $this->addSql('ALTER TABLE user ADD homepagesettings_id INT NOT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6496D3EDCEA FOREIGN KEY (homepagesettings_id) REFERENCES homepage_settings (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6496D3EDCEA ON user (homepagesettings_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6496D3EDCEA');
        $this->addSql('DROP TABLE all_settings');
        $this->addSql('DROP TABLE general_settings');
        $this->addSql('DROP TABLE homepage_settings');
        $this->addSql('DROP TABLE progres');
        $this->addSql('ALTER TABLE program_trening DROP date, DROP time');
        $this->addSql('DROP INDEX IDX_8D93D6496D3EDCEA ON user');
        $this->addSql('ALTER TABLE user DROP homepagesettings_id, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
