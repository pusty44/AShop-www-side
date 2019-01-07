<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190107191256 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ashop_admin_login_logs (id INT AUTO_INCREMENT NOT NULL, admin_ip VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, success TINYINT(1) DEFAULT \'0\' NOT NULL, adminName VARCHAR(255) DEFAULT NULL, INDEX IDX_634A4D82C57D9BB7 (adminName), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_admin_logs (id INT AUTO_INCREMENT NOT NULL, admin_ip VARCHAR(255) DEFAULT NULL, content VARCHAR(256) NOT NULL, date DATETIME NOT NULL, adminName VARCHAR(255) DEFAULT NULL, INDEX IDX_6A4FD3EC57D9BB7 (adminName), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_bought_services_logs (id INT AUTO_INCREMENT NOT NULL, server INT DEFAULT NULL, service INT DEFAULT NULL, value INT NOT NULL, auth_data VARCHAR(255) DEFAULT NULL, user_ip VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, paymentMethod INT DEFAULT NULL, adminName VARCHAR(255) DEFAULT NULL, INDEX IDX_790A08828484E578 (paymentMethod), INDEX IDX_790A0882C57D9BB7 (adminName), INDEX IDX_790A08825A6DD5F6 (server), INDEX IDX_790A0882E19D9AD2 (service), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_noffications (id INT AUTO_INCREMENT NOT NULL, type INT NOT NULL, title VARCHAR(48) NOT NULL, content VARCHAR(256) NOT NULL, viited TINYINT(1) DEFAULT \'0\' NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_prices (id INT AUTO_INCREMENT NOT NULL, service INT DEFAULT NULL, server INT DEFAULT NULL, tariff INT DEFAULT NULL, value INT NOT NULL, INDEX IDX_C2CC1C3FE19D9AD2 (service), INDEX IDX_C2CC1C3F5A6DD5F6 (server), INDEX IDX_C2CC1C3F9465207D (tariff), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_servers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, ip_address VARCHAR(255) DEFAULT NULL, port INT NOT NULL, type INT NOT NULL, rcon_password VARCHAR(64) NOT NULL, connected TINYINT(1) DEFAULT \'0\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_services (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, web_description VARCHAR(255) NOT NULL, server_description VARCHAR(255) NOT NULL, image_url VARCHAR(256) NOT NULL, sufix VARCHAR(16) NOT NULL, type INT NOT NULL, flags VARCHAR(32) NOT NULL, order_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_settings (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, value VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_tariffs (id INT AUTO_INCREMENT NOT NULL, sms_number INT NOT NULL, brutto DOUBLE PRECISION NOT NULL, netto DOUBLE PRECISION NOT NULL, paymentMethod INT DEFAULT NULL, INDEX IDX_91D964B68484E578 (paymentMethod), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_temporary_payments (chcksum VARCHAR(255) NOT NULL, server INT DEFAULT NULL, service INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, auth_data VARCHAR(255) DEFAULT NULL, status TINYINT(1) DEFAULT \'0\' NOT NULL, date DATETIME NOT NULL, INDEX IDX_4D2CDB935A6DD5F6 (server), INDEX IDX_4D2CDB93E19D9AD2 (service), PRIMARY KEY(chcksum)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_url_shortener (id INT AUTO_INCREMENT NOT NULL, oryginal_url VARCHAR(256) NOT NULL, new_url VARCHAR(128) NOT NULL, expires DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_user_services (id INT AUTO_INCREMENT NOT NULL, server_id INT NOT NULL, service_id INT NOT NULL, value INT NOT NULL, auth_data VARCHAR(255) DEFAULT NULL, bought_date DATETIME NOT NULL, expires DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ashop_vouchers (id INT AUTO_INCREMENT NOT NULL, price INT DEFAULT NULL, code VARCHAR(6) NOT NULL, INDEX IDX_87B0ACC4CAC822D9 (price), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ashop_admin_login_logs ADD CONSTRAINT FK_634A4D82C57D9BB7 FOREIGN KEY (adminName) REFERENCES ashop_users (username)');
        $this->addSql('ALTER TABLE ashop_admin_logs ADD CONSTRAINT FK_6A4FD3EC57D9BB7 FOREIGN KEY (adminName) REFERENCES ashop_users (username)');
        $this->addSql('ALTER TABLE ashop_bought_services_logs ADD CONSTRAINT FK_790A08828484E578 FOREIGN KEY (paymentMethod) REFERENCES ashop_payment_methods (id)');
        $this->addSql('ALTER TABLE ashop_bought_services_logs ADD CONSTRAINT FK_790A0882C57D9BB7 FOREIGN KEY (adminName) REFERENCES ashop_users (username)');
        $this->addSql('ALTER TABLE ashop_bought_services_logs ADD CONSTRAINT FK_790A08825A6DD5F6 FOREIGN KEY (server) REFERENCES ashop_servers (id)');
        $this->addSql('ALTER TABLE ashop_bought_services_logs ADD CONSTRAINT FK_790A0882E19D9AD2 FOREIGN KEY (service) REFERENCES ashop_services (id)');
        $this->addSql('ALTER TABLE ashop_prices ADD CONSTRAINT FK_C2CC1C3FE19D9AD2 FOREIGN KEY (service) REFERENCES ashop_services (id)');
        $this->addSql('ALTER TABLE ashop_prices ADD CONSTRAINT FK_C2CC1C3F5A6DD5F6 FOREIGN KEY (server) REFERENCES ashop_servers (id)');
        $this->addSql('ALTER TABLE ashop_prices ADD CONSTRAINT FK_C2CC1C3F9465207D FOREIGN KEY (tariff) REFERENCES ashop_tariffs (id)');
        $this->addSql('ALTER TABLE ashop_tariffs ADD CONSTRAINT FK_91D964B68484E578 FOREIGN KEY (paymentMethod) REFERENCES ashop_payment_methods (id)');
        $this->addSql('ALTER TABLE ashop_temporary_payments ADD CONSTRAINT FK_4D2CDB935A6DD5F6 FOREIGN KEY (server) REFERENCES ashop_servers (id)');
        $this->addSql('ALTER TABLE ashop_temporary_payments ADD CONSTRAINT FK_4D2CDB93E19D9AD2 FOREIGN KEY (service) REFERENCES ashop_services (id)');
        $this->addSql('ALTER TABLE ashop_vouchers ADD CONSTRAINT FK_87B0ACC4CAC822D9 FOREIGN KEY (price) REFERENCES ashop_prices (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ashop_vouchers DROP FOREIGN KEY FK_87B0ACC4CAC822D9');
        $this->addSql('ALTER TABLE ashop_bought_services_logs DROP FOREIGN KEY FK_790A08825A6DD5F6');
        $this->addSql('ALTER TABLE ashop_prices DROP FOREIGN KEY FK_C2CC1C3F5A6DD5F6');
        $this->addSql('ALTER TABLE ashop_temporary_payments DROP FOREIGN KEY FK_4D2CDB935A6DD5F6');
        $this->addSql('ALTER TABLE ashop_bought_services_logs DROP FOREIGN KEY FK_790A0882E19D9AD2');
        $this->addSql('ALTER TABLE ashop_prices DROP FOREIGN KEY FK_C2CC1C3FE19D9AD2');
        $this->addSql('ALTER TABLE ashop_temporary_payments DROP FOREIGN KEY FK_4D2CDB93E19D9AD2');
        $this->addSql('ALTER TABLE ashop_prices DROP FOREIGN KEY FK_C2CC1C3F9465207D');
        $this->addSql('DROP TABLE ashop_admin_login_logs');
        $this->addSql('DROP TABLE ashop_admin_logs');
        $this->addSql('DROP TABLE ashop_bought_services_logs');
        $this->addSql('DROP TABLE ashop_noffications');
        $this->addSql('DROP TABLE ashop_prices');
        $this->addSql('DROP TABLE ashop_servers');
        $this->addSql('DROP TABLE ashop_services');
        $this->addSql('DROP TABLE ashop_settings');
        $this->addSql('DROP TABLE ashop_tariffs');
        $this->addSql('DROP TABLE ashop_temporary_payments');
        $this->addSql('DROP TABLE ashop_url_shortener');
        $this->addSql('DROP TABLE ashop_user_services');
        $this->addSql('DROP TABLE ashop_vouchers');
    }
}
