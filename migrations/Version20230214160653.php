<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214160653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE days (id INT AUTO_INCREMENT NOT NULL, jour DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE days_horaires (days_id INT NOT NULL, horaires_id INT NOT NULL, INDEX IDX_1BA6C4813575FA99 (days_id), INDEX IDX_1BA6C4818AF49C8B (horaires_id), PRIMARY KEY(days_id, horaires_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaires (id INT AUTO_INCREMENT NOT NULL, start TIME NOT NULL, end TIME NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE days_horaires ADD CONSTRAINT FK_1BA6C4813575FA99 FOREIGN KEY (days_id) REFERENCES days (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE days_horaires ADD CONSTRAINT FK_1BA6C4818AF49C8B FOREIGN KEY (horaires_id) REFERENCES horaires (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE days_horaires DROP FOREIGN KEY FK_1BA6C4813575FA99');
        $this->addSql('ALTER TABLE days_horaires DROP FOREIGN KEY FK_1BA6C4818AF49C8B');
        $this->addSql('DROP TABLE days');
        $this->addSql('DROP TABLE days_horaires');
        $this->addSql('DROP TABLE horaires');
    }
}
