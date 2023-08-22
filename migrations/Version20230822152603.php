<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230822152603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__alumno AS SELECT id, dni, roles, password, nombre, apellido_paterno, apellido_materno FROM alumno');
        $this->addSql('DROP TABLE alumno');
        $this->addSql('CREATE TABLE alumno (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, dni VARCHAR(8) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, nombre VARCHAR(32) NOT NULL, apellido_paterno VARCHAR(16) NOT NULL, apellido_materno VARCHAR(16) NOT NULL)');
        $this->addSql('INSERT INTO alumno (id, dni, roles, password, nombre, apellido_paterno, apellido_materno) SELECT id, dni, roles, password, nombre, apellido_paterno, apellido_materno FROM __temp__alumno');
        $this->addSql('DROP TABLE __temp__alumno');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1435D52D7F8F253B ON alumno (dni)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__alumno AS SELECT id, dni, roles, password, nombre, apellido_paterno, apellido_materno FROM alumno');
        $this->addSql('DROP TABLE alumno');
        $this->addSql('CREATE TABLE alumno (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, dni VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, nombre VARCHAR(32) NOT NULL, apellido_paterno VARCHAR(16) NOT NULL, apellido_materno VARCHAR(16) NOT NULL)');
        $this->addSql('INSERT INTO alumno (id, dni, roles, password, nombre, apellido_paterno, apellido_materno) SELECT id, dni, roles, password, nombre, apellido_paterno, apellido_materno FROM __temp__alumno');
        $this->addSql('DROP TABLE __temp__alumno');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1435D52D7F8F253B ON alumno (dni)');
    }
}
