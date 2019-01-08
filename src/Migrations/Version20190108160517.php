<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190108160517 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ashop_user_services (id INT AUTO_INCREMENT NOT NULL, server INT DEFAULT NULL, service INT DEFAULT NULL, value INT NOT NULL, auth_data VARCHAR(255) DEFAULT NULL, bought_date DATETIME NOT NULL, expires DATETIME NOT NULL, INDEX IDX_8CDE8E205A6DD5F6 (server), INDEX IDX_8CDE8E20E19D9AD2 (service), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ashop_user_services ADD CONSTRAINT FK_8CDE8E205A6DD5F6 FOREIGN KEY (server) REFERENCES ashop_servers (id)');
        $this->addSql('ALTER TABLE ashop_user_services ADD CONSTRAINT FK_8CDE8E20E19D9AD2 FOREIGN KEY (service) REFERENCES ashop_services (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ashop_user_services');
    }
}
