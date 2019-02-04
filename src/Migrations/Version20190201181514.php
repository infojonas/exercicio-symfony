<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190201181514 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tb_ferramentas (cod_ferramenta INT AUTO_INCREMENT NOT NULL, nome_ferramenta VARCHAR(80) DEFAULT NULL, marca_ferramenta VARCHAR(255) DEFAULT NULL, aluguel_hora DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(cod_ferramenta)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tb_os (id INT AUTO_INCREMENT NOT NULL, sequence VARCHAR(100) NOT NULL, desconto DOUBLE PRECISION DEFAULT NULL, valor_total DOUBLE PRECISION DEFAULT NULL, data_servico DATETIME DEFAULT NULL, tecnico INT NOT NULL, ferramenta INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tb_servicos (id INT AUTO_INCREMENT NOT NULL, hidraulico ENUM(\'Sim\',\'Não\'), eletrico ENUM(\'Sim\',\'Não\'), pintura ENUM(\'Sim\',\'Não\'), descricao VARCHAR(100) NOT NULL, tempo_medio INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tb_tecnicos (id INT AUTO_INCREMENT NOT NULL, cpf VARCHAR(11) NOT NULL, nome_completo VARCHAR(150) NOT NULL, dt_nasc DATETIME DEFAULT NULL, valor_hora DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tb_ferramentas');
        $this->addSql('DROP TABLE tb_os');
        $this->addSql('DROP TABLE tb_servicos');
        $this->addSql('DROP TABLE tb_tecnicos');
    }
}
