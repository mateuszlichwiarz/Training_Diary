<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200115013257 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, homepagesettings_id INT NOT NULL, generalsettings_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6496D3EDCEA (homepagesettings_id), INDEX IDX_8D93D64949E04A61 (generalsettings_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6496D3EDCEA FOREIGN KEY (homepagesettings_id) REFERENCES homepage_settings (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64949E04A61 FOREIGN KEY (generalsettings_id) REFERENCES general_settings (id)');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, homepagesettings_id INT NOT NULL, generalsettings_id INT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_1483A5E96D3EDCEA (homepagesettings_id), INDEX IDX_1483A5E949E04A61 (generalsettings_id), UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E949E04A61 FOREIGN KEY (generalsettings_id) REFERENCES general_settings (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E96D3EDCEA FOREIGN KEY (homepagesettings_id) REFERENCES homepage_settings (id)');
        $this->addSql('DROP TABLE user');
    }
}
