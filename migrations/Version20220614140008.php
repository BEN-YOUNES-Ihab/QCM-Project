<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220614140008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answers (id INT AUTO_INCREMENT NOT NULL, id_question_id INT DEFAULT NULL, label LONGTEXT NOT NULL, is_true TINYINT(1) NOT NULL, INDEX IDX_50D0C6066353B48 (id_question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, qcm_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6DC044C5F16A9A2D (qcm_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qcm (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, id_qcm_id INT DEFAULT NULL, id_question_type_id INT NOT NULL, label LONGTEXT NOT NULL, image LONGTEXT DEFAULT NULL, INDEX IDX_B6F7494ED955F44B (id_qcm_id), UNIQUE INDEX UNIQ_B6F7494E281A0C5F (id_question_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_answer (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, answers_id_id INT NOT NULL, qcm_id_id INT NOT NULL, question_id_id INT NOT NULL, result INT DEFAULT NULL, UNIQUE INDEX UNIQ_54EB92A59D86650F (user_id_id), UNIQUE INDEX UNIQ_54EB92A5F981B84 (answers_id_id), UNIQUE INDEX UNIQ_54EB92A5F16A9A2D (qcm_id_id), UNIQUE INDEX UNIQ_54EB92A54FAF8F53 (question_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, groupe_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D6497A45358C (groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answers ADD CONSTRAINT FK_50D0C6066353B48 FOREIGN KEY (id_question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5F16A9A2D FOREIGN KEY (qcm_id_id) REFERENCES qcm (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494ED955F44B FOREIGN KEY (id_qcm_id) REFERENCES qcm (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E281A0C5F FOREIGN KEY (id_question_type_id) REFERENCES question_type (id)');
        $this->addSql('ALTER TABLE student_answer ADD CONSTRAINT FK_54EB92A59D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE student_answer ADD CONSTRAINT FK_54EB92A5F981B84 FOREIGN KEY (answers_id_id) REFERENCES answers (id)');
        $this->addSql('ALTER TABLE student_answer ADD CONSTRAINT FK_54EB92A5F16A9A2D FOREIGN KEY (qcm_id_id) REFERENCES qcm (id)');
        $this->addSql('ALTER TABLE student_answer ADD CONSTRAINT FK_54EB92A54FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497A45358C FOREIGN KEY (groupe_id) REFERENCES `group` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_answer DROP FOREIGN KEY FK_54EB92A5F981B84');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497A45358C');
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C5F16A9A2D');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494ED955F44B');
        $this->addSql('ALTER TABLE student_answer DROP FOREIGN KEY FK_54EB92A5F16A9A2D');
        $this->addSql('ALTER TABLE answers DROP FOREIGN KEY FK_50D0C6066353B48');
        $this->addSql('ALTER TABLE student_answer DROP FOREIGN KEY FK_54EB92A54FAF8F53');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E281A0C5F');
        $this->addSql('ALTER TABLE student_answer DROP FOREIGN KEY FK_54EB92A59D86650F');
        $this->addSql('DROP TABLE answers');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE qcm');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE question_type');
        $this->addSql('DROP TABLE student_answer');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
