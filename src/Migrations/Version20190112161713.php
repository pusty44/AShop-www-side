<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190112161713 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ashop_payment_methods CHANGE smskey smskey VARCHAR(24) DEFAULT NULL, CHANGE apikey apikey VARCHAR(64) DEFAULT NULL, CHANGE apisecret apisecret VARCHAR(64) DEFAULT NULL, CHANGE service_id service_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ashop_payment_methods CHANGE smskey smskey VARCHAR(24) NOT NULL COLLATE utf8_unicode_ci, CHANGE apikey apikey VARCHAR(64) NOT NULL COLLATE utf8_unicode_ci, CHANGE apisecret apisecret VARCHAR(64) NOT NULL COLLATE utf8_unicode_ci, CHANGE service_id service_id INT NOT NULL');
    }
}
