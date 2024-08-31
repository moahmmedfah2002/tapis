<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240831022113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(500) NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, promo_id INT DEFAULT NULL, full_name VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, date DATETIME NOT NULL, email VARCHAR(255) NOT NULL, livraison TINYINT(1) DEFAULT NULL, INDEX IDX_6EEAA67DF347EFB (produit_id), INDEX IDX_6EEAA67DD0C07AFF (promo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone LONGBLOB NOT NULL, new_member TINYINT(1) NOT NULL, message VARCHAR(800) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(500) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallerie (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(500) NOT NULL, updated_at DATETIME NOT NULL, reference VARCHAR(255) NOT NULL, qualite VARCHAR(255) NOT NULL, matiere VARCHAR(255) NOT NULL, traitement VARCHAR(255) NOT NULL, fabrication LONGTEXT NOT NULL, methode_fabrication VARCHAR(255) NOT NULL, entretien LONGTEXT NOT NULL, INDEX IDX_63539AC112469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, sous_categories_id INT DEFAULT NULL, types_id INT DEFAULT NULL, longueur INT NOT NULL, largeur INT NOT NULL, couleur VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, disponabilite TINYINT(1) NOT NULL, etat VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, poids DOUBLE PRECISION NOT NULL, model VARCHAR(255) NOT NULL, qualite VARCHAR(255) NOT NULL, matiere VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, reference VARCHAR(255) NOT NULL, image VARCHAR(500) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_29A5EC2712469DE2 (category_id), INDEX IDX_29A5EC279F751138 (sous_categories_id), INDEX IDX_29A5EC278EB23357 (types_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, ref VARCHAR(255) NOT NULL, longueur INT NOT NULL, image VARCHAR(500) NOT NULL, updated_at DATETIME NOT NULL, largeur INT NOT NULL, pourcentage_promo INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, prix DOUBLE PRECISION DEFAULT \'0\' NOT NULL, prix_base DOUBLE PRECISION NOT NULL, poids DOUBLE PRECISION NOT NULL, dessin LONGTEXT NOT NULL, model LONGTEXT NOT NULL, qualite LONGTEXT NOT NULL, matiere LONGTEXT NOT NULL, traitement LONGTEXT NOT NULL, fabrication LONGTEXT NOT NULL, methode_fabrication LONGTEXT NOT NULL, entretien LONGTEXT NOT NULL, supercifie DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, pourcentage_promo INT NOT NULL, INDEX IDX_C11D7DD1F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_category (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(500) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E022D94BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tapis_personaliser (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, description VARCHAR(800) NOT NULL, image2 VARCHAR(500) NOT NULL, image1 VARCHAR(500) NOT NULL, image3 VARCHAR(500) NOT NULL, updated_at DATETIME NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, age NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, sous_categorie_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, descriptions LONGTEXT NOT NULL, image VARCHAR(500) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8CDE5729365BF48 (sous_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DD0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id)');
        $this->addSql('ALTER TABLE gallerie ADD CONSTRAINT FK_63539AC112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC279F751138 FOREIGN KEY (sous_categories_id) REFERENCES sous_category (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC278EB23357 FOREIGN KEY (types_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE sous_category ADD CONSTRAINT FK_E022D94BCF5E72D FOREIGN KEY (categorie_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE5729365BF48 FOREIGN KEY (sous_categorie_id) REFERENCES sous_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DF347EFB');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DD0C07AFF');
        $this->addSql('ALTER TABLE gallerie DROP FOREIGN KEY FK_63539AC112469DE2');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2712469DE2');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC279F751138');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC278EB23357');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1F347EFB');
        $this->addSql('ALTER TABLE sous_category DROP FOREIGN KEY FK_E022D94BCF5E72D');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE5729365BF48');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE gallerie');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE promo');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE sous_category');
        $this->addSql('DROP TABLE tapis_personaliser');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
