<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180816084304 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE baseline_data (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT NOT NULL, height DOUBLE PRECISION DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, o2_sat DOUBLE PRECISION DEFAULT NULL, white_blood_cell_count DOUBLE PRECISION DEFAULT NULL, hemoglobin DOUBLE PRECISION DEFAULT NULL, platelet DOUBLE PRECISION DEFAULT NULL, INDEX IDX_4295E622EA724598 (patient_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE daily_medications (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT NOT NULL, prophylactic_antibiotics TINYINT(1) DEFAULT NULL, prophylactic_antibiotics_date_subscribed DATETIME DEFAULT NULL, prophylactic_antibiotics_dose VARCHAR(255) DEFAULT NULL, folic_acid TINYINT(1) DEFAULT NULL, folic_acid_date_subscribed DATETIME DEFAULT NULL, dose_folic_acid VARCHAR(255) DEFAULT NULL, hydroxyurea TINYINT(1) DEFAULT NULL, hydroxyurea_date_subscribed DATETIME DEFAULT NULL, hydroxyurea_dose VARCHAR(255) DEFAULT NULL, compliance VARCHAR(255) DEFAULT NULL, side_effect LONGTEXT DEFAULT NULL, notes LONGTEXT DEFAULT NULL, INDEX IDX_9F178373EA724598 (patient_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE health_maintenance (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT NOT NULL, tcd_screening_date DATETIME DEFAULT NULL, tcd_screening_result VARCHAR(255) DEFAULT NULL, recommendations LONGTEXT DEFAULT NULL, next_tcd_screening_date DATETIME DEFAULT NULL, specialist VARCHAR(255) DEFAULT NULL, specialist_visit_date DATETIME DEFAULT NULL, notes LONGTEXT DEFAULT NULL, immunization VARCHAR(255) DEFAULT NULL, immunization_date DATETIME DEFAULT NULL, INDEX IDX_2DF75B97EA724598 (patient_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE interim_history (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT NOT NULL, last_hematology_vist DATETIME NOT NULL, hematologist VARCHAR(255) NOT NULL, complications_since_last_vist VARCHAR(255) NOT NULL, notes LONGTEXT DEFAULT NULL, INDEX IDX_7E256AECEA724598 (patient_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sickle_cell_history (id INT AUTO_INCREMENT NOT NULL, patient_id_id INT NOT NULL, hospitalization TINYINT(1) NOT NULL, hospitalization_no_time INT DEFAULT NULL, aplastic_crisis TINYINT(1) DEFAULT NULL, dactylitis TINYINT(1) DEFAULT NULL, retinopathy TINYINT(1) NOT NULL, splenic_sequestration TINYINT(1) DEFAULT NULL, acute_chest_syndrome TINYINT(1) DEFAULT NULL, acute_chest_syndrome_date DATETIME DEFAULT NULL, avascular_necrosis TINYINT(1) DEFAULT NULL, icu_admission TINYINT(1) DEFAULT NULL, icu_admission_date DATETIME DEFAULT NULL, cholecystectomy TINYINT(1) DEFAULT NULL, splenectomy TINYINT(1) DEFAULT NULL, tonsillectomy TINYINT(1) DEFAULT NULL, tonsillectomy_adenoidectomy TINYINT(1) DEFAULT NULL, others LONGTEXT DEFAULT NULL, INDEX IDX_45E12769EA724598 (patient_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE baseline_data ADD CONSTRAINT FK_4295E622EA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE daily_medications ADD CONSTRAINT FK_9F178373EA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE health_maintenance ADD CONSTRAINT FK_2DF75B97EA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE interim_history ADD CONSTRAINT FK_7E256AECEA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE sickle_cell_history ADD CONSTRAINT FK_45E12769EA724598 FOREIGN KEY (patient_id_id) REFERENCES patient (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE baseline_data');
        $this->addSql('DROP TABLE daily_medications');
        $this->addSql('DROP TABLE health_maintenance');
        $this->addSql('DROP TABLE interim_history');
        $this->addSql('DROP TABLE sickle_cell_history');
    }
}
