<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513203734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE board (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE board_sujet (board_id INT NOT NULL, sujet_id INT NOT NULL, INDEX IDX_8CAEBEB6E7EC5785 (board_id), INDEX IDX_8CAEBEB67C4D497E (sujet_id), PRIMARY KEY(board_id, sujet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_board (category_id INT NOT NULL, board_id INT NOT NULL, INDEX IDX_B065640E12469DE2 (category_id), INDEX IDX_B065640EE7EC5785 (board_id), PRIMARY KEY(category_id, board_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, auteur_id INT NOT NULL, date_creation DATETIME NOT NULL, texte VARCHAR(255) NOT NULL, INDEX IDX_B6BD307F60BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sujet (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, text VARCHAR(255) NOT NULL, INDEX IDX_2E13599D9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE board_sujet ADD CONSTRAINT FK_8CAEBEB6E7EC5785 FOREIGN KEY (board_id) REFERENCES board (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE board_sujet ADD CONSTRAINT FK_8CAEBEB67C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_board ADD CONSTRAINT FK_B065640E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_board ADD CONSTRAINT FK_B065640EE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sujet ADD CONSTRAINT FK_2E13599D9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE board_sujet DROP FOREIGN KEY FK_8CAEBEB6E7EC5785');
        $this->addSql('ALTER TABLE category_board DROP FOREIGN KEY FK_B065640EE7EC5785');
        $this->addSql('ALTER TABLE category_board DROP FOREIGN KEY FK_B065640E12469DE2');
        $this->addSql('ALTER TABLE board_sujet DROP FOREIGN KEY FK_8CAEBEB67C4D497E');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F60BB6FE6');
        $this->addSql('ALTER TABLE sujet DROP FOREIGN KEY FK_2E13599D9D86650F');
        $this->addSql('DROP TABLE board');
        $this->addSql('DROP TABLE board_sujet');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_board');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE sujet');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
