create database apex_manager;
use apex_manager;

-- persons table 
create table persons( 
    id int AUTO_INCREMENT PRIMARY key,
    name varchar(50) not null,
    email varchar(255) not null unique,
    nationality varchar(50)
);
-- teams table
create table teams (
	id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) not null unique,
    budget decimal(12,2),
    manager varchar(50)
);
-- players table
create TABLE players (
	person_id int PRIMARY KEY,
    pseudo varchar(50) not null unique,
    role varchar(50) not null,
    market_value decimal(12,2) not null,
    CONSTRAINT fk_player_person FOREIGN KEY(person_id) REFERENCES persons(id) ON DELETE CASCADE
);
-- coachs table
CREATE TABLE coachs(
	person_id int PRIMARY KEY,
    coaching_style varchar(100),
    years_of_experience int not null,
    CONSTRAINT fk_coach_person FOREIGN KEY (person_id) REFERENCES persons(id) ON DELETE CASCADE
);
-- contracts table
CREATE TABLE contracts(
	id int AUTO_INCREMENT PRIMARY KEY,
    uuid char(36) UNIQUE not null,
    person_id int NOT null,
    team_id int NOT null,
    salary decimal(12,2) not null,
    buyback_clause decimal(13,2),
    start_date date not null,
    end_date date not null,
    creation_date timestamp DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_contract_person FOREIGN KEY (person_id) REFERENCES persons(id),
    CONSTRAINT fk_contract_team FOREIGN KEY (team_id) REFERENCES teams(id)
);
-- transfers table
CREATE TABLE transfers(
	id int AUTO_INCREMENT PRIMARY KEY,
    reference varchar(50) not null UNIQUE,
    person_id int not null,
    current_team_id int not null,
    new_team_id int not null,
    amount decimal(14,2) not null,
    status ENUM('pending', 'valid', 'cancel') not null,
    transfer_date timestamp DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_transfer_person FOREIGN KEY (person_id) REFERENCES persons(id),
    CONSTRAINT fk_current_team FOREIGN KEY (current_team_id) REFERENCES teams(id),
    CONSTRAINT fk_new_team FOREIGN KEY (new_team_id) REFERENCES teams(id)
);
-- table for teams and players
create table team_player (
    id int AUTO_INCREMENT PRIMARY KEY,
    team_id int not null,
    player_id int not null,
    CONSTRAINT fk_team_id FOREIGN KEY (team_id) REFERENCES teams(id) ON DELETE CASCADE,
    CONSTRAINT fk_player_id FOREIGN KEY (player_id) REFERENCES players(person_id) on delete cascade
)
-- users table
create table users (
    id int AUTO_INCREMENT PRIMARY key,
    name varchar(100) not null,
    email varchar(255) not null unique,
    password varchar(50) not null,
    role ENUM('admin', 'journalist', 'visitor') not null
);