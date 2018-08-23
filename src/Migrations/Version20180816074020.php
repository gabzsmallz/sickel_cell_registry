<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180816074020 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE demograhics (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT NOT NULL, diagnosis VARCHAR(255) NOT NULL, doctor VARCHAR(255) NOT NULL, date_of_last_visit DATETIME DEFAULT NULL, method_of_contact VARCHAR(255) NOT NULL, purpose_of_visit VARCHAR(255) DEFAULT NULL, INDEX IDX_8A42F87BEA724598 (patient_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demograhics ADD CONSTRAINT FK_8A42F87BEA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE demograhics');
    }
}
