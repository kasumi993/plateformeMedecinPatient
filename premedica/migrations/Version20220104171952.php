<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220104171952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medecin ADD id_etablissement_id INT NOT NULL');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C61CE947F9 FOREIGN KEY (id_etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('CREATE INDEX IDX_1BDA53C61CE947F9 ON medecin (id_etablissement_id)');
        $this->addSql('ALTER TABLE pharmacien ADD id_etablissement_id INT NOT NULL');
        $this->addSql('ALTER TABLE pharmacien ADD CONSTRAINT FK_59E396F31CE947F9 FOREIGN KEY (id_etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('CREATE INDEX IDX_59E396F31CE947F9 ON pharmacien (id_etablissement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C61CE947F9');
        $this->addSql('DROP INDEX IDX_1BDA53C61CE947F9 ON medecin');
        $this->addSql('ALTER TABLE medecin DROP id_etablissement_id');
        $this->addSql('ALTER TABLE pharmacien DROP FOREIGN KEY FK_59E396F31CE947F9');
        $this->addSql('DROP INDEX IDX_59E396F31CE947F9 ON pharmacien');
        $this->addSql('ALTER TABLE pharmacien DROP id_etablissement_id');
    }
}
