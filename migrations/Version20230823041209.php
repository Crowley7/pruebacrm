<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230823041209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alumno (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, dni VARCHAR(8) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, nombre VARCHAR(32) NOT NULL, apellido_paterno VARCHAR(16) NOT NULL, apellido_materno VARCHAR(16) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1435D52D7F8F253B ON alumno (dni)');
        $this->addSql('CREATE TABLE curso (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(32) NOT NULL, creditos INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE matricula (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_alumno_id INTEGER NOT NULL, id_curso_id INTEGER NOT NULL, CONSTRAINT FK_15DF18857C1D59C9 FOREIGN KEY (id_alumno_id) REFERENCES alumno (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_15DF1885D710A68A FOREIGN KEY (id_curso_id) REFERENCES curso (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_15DF18857C1D59C9 ON matricula (id_alumno_id)');
        $this->addSql('CREATE INDEX IDX_15DF1885D710A68A ON matricula (id_curso_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE alumno');
        $this->addSql('DROP TABLE curso');
        $this->addSql('DROP TABLE matricula');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
