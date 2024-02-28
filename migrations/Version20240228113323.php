<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228113323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE budget (id INT AUTO_INCREMENT NOT NULL, price INT DEFAULT NULL, currency VARCHAR(15) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store_category (store_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_383B663BB092A811 (store_id), INDEX IDX_383B663B12469DE2 (category_id), PRIMARY KEY(store_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE store_category ADD CONSTRAINT FK_383B663BB092A811 FOREIGN KEY (store_id) REFERENCES store (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE store_category ADD CONSTRAINT FK_383B663B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event ADD type_id INT DEFAULT NULL, ADD partner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA79393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3BAE0AA7C54C8C93 ON event (type_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA79393F8FE ON event (partner_id)');
        $this->addSql('ALTER TABLE store ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE store ADD CONSTRAINT FK_FF57587764D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FF57587764D218E ON store (location_id)');
        $this->addSql('ALTER TABLE user_pro ADD event_id INT DEFAULT NULL, ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_pro ADD CONSTRAINT FK_80A2B77471F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE user_pro ADD CONSTRAINT FK_80A2B77464D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_80A2B77471F7E88B ON user_pro (event_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_80A2B77464D218E ON user_pro (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE store_category DROP FOREIGN KEY FK_383B663BB092A811');
        $this->addSql('ALTER TABLE store_category DROP FOREIGN KEY FK_383B663B12469DE2');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE store_category');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7C54C8C93');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA79393F8FE');
        $this->addSql('DROP INDEX UNIQ_3BAE0AA7C54C8C93 ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA79393F8FE ON event');
        $this->addSql('ALTER TABLE event DROP type_id, DROP partner_id');
        $this->addSql('ALTER TABLE store DROP FOREIGN KEY FK_FF57587764D218E');
        $this->addSql('DROP INDEX UNIQ_FF57587764D218E ON store');
        $this->addSql('ALTER TABLE store DROP location_id');
        $this->addSql('ALTER TABLE user_pro DROP FOREIGN KEY FK_80A2B77471F7E88B');
        $this->addSql('ALTER TABLE user_pro DROP FOREIGN KEY FK_80A2B77464D218E');
        $this->addSql('DROP INDEX IDX_80A2B77471F7E88B ON user_pro');
        $this->addSql('DROP INDEX UNIQ_80A2B77464D218E ON user_pro');
        $this->addSql('ALTER TABLE user_pro DROP event_id, DROP location_id');
    }
}
