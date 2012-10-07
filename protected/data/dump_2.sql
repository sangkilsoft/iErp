--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Name: tbl_role_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('tbl_role_role_id_seq', 1, false);


--
-- Data for Name: tbl_role; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO tbl_role VALUES (1, 'guest', 'Default role for anonimous');
INSERT INTO tbl_role VALUES (2, 'admin', 'system administrator role');


--
-- PostgreSQL database dump complete
--

