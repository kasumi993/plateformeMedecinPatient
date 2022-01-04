<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220104171307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592C4F31A84');
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592CCFDB96BE');
        $this->addSql('DROP INDEX IDX_20FD592CCFDB96BE ON etablissement');
        $this->addSql('DROP INDEX IDX_20FD592C4F31A84 ON etablissement');
        $this->addSql('ALTER TABLE etablissement DROP medecin_id, DROP pharmacien_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement ADD medecin_id INT DEFAULT NULL, ADD pharmacien_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592C4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592CCFDB96BE FOREIGN KEY (pharmacien_id) REFERENCES pharmacien (id)');
        $this->addSql('CREATE INDEX IDX_20FD592CCFDB96BE ON etablissement (pharmacien_id)');
        $this->addSql('CREATE INDEX IDX_20FD592C4F31A84 ON etablissement (medecin_id)');
    }
}
