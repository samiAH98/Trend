<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228110219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, food VARCHAR(50) NOT NULL, diy VARCHAR(50) NOT NULL, hobby VARCHAR(50) NOT NULL, clothing VARCHAR(50) NOT NULL, multimedia VARCHAR(50) NOT NULL, INDEX IDX_64C19C1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery (id INT AUTO_INCREMENT NOT NULL, company VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, place VARCHAR(50) NOT NULL, budget INT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(50) NOT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notice (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, comment LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_480D45C2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, town_hall VARCHAR(50) NOT NULL, association VARCHAR(50) NOT NULL, company VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, city VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, theater VARCHAR(50) NOT NULL, hobbies VARCHAR(50) NOT NULL, concert VARCHAR(50) NOT NULL, art VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_pro (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, company_name VARCHAR(100) NOT NULL, siret_number INT NOT NULL, business_activity VARCHAR(100) NOT NULL, phone_number INT NOT NULL, city VARCHAR(50) NOT NULL, photo VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_80A2B774E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notice ADD CONSTRAINT FK_480D45C2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE pro');
        $this->addSql('ALTER TABLE user ADD transport_id INT DEFAULT NULL, ADD event_id INT DEFAULT NULL, ADD store_id INT DEFAULT NULL, ADD location_id INT DEFAULT NULL, ADD photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499909C13F FOREIGN KEY (transport_id) REFERENCES transport (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64971F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B092A811 FOREIGN KEY (store_id) REFERENCES store (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64964D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499909C13F ON user (transport_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64971F7E88B ON user (event_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649B092A811 ON user (store_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64964D218E ON user (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64971F7E88B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64964D218E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B092A811');
        $this->addSql('CREATE TABLE pro (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, siret_number INT NOT NULL, business_activity VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone_number INT NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, city VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1A76ED395');
        $this->addSql('ALTER TABLE notice DROP FOREIGN KEY FK_480D45C2A76ED395');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE delivery');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE notice');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE store');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user_pro');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499909C13F');
        $this->addSql('DROP INDEX IDX_8D93D6499909C13F ON user');
        $this->addSql('DROP INDEX IDX_8D93D64971F7E88B ON user');
        $this->addSql('DROP INDEX IDX_8D93D649B092A811 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D64964D218E ON user');
        $this->addSql('ALTER TABLE user DROP transport_id, DROP event_id, DROP store_id, DROP location_id, DROP photo');
    }
}
