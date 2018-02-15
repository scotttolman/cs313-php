DROP TABLE badges CASCADE;
DROP TABLE element_types CASCADE;
DROP TABLE type_vs_type CASCADE;
DROP TABLE pokemon CASCADE;
DROP TABLE trainers CASCADE;

CREATE TABLE badges (
    badge_id    smallserial     PRIMARY KEY,
    badge_name  VARCHAR(50)     NOT NULL UNIQUE,
    effect      REAL            NOT NULL
);

CREATE TABLE element_types (
    type_id     smallserial     PRIMARY KEY,
    type_name   VARCHAR(50)     NOT NULL UNIQUE
);

CREATE TABLE type_vs_type (
    vs_id       smallserial     PRIMARY KEY,
    attacker    VARCHAR(50)     REFERENCES element_types(type_name),
    attacked    VARCHAR(50)     REFERENCES element_types(type_name),
    multiplier  DECIMAL         NOT NULL
);

CREATE TABLE pokemon (
    pokemon_id  smallserial     PRIMARY KEY,
    poke_name   VARCHAR(50)     NOT NULL UNIQUE,
    level       SMALLINT        NOT NULL,
    type_1      VARCHAR(50)     REFERENCES element_types(type_name),
    type_2      VARCHAR(50)     REFERENCES element_types(type_name),
    hp          SMALLINT        NOT NULL,
    attack      SMALLINT        NOT NULL,
    defense     SMALLINT        NOT NULL,
    speed       SMALLINT        NOT NULL
);

CREATE TABLE trainers (
    trainer_id  smallserial     PRIMARY KEY,
    name        VARCHAR(50)     NOT NULL UNIQUE,
    password    varchar(64)     NOT NULL,
    badge       VARCHAR(50)     REFERENCES badges(badge_name),
    pokemon_1   VARCHAR(50)     REFERENCES pokemon(poke_name),
    pokemon_2   VARCHAR(50)     REFERENCES pokemon(poke_name),
    pokemon_3   VARCHAR(50)     REFERENCES pokemon(poke_name)
);

ALTER TABLE pokemon ADD COLUMN  trainer VARCHAR(50) NOT NULL REFERENCES trainers(name);


INSERT INTO badges (badge_name, effect) VALUES('Boulder', 1.05);
INSERT INTO badges (badge_name, effect) VALUES('Cascade', 1.10);
INSERT INTO badges (badge_name, effect) VALUES('Thunder', 1.15);
INSERT INTO badges (badge_name, effect) VALUES('Rainbow', 1.20);
INSERT INTO badges (badge_name, effect) VALUES('Soul', 1.25);
INSERT INTO badges (badge_name, effect) VALUES('Marsh', 1.30);
INSERT INTO badges (badge_name, effect) VALUES('Volcano', 1.35);
INSERT INTO badges (badge_name, effect) VALUES('Earth', 1.50);


INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'normal');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'fire');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'water');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'electric');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'grass');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'ice');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'fighting');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'poison');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'ground');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'flying');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'psychic');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'bug');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'rock');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'ghost');
INSERT INTO element_types VALUES(nextval('element_types_type_id_seq'), 'dragon');


INSERT INTO trainers (name, password) VALUES('Scott', 'Tolman');


INSERT INTO pokemon (poke_name, level, trainer, type_1, hp, attack, defense, speed) VALUES ('Bulbasaur',1, 'Scott', 'grass', 4, 3, 1, 2);
INSERT INTO pokemon (poke_name, level, trainer, type_1, hp, attack, defense, speed) VALUES ('Ivysaur', 12, 'Scott', 'grass', 35, 20, 10, 10);
INSERT INTO pokemon (poke_name, level, trainer, type_1, hp, attack, defense, speed) VALUES ('Charmander', 1, 'Scott', 'fire', 3, 4, 2, 1);
INSERT INTO pokemon (poke_name, level, trainer, type_1, hp, attack, defense, speed) VALUES ('Squirtle', 1, 'Scott', 'water', 4, 2, 3, 1);


INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'fire',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'grass',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'poison',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'ground',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'flying',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'bug',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'rock',      .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'ghost',     0);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'normal', 'dragon',    1);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'fire',      .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'water',     .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'grass',     2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'ice',       2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'poison',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'ground',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'flying',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'bug',       2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'rock',      .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fire', 'dragon',    .5);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'fire',      2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'water',     .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'grass',     .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'poison',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'ground',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'flying',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'bug',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'rock',      2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'water', 'dragon',    .5);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'fire',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'water',     2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'electric',  .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'grass',     .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'poison',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'ground',    0);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'flying',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'bug',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'rock',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'electric', 'dragon',    .5);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'fire',      .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'water',     2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'grass',     .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'poison',    .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'ground',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'flying',    .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'bug',       .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'rock',      2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'grass', 'dragon',    .5);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'fire',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'water',     .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'grass',     2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'ice',       .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'poison',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'ground',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'flying',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'bug',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'rock',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ice', 'dragon',    2);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'normal',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'fire',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'grass',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'ice',       2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'poison',    .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'ground',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'flying',    .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'psychic',   .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'bug',       .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'rock',      2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'ghost',     0);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'fighting', 'dragon',    1);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'fire',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'grass',     2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'poison',    .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'ground',    .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'flying',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'bug',       2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'rock',      .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'ghost',     .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'poison', 'dragon',    1);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'fire',      2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'electric',  2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'grass',     .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'poison',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'ground',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'flying',    0);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'bug',       .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'rock',      2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ground', 'dragon',    1);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'fire',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'electric',  .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'grass',     2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'fighting',  2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'poison',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'ground',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'flying',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'bug',       2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'rock',      .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'flying', 'dragon',    1);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'fire',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'grass',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'fighting',  2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'poison',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'ground',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'flying',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'psychic',   .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'bug',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'rock',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'psychic', 'dragon',    1);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'fire',      .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'grass',     2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'fighting',  .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'poison',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'ground',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'flying',    .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'psychic',   2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'bug',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'rock',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'bug', 'dragon',    1);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'fire',      2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'grass',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'ice',       2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'fighting',  .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'poison',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'ground',    .5);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'flying',    2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'bug',       2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'rock',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'rock', 'dragon',    1);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'normal',    0);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'fire',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'grass',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'poison',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'ground',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'flying',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'psychic',   0);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'bug',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'rock',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'ghost',     2);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'ghost', 'dragon',    1);

INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'normal',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'fire',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'water',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'electric',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'grass',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'ice',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'fighting',  1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'poison',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'ground',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'flying',    1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'psychic',   1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'bug',       1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'rock',      1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'ghost',     1);
INSERT INTO type_vs_type VALUES(nextval('type_vs_type_vs_id_seq'),'dragon', 'dragon',    2);