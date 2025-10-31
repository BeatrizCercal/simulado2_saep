-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema simulado2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema simulado2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `simulado2` DEFAULT CHARACTER SET utf8 ;
USE `simulado2` ;

-- -----------------------------------------------------
-- Table `simulado2`.`Usuário`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `simulado2`.`Usuário` (
  `idUsuário` INT NOT NULL AUTO_INCREMENT,
  `nome_usuario` VARCHAR(87) NOT NULL,
  `email_usuario` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUsuário`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simulado2`.`Tarefas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `simulado2`.`Tarefas` (
  `idTarefas` INT NOT NULL AUTO_INCREMENT,
  `descricao_tarefa` VARCHAR(255) NOT NULL,
  `nome_setor` VARCHAR(45) NOT NULL,
  `prioridade_tarefa` ENUM('Baixa', 'Média', 'Alta') NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `status_tarefa` ENUM('A fazer', 'Fazendo', 'Pronto') NOT NULL,
  `Usuário_idUsuário` INT NOT NULL,
  PRIMARY KEY (`idTarefas`),
  INDEX `fk_Tarefas_Usuário_idx` (`Usuário_idUsuário` ASC) VISIBLE,
  CONSTRAINT `fk_Tarefas_Usuário`
    FOREIGN KEY (`Usuário_idUsuário`)
    REFERENCES `simulado2`.`Usuário` (`idUsuário`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;