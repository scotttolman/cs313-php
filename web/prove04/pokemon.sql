--
-- PostgreSQL database dump
--

-- Dumped from database version 10.1
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: badges; Type: TABLE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE TABLE badges (
    badge_id smallint NOT NULL,
    badge_name character varying(50),
    effect text
);


ALTER TABLE badges OWNER TO fkliesnbfbnpjw;

--
-- Name: badges_badge_id_seq; Type: SEQUENCE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE SEQUENCE badges_badge_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE badges_badge_id_seq OWNER TO fkliesnbfbnpjw;

--
-- Name: badges_badge_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER SEQUENCE badges_badge_id_seq OWNED BY badges.badge_id;


--
-- Name: element_types; Type: TABLE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE TABLE element_types (
    type_id smallint NOT NULL,
    type_name character varying(50)
);


ALTER TABLE element_types OWNER TO fkliesnbfbnpjw;

--
-- Name: element_types_type_id_seq; Type: SEQUENCE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE SEQUENCE element_types_type_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE element_types_type_id_seq OWNER TO fkliesnbfbnpjw;

--
-- Name: element_types_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER SEQUENCE element_types_type_id_seq OWNED BY element_types.type_id;


--
-- Name: moves; Type: TABLE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE TABLE moves (
    move_id smallint NOT NULL,
    move_name character varying(50),
    element character varying(50),
    power smallint
);


ALTER TABLE moves OWNER TO fkliesnbfbnpjw;

--
-- Name: moves_move_id_seq; Type: SEQUENCE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE SEQUENCE moves_move_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE moves_move_id_seq OWNER TO fkliesnbfbnpjw;

--
-- Name: moves_move_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER SEQUENCE moves_move_id_seq OWNED BY moves.move_id;


--
-- Name: pokemon; Type: TABLE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE TABLE pokemon (
    pokemon_id smallint NOT NULL,
    poke_name character varying(50),
    type_1 character varying(50),
    type_2 character varying(50),
    hp smallint,
    attack smallint,
    defense smallint,
    speed smallint,
    move_1 character varying(50),
    move_2 character varying(50),
    move_3 character varying(50),
    move_4 character varying(50)
);


ALTER TABLE pokemon OWNER TO fkliesnbfbnpjw;

--
-- Name: pokemon_pokemon_id_seq; Type: SEQUENCE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE SEQUENCE pokemon_pokemon_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pokemon_pokemon_id_seq OWNER TO fkliesnbfbnpjw;

--
-- Name: pokemon_pokemon_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER SEQUENCE pokemon_pokemon_id_seq OWNED BY pokemon.pokemon_id;


--
-- Name: trainers; Type: TABLE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE TABLE trainers (
    trainer_id smallint NOT NULL,
    name character varying(50),
    badge character varying(50),
    pokemon character varying(50)
);


ALTER TABLE trainers OWNER TO fkliesnbfbnpjw;

--
-- Name: trainers_trainer_id_seq; Type: SEQUENCE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE SEQUENCE trainers_trainer_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE trainers_trainer_id_seq OWNER TO fkliesnbfbnpjw;

--
-- Name: trainers_trainer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER SEQUENCE trainers_trainer_id_seq OWNED BY trainers.trainer_id;


--
-- Name: type_vs_type; Type: TABLE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE TABLE type_vs_type (
    vs_id smallint NOT NULL,
    attacker character varying(50),
    attacked character varying(50),
    multiplier numeric
);


ALTER TABLE type_vs_type OWNER TO fkliesnbfbnpjw;

--
-- Name: type_vs_type_vs_id_seq; Type: SEQUENCE; Schema: public; Owner: fkliesnbfbnpjw
--

CREATE SEQUENCE type_vs_type_vs_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE type_vs_type_vs_id_seq OWNER TO fkliesnbfbnpjw;

--
-- Name: type_vs_type_vs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER SEQUENCE type_vs_type_vs_id_seq OWNED BY type_vs_type.vs_id;


--
-- Name: badges badge_id; Type: DEFAULT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY badges ALTER COLUMN badge_id SET DEFAULT nextval('badges_badge_id_seq'::regclass);


--
-- Name: element_types type_id; Type: DEFAULT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY element_types ALTER COLUMN type_id SET DEFAULT nextval('element_types_type_id_seq'::regclass);


--
-- Name: moves move_id; Type: DEFAULT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY moves ALTER COLUMN move_id SET DEFAULT nextval('moves_move_id_seq'::regclass);


--
-- Name: pokemon pokemon_id; Type: DEFAULT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY pokemon ALTER COLUMN pokemon_id SET DEFAULT nextval('pokemon_pokemon_id_seq'::regclass);


--
-- Name: trainers trainer_id; Type: DEFAULT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY trainers ALTER COLUMN trainer_id SET DEFAULT nextval('trainers_trainer_id_seq'::regclass);


--
-- Name: type_vs_type vs_id; Type: DEFAULT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY type_vs_type ALTER COLUMN vs_id SET DEFAULT nextval('type_vs_type_vs_id_seq'::regclass);


--
-- Data for Name: badges; Type: TABLE DATA; Schema: public; Owner: fkliesnbfbnpjw
--

COPY badges (badge_id, badge_name, effect) FROM stdin;
\.


--
-- Data for Name: element_types; Type: TABLE DATA; Schema: public; Owner: fkliesnbfbnpjw
--

COPY element_types (type_id, type_name) FROM stdin;
1	normal
2	fire
3	water
4	electric
5	grass
6	ice
7	fighting
8	poison
9	ground
10	flying
11	psychic
12	bug
13	rock
14	ghost
15	dragon
\.


--
-- Data for Name: moves; Type: TABLE DATA; Schema: public; Owner: fkliesnbfbnpjw
--

COPY moves (move_id, move_name, element, power) FROM stdin;
\.


--
-- Data for Name: pokemon; Type: TABLE DATA; Schema: public; Owner: fkliesnbfbnpjw
--

COPY pokemon (pokemon_id, poke_name, type_1, type_2, hp, attack, defense, speed, move_1, move_2, move_3, move_4) FROM stdin;
\.


--
-- Data for Name: trainers; Type: TABLE DATA; Schema: public; Owner: fkliesnbfbnpjw
--

COPY trainers (trainer_id, name, badge, pokemon) FROM stdin;
\.


--
-- Data for Name: type_vs_type; Type: TABLE DATA; Schema: public; Owner: fkliesnbfbnpjw
--

COPY type_vs_type (vs_id, attacker, attacked, multiplier) FROM stdin;
1	normal	normal	1
2	normal	fire	1
3	normal	water	1
4	normal	electric	1
5	normal	grass	1
6	normal	ice	1
7	normal	fighting	1
8	normal	poison	1
9	normal	ground	1
10	normal	flying	1
11	normal	psychic	1
12	normal	bug	1
13	normal	rock	0.5
14	normal	ghost	0
15	normal	dragon	1
16	fire	normal	1
17	fire	fire	0.5
18	fire	water	0.5
19	fire	electric	1
20	fire	grass	2
21	fire	ice	2
22	fire	fighting	1
23	fire	poison	1
24	fire	ground	1
25	fire	flying	1
26	fire	psychic	1
27	fire	bug	2
28	fire	rock	0.5
29	fire	ghost	1
30	fire	dragon	0.5
31	water	normal	1
32	water	fire	2
33	water	water	0.5
34	water	electric	1
35	water	grass	0.5
36	water	ice	1
37	water	fighting	1
38	water	poison	1
39	water	ground	2
40	water	flying	1
41	water	psychic	1
42	water	bug	1
43	water	rock	2
44	water	ghost	1
45	water	dragon	0.5
46	electric	normal	1
47	electric	fire	1
48	electric	water	2
49	electric	electric	0.5
50	electric	grass	0.5
51	electric	ice	1
52	electric	fighting	1
53	electric	poison	1
54	electric	ground	0
55	electric	flying	2
56	electric	psychic	1
57	electric	bug	1
58	electric	rock	1
59	electric	ghost	1
60	electric	dragon	0.5
61	grass	normal	1
62	grass	fire	0.5
63	grass	water	2
64	grass	electric	1
65	grass	grass	0.5
66	grass	ice	1
67	grass	fighting	1
68	grass	poison	0.5
69	grass	ground	2
70	grass	flying	0.5
71	grass	psychic	1
72	grass	bug	0.5
73	grass	rock	2
74	grass	ghost	1
75	grass	dragon	0.5
76	ice	normal	1
77	ice	fire	1
78	ice	water	0.5
79	ice	electric	1
80	ice	grass	2
81	ice	ice	0.5
82	ice	fighting	1
83	ice	poison	1
84	ice	ground	2
85	ice	flying	2
86	ice	psychic	1
87	ice	bug	1
88	ice	rock	1
89	ice	ghost	1
90	ice	dragon	2
91	fighting	normal	2
92	fighting	fire	1
93	fighting	water	1
94	fighting	electric	1
95	fighting	grass	1
96	fighting	ice	2
97	fighting	fighting	1
98	fighting	poison	0.5
99	fighting	ground	1
100	fighting	flying	0.5
101	fighting	psychic	0.5
102	fighting	bug	0.5
103	fighting	rock	2
104	fighting	ghost	0
105	fighting	dragon	1
106	poison	normal	1
107	poison	fire	1
108	poison	water	1
109	poison	electric	1
110	poison	grass	2
111	poison	ice	1
112	poison	fighting	1
113	poison	poison	0.5
114	poison	ground	0.5
115	poison	flying	1
116	poison	psychic	1
117	poison	bug	2
118	poison	rock	0.5
119	poison	ghost	0.5
120	poison	dragon	1
121	ground	normal	1
122	ground	fire	2
123	ground	water	1
124	ground	electric	2
125	ground	grass	0.5
126	ground	ice	1
127	ground	fighting	1
128	ground	poison	2
129	ground	ground	1
130	ground	flying	0
131	ground	psychic	1
132	ground	bug	0.5
133	ground	rock	2
134	ground	ghost	1
135	ground	dragon	1
136	flying	normal	1
137	flying	fire	1
138	flying	water	1
139	flying	electric	0.5
140	flying	grass	2
141	flying	ice	1
142	flying	fighting	2
143	flying	poison	1
144	flying	ground	1
145	flying	flying	1
146	flying	psychic	1
147	flying	bug	2
148	flying	rock	0.5
149	flying	ghost	1
150	flying	dragon	1
151	psychic	normal	1
152	psychic	fire	1
153	psychic	water	1
154	psychic	electric	1
155	psychic	grass	1
156	psychic	ice	1
157	psychic	fighting	2
158	psychic	poison	2
159	psychic	ground	1
160	psychic	flying	1
161	psychic	psychic	0.5
162	psychic	bug	1
163	psychic	rock	1
164	psychic	ghost	1
165	psychic	dragon	1
166	bug	normal	1
167	bug	fire	0.5
168	bug	water	1
169	bug	electric	1
170	bug	grass	2
171	bug	ice	1
172	bug	fighting	0.5
173	bug	poison	2
174	bug	ground	1
175	bug	flying	0.5
176	bug	psychic	2
177	bug	bug	1
178	bug	rock	1
179	bug	ghost	1
180	bug	dragon	1
181	rock	normal	1
182	rock	fire	2
183	rock	water	1
184	rock	electric	1
185	rock	grass	1
186	rock	ice	2
187	rock	fighting	0.5
188	rock	poison	1
189	rock	ground	0.5
190	rock	flying	2
191	rock	psychic	1
192	rock	bug	2
193	rock	rock	1
194	rock	ghost	1
195	rock	dragon	1
196	ghost	normal	0
197	ghost	fire	1
198	ghost	water	1
199	ghost	electric	1
200	ghost	grass	1
201	ghost	ice	1
202	ghost	fighting	1
203	ghost	poison	1
204	ghost	ground	1
205	ghost	flying	1
206	ghost	psychic	0
207	ghost	bug	1
208	ghost	rock	1
209	ghost	ghost	2
210	ghost	dragon	1
211	dragon	normal	1
212	dragon	fire	1
213	dragon	water	1
214	dragon	electric	1
215	dragon	grass	1
216	dragon	ice	1
217	dragon	fighting	1
218	dragon	poison	1
219	dragon	ground	1
220	dragon	flying	1
221	dragon	psychic	1
222	dragon	bug	1
223	dragon	rock	1
224	dragon	ghost	1
225	dragon	dragon	2
\.


--
-- Name: badges_badge_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fkliesnbfbnpjw
--

SELECT pg_catalog.setval('badges_badge_id_seq', 1, false);


--
-- Name: element_types_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fkliesnbfbnpjw
--

SELECT pg_catalog.setval('element_types_type_id_seq', 15, true);


--
-- Name: moves_move_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fkliesnbfbnpjw
--

SELECT pg_catalog.setval('moves_move_id_seq', 1, false);


--
-- Name: pokemon_pokemon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fkliesnbfbnpjw
--

SELECT pg_catalog.setval('pokemon_pokemon_id_seq', 1, false);


--
-- Name: trainers_trainer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fkliesnbfbnpjw
--

SELECT pg_catalog.setval('trainers_trainer_id_seq', 1, false);


--
-- Name: type_vs_type_vs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fkliesnbfbnpjw
--

SELECT pg_catalog.setval('type_vs_type_vs_id_seq', 225, true);


--
-- Name: badges badges_badge_name_key; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY badges
    ADD CONSTRAINT badges_badge_name_key UNIQUE (badge_name);


--
-- Name: badges badges_pkey; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY badges
    ADD CONSTRAINT badges_pkey PRIMARY KEY (badge_id);


--
-- Name: element_types element_types_pkey; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY element_types
    ADD CONSTRAINT element_types_pkey PRIMARY KEY (type_id);


--
-- Name: element_types element_types_type_name_key; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY element_types
    ADD CONSTRAINT element_types_type_name_key UNIQUE (type_name);


--
-- Name: moves moves_move_name_key; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY moves
    ADD CONSTRAINT moves_move_name_key UNIQUE (move_name);


--
-- Name: moves moves_pkey; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY moves
    ADD CONSTRAINT moves_pkey PRIMARY KEY (move_id);


--
-- Name: pokemon pokemon_pkey; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY pokemon
    ADD CONSTRAINT pokemon_pkey PRIMARY KEY (pokemon_id);


--
-- Name: pokemon pokemon_poke_name_key; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY pokemon
    ADD CONSTRAINT pokemon_poke_name_key UNIQUE (poke_name);


--
-- Name: trainers trainers_pkey; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY trainers
    ADD CONSTRAINT trainers_pkey PRIMARY KEY (trainer_id);


--
-- Name: type_vs_type type_vs_type_pkey; Type: CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY type_vs_type
    ADD CONSTRAINT type_vs_type_pkey PRIMARY KEY (vs_id);


--
-- Name: moves moves_element_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY moves
    ADD CONSTRAINT moves_element_fkey FOREIGN KEY (element) REFERENCES element_types(type_name);


--
-- Name: pokemon pokemon_move_1_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY pokemon
    ADD CONSTRAINT pokemon_move_1_fkey FOREIGN KEY (move_1) REFERENCES moves(move_name);


--
-- Name: pokemon pokemon_move_2_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY pokemon
    ADD CONSTRAINT pokemon_move_2_fkey FOREIGN KEY (move_2) REFERENCES moves(move_name);


--
-- Name: pokemon pokemon_move_3_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY pokemon
    ADD CONSTRAINT pokemon_move_3_fkey FOREIGN KEY (move_3) REFERENCES moves(move_name);


--
-- Name: pokemon pokemon_move_4_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY pokemon
    ADD CONSTRAINT pokemon_move_4_fkey FOREIGN KEY (move_4) REFERENCES moves(move_name);


--
-- Name: pokemon pokemon_type_1_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY pokemon
    ADD CONSTRAINT pokemon_type_1_fkey FOREIGN KEY (type_1) REFERENCES element_types(type_name);


--
-- Name: pokemon pokemon_type_2_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY pokemon
    ADD CONSTRAINT pokemon_type_2_fkey FOREIGN KEY (type_2) REFERENCES element_types(type_name);


--
-- Name: trainers trainers_badge_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY trainers
    ADD CONSTRAINT trainers_badge_fkey FOREIGN KEY (badge) REFERENCES badges(badge_name);


--
-- Name: trainers trainers_pokemon_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY trainers
    ADD CONSTRAINT trainers_pokemon_fkey FOREIGN KEY (pokemon) REFERENCES pokemon(poke_name);


--
-- Name: type_vs_type type_vs_type_attacked_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY type_vs_type
    ADD CONSTRAINT type_vs_type_attacked_fkey FOREIGN KEY (attacked) REFERENCES element_types(type_name);


--
-- Name: type_vs_type type_vs_type_attacker_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fkliesnbfbnpjw
--

ALTER TABLE ONLY type_vs_type
    ADD CONSTRAINT type_vs_type_attacker_fkey FOREIGN KEY (attacker) REFERENCES element_types(type_name);


--
-- Name: public; Type: ACL; Schema: -; Owner: fkliesnbfbnpjw
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO fkliesnbfbnpjw;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO fkliesnbfbnpjw;


--
-- PostgreSQL database dump complete
--

