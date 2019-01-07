<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190107100009 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ashop_groups_permissions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(48) NOT NULL, value VARCHAR(128) NOT NULL, groupId INT DEFAULT NULL, INDEX IDX_5D26622DED8188B0 (groupId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_groups (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(48) NOT NULL, style VARCHAR(256) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_payment_methods (id INT AUTO_INCREMENT NOT NULL, type INT NOT NULL, name VARCHAR(64) NOT NULL, smskey VARCHAR(24) NOT NULL, apikey VARCHAR(64) NOT NULL, apisecret VARCHAR(64) NOT NULL, service_id INT NOT NULL, method_name VARCHAR(32) NOT NULL, UNIQUE INDEX UNIQ_147A48065E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_users (username VARCHAR(255) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', auth_data VARCHAR(64) NOT NULL, wallet DOUBLE PRECISION NOT NULL, join_date DATETIME NOT NULL, groupId INT DEFAULT NULL, UNIQUE INDEX UNIQ_CAC26FD9E7927C74 (email), INDEX IDX_CAC26FD9ED8188B0 (groupId), PRIMARY KEY(username)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ashop_groups_permissions ADD CONSTRAINT FK_5D26622DED8188B0 FOREIGN KEY (groupId) REFERENCES ashop_groups (id)');
        $this->addSql('ALTER TABLE ashop_users ADD CONSTRAINT FK_CAC26FD9ED8188B0 FOREIGN KEY (groupId) REFERENCES ashop_groups (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ashop_groups_permissions DROP FOREIGN KEY FK_5D26622DED8188B0');
        $this->addSql('ALTER TABLE ashop_users DROP FOREIGN KEY FK_CAC26FD9ED8188B0');
        $this->addSql('DROP TABLE ashop_groups_permissions');
        $this->addSql('DROP TABLE ashop_groups');
        $this->addSql('DROP TABLE ashop_payment_methods');
        $this->addSql('DROP TABLE ashop_users');
    }
}
