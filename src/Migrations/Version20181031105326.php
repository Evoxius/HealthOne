<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181031105326 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(40) NOT NULL, password VARCHAR(40) NOT NULL, email VARCHAR(40) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arts CHANGE voornaam voornaam TINYTEXT NOT NULL, CHANGE tussenvoegsel tussenvoegsel LONGTEXT NOT NULL, CHANGE achternaam achternaam LONGTEXT NOT NULL, CHANGE specialiteit specialiteit LONGTEXT NOT NULL, CHANGE adres adres LONGTEXT NOT NULL, CHANGE postcode postcode LONGTEXT NOT NULL, CHANGE stad stad LONGTEXT NOT NULL, CHANGE email email LONGTEXT NOT NULL, CHANGE telefoonnummer telefoonnummer LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE medicijn CHANGE naam naam TINYTEXT NOT NULL, CHANGE voordelen voordelen LONGTEXT NOT NULL, CHANGE nadelen nadelen LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE patient CHANGE voornaam voornaam TINYTEXT NOT NULL, CHANGE tussenvoegsel tussenvoegsel LONGTEXT NOT NULL, CHANGE achternaam achternaam LONGTEXT NOT NULL, CHANGE klantnummer klantnummer LONGTEXT NOT NULL, CHANGE adres adres LONGTEXT NOT NULL, CHANGE postcode postcode LONGTEXT NOT NULL, CHANGE stad stad LONGTEXT NOT NULL, CHANGE email email LONGTEXT NOT NULL, CHANGE telefoonnummer telefoonnummer LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE recept CHANGE uitgeschreven uitgeschreven LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE arts CHANGE voornaam voornaam VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE tussenvoegsel tussenvoegsel VARCHAR(20) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE achternaam achternaam VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE specialiteit specialiteit VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE adres adres VARCHAR(25) NOT NULL COLLATE latin1_swedish_ci, CHANGE postcode postcode VARCHAR(20) NOT NULL COLLATE latin1_swedish_ci, CHANGE stad stad VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE email email VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE telefoonnummer telefoonnummer VARCHAR(15) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE medicijn CHANGE naam naam VARCHAR(40) NOT NULL COLLATE latin1_swedish_ci, CHANGE voordelen voordelen VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, CHANGE nadelen nadelen VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE patient CHANGE voornaam voornaam VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE tussenvoegsel tussenvoegsel VARCHAR(20) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE achternaam achternaam VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE klantnummer klantnummer VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE adres adres VARCHAR(25) NOT NULL COLLATE latin1_swedish_ci, CHANGE postcode postcode VARCHAR(20) NOT NULL COLLATE latin1_swedish_ci, CHANGE stad stad VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE email email VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE telefoonnummer telefoonnummer VARCHAR(15) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE recept CHANGE uitgeschreven uitgeschreven VARCHAR(15) NOT NULL COLLATE latin1_swedish_ci');
    }
}
