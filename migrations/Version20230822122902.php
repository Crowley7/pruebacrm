<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230822122902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE curso (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(32) NOT NULL, creditos INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE matricula (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, id_alumno_id INTEGER NOT NULL, id_curso_id INTEGER NOT NULL, CONSTRAINT FK_15DF18857C1D59C9 FOREIGN KEY (id_alumno_id) REFERENCES alumno (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_15DF1885D710A68A FOREIGN KEY (id_curso_id) REFERENCES curso (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_15DF18857C1D59C9 ON matricula (id_alumno_id)');
        $this->addSql('CREATE INDEX IDX_15DF1885D710A68A ON matricula (id_curso_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE curso');
        $this->addSql('DROP TABLE matricula');
    }
}
