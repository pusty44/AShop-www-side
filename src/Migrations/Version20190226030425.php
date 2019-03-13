<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190226030425 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ashop_temporary_payments DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE ashop_temporary_payments CHANGE chcksum payment_hash VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ashop_temporary_payments ADD PRIMARY KEY (payment_hash)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ashop_temporary_payments DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE ashop_temporary_payments CHANGE payment_hash chcksum VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE ashop_temporary_payments ADD PRIMARY KEY (chcksum)');
    }
}
