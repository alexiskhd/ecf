<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230213082232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955B5937BF9');
        $this->addSql('ALTER TABLE hours DROP FOREIGN KEY FK_8A1ABD8DED5CA9E6');
        $this->addSql('DROP TABLE hours');
        $this->addSql('DROP INDEX IDX_42C84955B5937BF9 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP hour_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hours (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, reservation_hours VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_8A1ABD8DED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE hours ADD CONSTRAINT FK_8A1ABD8DED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE reservation ADD hour_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B5937BF9 FOREIGN KEY (hour_id) REFERENCES hours (id)');
        $this->addSql('CREATE INDEX IDX_42C84955B5937BF9 ON reservation (hour_id)');
    }
}
