DROP TABLE scripture CASCADE;

CREATE TABLE scripture (
    id      SERIAL      PRIMARY Key,
    book    VARCHAR(50) NOT NULL,
    chapter INT         NOT NULL,
    verse   INT         NOT NULL,
    content TEXT        NOT NULL
);

INSERT INTO scripture (book, chapter, verse, content) VALUES (
    'John',
    1,
    5,
    'All things were made by him; and without him was not any thing made that was made.'
);

INSERT INTO scripture (book, chapter, verse, content) VALUES (
    'Doctrine and Covenants',
    88,
    49,
    'The light shineth in darkness, and the darkness comprehendeth it not;
     nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'
);

INSERT INTO scripture (book, chapter, verse, content) VALUES (
    'Doctrine and Covenants',
    93,
    28,
    'And, verily I say unto you, that it is my will that you should hasten to translate my scriptures, 
    and to obtain a knowledge of history, and of countries, and of kingdoms, of laws of God and man, and 
    all this for the salvation of Zion. Amen.'
);

INSERT INTO scripture (book, chapter, verse, content) VALUES (
    'Mosiah',
    16,
    9,
    'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; 
    yea, and also a life which is endless, that there can be no more death.'
);

/***************************************************************************************************************************/

DROP TABLE topic CASCADE;

CREATE TABLE topic (
    id      SERIAL      PRIMARY KEY,
    name    VARCHAR(64) NOT NULL     
);

INSERT INTO topic (name) VALUES ('Faith');
INSERT INTO topic (name) VALUES ('Sacrifice');
INSERT INTO topic (name) VALUES ('Charity');

DROP TABLE scripture_topic CASCADE;

/*maybe change from serial to int*/
CREATE TABLE scripture_topic (
    scripture_id        INT NOT NULL  REFERENCES scripture (id),
    topic_id            INT NOT NULL  REFERENCES topic (id)
);