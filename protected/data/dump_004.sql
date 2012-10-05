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
-- Name: tbl_user_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('tbl_user_user_id_seq', 1, false);


--
-- Data for Name: tbl_user; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO tbl_user VALUES (1, 'guest', 'guest', 'email@guest.com');
INSERT INTO tbl_user VALUES (2, 'admin', 'admin', 'admin@admin.com');


--
-- PostgreSQL database dump complete
--

