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
-- Name: tbl_menu_menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('tbl_menu_menu_id_seq', 37, true);


--
-- Data for Name: tbl_menu; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO tbl_menu VALUES (1, NULL, 'Home', '/site/index', 0);
INSERT INTO tbl_menu VALUES (3, NULL, 'Login', '/site/login', 1001);
INSERT INTO tbl_menu VALUES (8, NULL, 'Accounting', '/accounting', 6);
INSERT INTO tbl_menu VALUES (7, NULL, 'Sales', '/sales', 5);
INSERT INTO tbl_menu VALUES (5, NULL, 'Purchasing', '/purchasing', 3);
INSERT INTO tbl_menu VALUES (11, 9, 'Roles', '/role/admin', 93);
INSERT INTO tbl_menu VALUES (10, 9, 'Menus', '/menu/admin', 91);
INSERT INTO tbl_menu VALUES (12, 9, 'Users', '/user/admin', 92);
INSERT INTO tbl_menu VALUES (13, 9, 'Menus Role', '/roleMenu/admin', 94);
INSERT INTO tbl_menu VALUES (14, 9, 'Users Role', '/userRole/admin', 95);
INSERT INTO tbl_menu VALUES (17, 15, 'Product Groups', '/groups/admin', 43);
INSERT INTO tbl_menu VALUES (16, 15, 'Product Manufacturer', '/manufacturer/admin', 42);
INSERT INTO tbl_menu VALUES (15, 4, 'Product', '/product/admin', 43);
INSERT INTO tbl_menu VALUES (22, 15, 'Supply List', '/supplylist/admin', 46);
INSERT INTO tbl_menu VALUES (24, 23, 'Districs', '/districs/admin', 231);
INSERT INTO tbl_menu VALUES (21, 15, 'Product Uoms', '/uoms/admin', 45);
INSERT INTO tbl_menu VALUES (18, 15, 'Product Categories', '/category/admin', 44);
INSERT INTO tbl_menu VALUES (19, 4, 'Supplier', '/suppliers/admin', 41);
INSERT INTO tbl_menu VALUES (25, 23, 'Customer Type', '/customerType/admin', 232);
INSERT INTO tbl_menu VALUES (26, 23, 'Customer Class', '/customerClass/admin', 233);
INSERT INTO tbl_menu VALUES (23, 4, 'Customers', '/customers/admin', 44);
INSERT INTO tbl_menu VALUES (27, 23, 'Customer Limit', '/customerLimitation/admin', 234);
INSERT INTO tbl_menu VALUES (28, 23, 'Customer Details', '/customerDetail/admin', 235);
INSERT INTO tbl_menu VALUES (29, 6, 'Warehouses', '/warehouse/admin', 61);
INSERT INTO tbl_menu VALUES (30, 6, 'Locators', '/locator/admin', 62);
INSERT INTO tbl_menu VALUES (31, 6, 'Good Movement', '', 63);
INSERT INTO tbl_menu VALUES (34, 31, 'Movement History', '/movementHistory/admin', 633);
INSERT INTO tbl_menu VALUES (33, 31, 'Receipt', '/goodReceipt/admin', 631);
INSERT INTO tbl_menu VALUES (32, 31, 'Issue', '/goodIssue/admin', 632);
INSERT INTO tbl_menu VALUES (4, NULL, 'Data Master', '', 2);
INSERT INTO tbl_menu VALUES (9, NULL, 'Sys Admin', '', 1);
INSERT INTO tbl_menu VALUES (2, NULL, 'Logout', '/site/logout', 1000);
INSERT INTO tbl_menu VALUES (6, NULL, 'Inventory', '', 4);
INSERT INTO tbl_menu VALUES (36, 5, 'Purchase Order', '', 51);
INSERT INTO tbl_menu VALUES (37, 5, 'Purchase Delivery', '/PoDelivery/admin', 52);


--
-- PostgreSQL database dump complete
--

