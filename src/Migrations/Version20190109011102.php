<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109011102 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ashop_prices DROP FOREIGN KEY FK_C2CC1C3F5A6DD5F6');
        $this->addSql('DROP INDEX IDX_C2CC1C3F5A6DD5F6 ON ashop_prices');
        $this->addSql('ALTER TABLE ashop_prices CHANGE server server VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ashop_prices CHANGE server server INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ashop_prices ADD CONSTRAINT FK_C2CC1C3F5A6DD5F6 FOREIGN KEY (server) REFERENCES ashop_servers (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C2CC1C3F5A6DD5F6 ON ashop_prices (server)');
    }
}
