<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411164714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe (id INT NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE horaires (id INT NOT NULL, employe_id_id INT NOT NULL, annee INT NOT NULL, semaine INT NOT NULL, jour0 JSON DEFAULT NULL, jour1 JSON DEFAULT NULL, jour2 JSON DEFAULT NULL, jour3 JSON DEFAULT NULL, jour4 JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE SEQUENCE employe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE horaires_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE INDEX IDX_39B7118F325980C0 ON horaires (employe_id_id)');
        $this->addSql('ALTER TABLE horaires ADD CONSTRAINT FK_39B7118F325980C0 FOREIGN KEY (employe_id_id) REFERENCES employe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE employe_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE horaires_id_seq CASCADE');
        $this->addSql('ALTER TABLE horaires DROP CONSTRAINT FK_39B7118F325980C0');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE horaires');
    }
}
