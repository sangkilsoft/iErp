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
-- Name: account_id_acc_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('account_id_acc_seq', 25, true);


--
-- Name: branch_access_id_branchaccs_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('branch_access_id_branchaccs_seq', 1, false);


--
-- Name: branch_id_branch_seq_1; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('branch_id_branch_seq_1', 1, true);


--
-- Name: branch_id_branch_seq_1_1; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('branch_id_branch_seq_1_1', 7, true);


--
-- Name: branch_id_branch_seq_1_2_1; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('branch_id_branch_seq_1_2_1', 1, false);


--
-- Name: category_id_category_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('category_id_category_seq', 3, true);


--
-- Name: cogs_id_cogs_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('cogs_id_cogs_seq', 5, true);


--
-- Name: customer_class_id_cclass_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('customer_class_id_cclass_seq', 1, false);


--
-- Name: customer_type_id_ctype_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('customer_type_id_ctype_seq', 1, false);


--
-- Name: customers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('customers_id_seq', 1, false);


--
-- Name: districs_id_distric_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('districs_id_distric_seq', 1, false);


--
-- Name: gissue_hdr_id_issue_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('gissue_hdr_id_issue_seq', 1, false);


--
-- Name: gissue_line_id_line_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('gissue_line_id_line_seq', 1, false);


--
-- Name: gl_detail_id_gldetail_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('gl_detail_id_gldetail_seq', 19, true);


--
-- Name: gl_header_id_glheader_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('gl_header_id_glheader_seq', 13, true);


--
-- Name: greceipt_hdr_id_receipt_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('greceipt_hdr_id_receipt_seq', 47, true);


--
-- Name: greceipt_line_id_line_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('greceipt_line_id_line_seq', 19, true);


--
-- Name: groups_id_groups_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('groups_id_groups_seq', 2, true);


--
-- Name: gshp_line_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('gshp_line_seq', 1, false);


--
-- Name: locator_id_locator_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('locator_id_locator_seq', 1, true);


--
-- Name: manufacturer_id_manfrs_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('manufacturer_id_manfrs_seq', 1, true);


--
-- Name: mapping_coa_id_mappingcoa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mapping_coa_id_mappingcoa_seq', 11, true);


--
-- Name: mv_history_id_movement_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('mv_history_id_movement_seq', 26, true);


--
-- Name: organization_id_orgn_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('organization_id_orgn_seq', 1, true);


--
-- Name: organization_id_orgn_seq_1_1; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('organization_id_orgn_seq_1_1', 7, true);


--
-- Name: organization_id_orgn_seq_2_1; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('organization_id_orgn_seq_2_1', 1, false);


--
-- Name: podelivery_hdr_id_delivery_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('podelivery_hdr_id_delivery_seq', 67, true);


--
-- Name: podelivery_line_id_line_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('podelivery_line_id_line_seq', 16, true);


--
-- Name: poinvoice_hdr_id_invoice_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('poinvoice_hdr_id_invoice_seq', 1, false);


--
-- Name: poinvoice_payment_id_payment_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('poinvoice_payment_id_payment_seq', 1, false);


--
-- Name: porder_hdr_id_po_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('porder_hdr_id_po_seq', 1, false);


--
-- Name: porder_line_id_line_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('porder_line_id_line_seq', 1, false);


--
-- Name: price_cat_id_price_cat_seq_1; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('price_cat_id_price_cat_seq_1', 1, false);


--
-- Name: price_id_price_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('price_id_price_seq', 1, false);


--
-- Name: product_id_product_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('product_id_product_seq', 2, true);


--
-- Name: sal_delivery_id_sdelivery_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('sal_delivery_id_sdelivery_seq', 1, false);


--
-- Name: sal_invoice_id_sinvoice_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('sal_invoice_id_sinvoice_seq', 1, false);


--
-- Name: sal_order_id_sorder_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('sal_order_id_sorder_seq', 1, false);


--
-- Name: sal_request_id_srequest_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('sal_request_id_srequest_seq', 1, false);


--
-- Name: sal_shipment_id_gshipment_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('sal_shipment_id_gshipment_seq', 1, false);


--
-- Name: saldo_line_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('saldo_line_seq', 1, false);


--
-- Name: sinvoice_line_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('sinvoice_line_seq', 1, false);


--
-- Name: so_line_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('so_line_seq', 1, false);


--
-- Name: srequest_line_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('srequest_line_seq', 1, false);


--
-- Name: stock_transfer_id_stransfer_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('stock_transfer_id_stransfer_seq', 1, false);


--
-- Name: suppliers_id_supplier_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('suppliers_id_supplier_seq', 2, true);


--
-- Name: supply_list_id_supply_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('supply_list_id_supply_seq', 1, false);


--
-- Name: tbl_menu_menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('tbl_menu_menu_id_seq', 60, true);


--
-- Name: tbl_role_menu_id_rolemn_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('tbl_role_menu_id_rolemn_seq', 19, true);


--
-- Name: tbl_role_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('tbl_role_role_id_seq', 1, false);


--
-- Name: tbl_user_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('tbl_user_role_id_seq', 3, true);


--
-- Name: tbl_user_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('tbl_user_user_id_seq', 1, false);


--
-- Name: uoms_id_uoms_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('uoms_id_uoms_seq', 2, true);


--
-- Name: warehouse_id_warehouse_seq; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('warehouse_id_warehouse_seq', 1, true);


--
-- Name: warehouse_id_warehouse_seq_1_1; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('warehouse_id_warehouse_seq_1_1', 1, false);


--
-- Name: warehouse_id_warehouse_seq_2; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('warehouse_id_warehouse_seq_2', 1, false);


--
-- Name: warehouse_id_warehouse_seq_3; Type: SEQUENCE SET; Schema: public; Owner: sangkilsoft
--

SELECT pg_catalog.setval('warehouse_id_warehouse_seq_3', 1, false);


--
-- Data for Name: account; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO account VALUES (1, '1', 'HARTA', 'D', NULL, 1, '2012-10-03 08:39:39.32', 'admin', 'admin', '2012-10-03 08:39:39.32');
INSERT INTO account VALUES (2, '2', 'HUTANG', 'K', NULL, 1, '2012-10-03 08:40:11.652', 'admin', 'admin', '2012-10-03 08:40:11.652');
INSERT INTO account VALUES (3, '3', 'MODAL', 'K', NULL, 1, '2012-10-03 08:42:09.626', 'admin', 'admin', '2012-10-03 08:42:09.626');
INSERT INTO account VALUES (4, '4', 'PENDAPATAN', 'K', NULL, 1, '2012-10-03 08:42:46.273', 'admin', 'admin', '2012-10-03 08:42:46.273');
INSERT INTO account VALUES (5, '5', 'HARGA POKOK PENJUALAN', 'D', NULL, 1, '2012-10-03 08:43:40.873', 'admin', 'admin', '2012-10-03 08:43:40.873');
INSERT INTO account VALUES (6, '6', 'BIAYA', 'D', NULL, 1, '2012-10-03 08:44:08.872', 'admin', 'admin', '2012-10-03 08:44:08.872');
INSERT INTO account VALUES (7, '11', 'AKTIVA LANCAR', 'D', 1, 2, '2012-10-03 08:47:53.846', 'admin', 'admin', '2012-10-03 08:47:53.846');
INSERT INTO account VALUES (8, '12', 'AKTIVA TETAP', 'D', 1, 2, '2012-10-03 08:49:48.537', 'admin', 'admin', '2012-10-03 08:49:48.537');
INSERT INTO account VALUES (9, '111', 'KAS', 'D', 7, 3, '2012-10-03 08:54:38.74', 'admin', 'admin', '2012-10-03 15:21:14.007');
INSERT INTO account VALUES (10, '112', 'BANK BCA', 'D', 7, 3, '2012-10-03 15:26:38.881', 'admin', 'admin', '2012-10-03 15:32:26.084');
INSERT INTO account VALUES (11, '121', 'TANAH', 'D', 8, 3, '2012-10-03 15:31:22.214', 'admin', 'admin', '2012-10-03 15:33:19.179');
INSERT INTO account VALUES (12, '21', 'HUTANG LANCAR', 'K', 2, 2, '2012-10-03 15:35:33.233', 'admin', 'admin', '2012-10-03 15:35:33.233');
INSERT INTO account VALUES (13, '211', 'HUTANG USAHA', 'K', 12, 3, '2012-10-03 15:36:37.204', 'admin', 'admin', '2012-10-03 15:36:37.204');
INSERT INTO account VALUES (16, '113', 'PERSEDIAAN BARANG DAGANGAN', 'D', 7, 3, '2012-10-15 15:16:26.746', 'admin', 'admin', '2012-10-15 15:16:26.746');
INSERT INTO account VALUES (17, '114', 'PIUTANG DAGANG', 'D', 7, 3, '2012-10-16 16:59:56.919', 'admin', 'admin', '2012-10-16 16:59:56.919');
INSERT INTO account VALUES (18, '41', 'PENDAPATAN USAHA', 'D', 4, 2, '2012-10-18 09:00:15.288', 'admin', 'admin', '2012-10-18 09:00:15.288');
INSERT INTO account VALUES (19, '411', 'PENJUALAN', 'D', 18, 3, '2012-10-18 09:01:04.936', 'admin', 'admin', '2012-10-18 09:01:04.936');
INSERT INTO account VALUES (20, '412', 'DISC PENJUALAN', 'D', 18, 3, '2012-10-18 09:01:29.282', 'admin', 'admin', '2012-10-18 09:01:29.282');
INSERT INTO account VALUES (21, '413', 'RETUR PENJUALAN', 'D', 18, 3, '2012-10-18 09:01:49.016', 'admin', 'admin', '2012-10-18 09:01:49.016');
INSERT INTO account VALUES (22, '42', 'PENDAPATAN LAIN-LAIN', 'D', 4, 2, '2012-10-18 09:08:20.716', 'admin', 'admin', '2012-10-18 09:08:20.716');
INSERT INTO account VALUES (23, '51', 'HARGA POKOK PENJUALAN', 'K', 5, 2, '2012-10-18 09:14:39.717', 'admin', 'admin', '2012-10-18 09:14:39.717');
INSERT INTO account VALUES (24, '511', 'HARGA POKOK PENJUALAN', 'K', 23, 3, '2012-10-18 09:15:02.509', 'admin', 'admin', '2012-10-18 09:15:02.509');
INSERT INTO account VALUES (25, '212', 'PPN KELUARAN', 'K', 12, 3, '2012-10-29 08:23:32.851', 'admin', 'admin', '2012-10-29 08:23:32.851');


--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO category VALUES (1, '01', '2012-10-30 09:50:31.385161', 'Minuman', 0, '2012-10-30 09:50:31.385161', 0);
INSERT INTO category VALUES (2, '02', '2012-10-30 09:50:37.700822', 'Cosmetics', 0, '2012-10-30 09:50:37.700822', 0);
INSERT INTO category VALUES (3, '03', '2012-10-30 09:50:44.266888', 'Makanan Ringan', 0, '2012-10-30 09:50:44.266888', 0);


--
-- Data for Name: warehouse; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO warehouse VALUES (1, 'AQ1', 'Gdg Aqua By-Pass', '2012-10-30 10:08:34.459167', 0, 0, '2012-10-30 10:08:34.459167');


--
-- Data for Name: locator; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO locator VALUES (1, 1, 'B1', 'Blok 1', 'Blok 1 sebelah pintu masuk', 0, 0, NULL, 0, 0, '2012-10-30 10:09:19.780057', '2012-10-30 10:09:19.780057');


--
-- Data for Name: greceipt_hdr; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO greceipt_hdr VALUES (47, '1112053555', 1, 1, 1, 1, 'komeng gan..', 1, NULL, '1112053555', '2012-11-06', '2012-11-06 17:35:55.13083', 0, 0, '2012-11-06 17:35:55.13083');


--
-- Data for Name: groups; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO groups VALUES (1, 'AQ', 'Aqua Principal', 0, '2012-10-30 09:50:05.518176', '2012-10-30 09:50:05.518176', 0);
INSERT INTO groups VALUES (2, 'MX', 'Mix Principal', 0, '2012-10-30 09:50:13.783725', '2012-10-30 09:50:13.783725', 0);


--
-- Data for Name: manufacturer; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO manufacturer VALUES (1, 'AQ', 'Danone Aqua', 0, '2012-10-30 09:49:51.417471', 0, '2012-10-30 09:49:51.417471');


--
-- Data for Name: uoms; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO uoms VALUES (1, 'EA', 0, 'Each', '2012-10-30 09:51:00.615922', '2012-10-30 09:51:00.615922', 0);
INSERT INTO uoms VALUES (2, 'PCS', 0, 'Peaces', '2012-10-30 09:51:18.611816', '2012-10-30 09:51:18.611816', 0);


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO product VALUES (1, '0123456789012', 'Aqua Galon', 1, 1, 1, 1, '2012-10-30 09:52:25.812905', 0, '2012-10-30 09:52:25.812905', 0);
INSERT INTO product VALUES (2, '0123456789013', 'Aqua Karton @48gls', 1, 1, 1, 1, '2012-10-30 09:53:27.458247', 0, '2012-10-30 09:53:27.458247', 0);


--
-- Data for Name: greceipt_line; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO greceipt_line VALUES (19, 47, 1, 1200, 1, 0, 0, 10, 750, 7500, '2012-11-06 17:35:55.13083', 0, '2012-11-06 17:35:55.13083', 0);


--
-- Data for Name: batch; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: organization; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO organization VALUES (1, '01', 0, 'PT. AWS Padang', '2012-10-30 09:48:57.500223', 0, '2012-10-30 09:48:57.500223');


--
-- Data for Name: branch; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO branch VALUES (1, 'PDG1', 'Padang ByPass', 1, '2012-10-30 09:49:19.473942', '2012-10-30 09:49:19.473942', 0, 0);


--
-- Data for Name: tbl_user; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO tbl_user VALUES (1, 'guest', 'guest', 'email@guest.com');
INSERT INTO tbl_user VALUES (2, 'admin', 'admin', 'admin@admin.com');
INSERT INTO tbl_user VALUES (3, 'demo', 'demo', 'demo@gmail.com');


--
-- Data for Name: branch_access; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: cogs; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO cogs VALUES (5, 1, 1, 1, 7500, 0, 0, '2012-11-06 17:27:19.637976', '2012-11-06 17:35:55.13083');


--
-- Data for Name: customer_class; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: customer_type; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: customers; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: districs; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: customer_detail; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: customer_limitation; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: gissue_hdr; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: gissue_line; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: gl_header; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO gl_header VALUES (10, 1, 1, '1', '2012-05-10', '1', '1', '2012-10-05 17:38:36.651', '2012-10-05 17:38:36.651', 'admin', 'admin');
INSERT INTO gl_header VALUES (13, 1, 2, '124', '2012-10-29', 'PENJUALAN', 'test', '2012-10-29 20:44:50.28684', '2012-10-29 20:44:50.28684', 'admin', 'admin');


--
-- Data for Name: gl_detail; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO gl_detail VALUES (14, 13, 17, 20000000, 0, '2012-10-29 20:44:50.28684', 'admin', 'admin', '2012-10-29 20:44:50.28684');
INSERT INTO gl_detail VALUES (15, 13, 19, 0, 50000000, '2012-10-29 20:44:50.28684', 'admin', 'admin', '2012-10-29 20:44:50.28684');
INSERT INTO gl_detail VALUES (16, 13, 24, 30000000, 0, '2012-10-29 20:44:50.28684', 'admin', 'admin', '2012-10-29 20:44:50.28684');
INSERT INTO gl_detail VALUES (17, 13, 16, 0, 30000000, '2012-10-29 20:44:50.28684', 'admin', 'admin', '2012-10-29 20:44:50.28684');
INSERT INTO gl_detail VALUES (18, 13, 20, 0, 0, '2012-10-29 20:44:50.28684', 'admin', 'admin', '2012-10-29 20:44:50.28684');
INSERT INTO gl_detail VALUES (19, 13, 25, 0, 5000000, '2012-10-29 20:44:50.28684', 'admin', 'admin', '2012-10-29 20:44:50.28684');


--
-- Data for Name: sal_order; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: sal_delivery; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: sal_shipment; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: gshp_line; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: mapping_coa; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO mapping_coa VALUES (2, 'PENJUALAN', 'PIUTANG', 17, 'D', '2012-10-20 15:50:00.987', 'admin', 'admin', '2012-10-20 15:50:00.987');
INSERT INTO mapping_coa VALUES (3, 'PENJUALAN', 'PENJUALAN', 19, 'K', '2012-10-20 15:50:00.987', 'admin', 'admin', '2012-10-20 15:50:00.987');
INSERT INTO mapping_coa VALUES (4, 'PENJUALAN', 'HPP', 24, 'D', '2012-10-20 15:50:00.987', 'admin', 'admin', '2012-10-20 15:50:00.987');
INSERT INTO mapping_coa VALUES (5, 'PENJUALAN', 'PERSEDIAAN', 16, 'K', '2012-10-20 15:50:00.987', 'admin', 'admin', '2012-10-20 15:50:00.987');
INSERT INTO mapping_coa VALUES (6, 'PEMBELIAN', 'PERSEDIAAN', 16, 'D', '2012-10-20 15:50:00.987', 'admin', 'admin', '2012-10-20 15:50:00.987');
INSERT INTO mapping_coa VALUES (9, 'PEMBELIAN', 'HUTANG', 13, 'K', '2012-10-20 15:50:00.987', 'admin', 'admin', '2012-10-20 15:50:00.987');
INSERT INTO mapping_coa VALUES (10, 'PENJUALAN', 'DISKONJUAL', 20, 'D', '2012-10-29 08:14:40.097', 'admin', 'admin', '2012-10-29 08:14:40.097');
INSERT INTO mapping_coa VALUES (11, 'PENJUALAN', 'PPNJUAL', 25, 'K', '2012-10-29 08:25:22.253', 'admin', 'admin', '2012-10-29 08:25:22.253');


--
-- Data for Name: mv_history; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO mv_history VALUES (26, 1, 1, 1, 1, 1200, -1, 1200, -1, 'Good Receipt', '', '1112053555', '2012-11-06 17:35:55.13083', 0, 0, '2012-11-06 17:35:55.13083');


--
-- Data for Name: podelivery_hdr; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO podelivery_hdr VALUES (67, '1112053555', 1, 1, 1, 'New delivery of Aqua', NULL, '1112053555', '', 1, 0, '2012-11-06 17:35:55.13083', '2012-11-06 17:35:55.13083', 0);


--
-- Data for Name: podelivery_line; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO podelivery_line VALUES (16, 67, 1, 1, 1200, 7500, 10, 900000, 0, 0, 0, '2012-11-06 17:35:55.13083', '2012-11-06 17:35:55.13083', 0);


--
-- Data for Name: poinvoice_hdr; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: poinvoice_payment; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: porder_hdr; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: porder_line; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: price_cat; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: price; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: sal_invoice; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: sal_request; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: sdelivery_line; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: sinvoice_payment; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: sorder_line; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: srequest_line; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: stock_transfer; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: suppliers; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO suppliers VALUES (1, 'S01', 'AWS Group', '2012-10-30 09:49:35.086268', 0, '2012-10-30 09:49:35.086268', 0);
INSERT INTO suppliers VALUES (2, 'S02', 'SangkilSoft Corp.', '2012-11-04 06:34:42.139607', 0, '2012-11-04 06:34:42.139607', 0);


--
-- Data for Name: supply_list; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--



--
-- Data for Name: tbl_menu; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO tbl_menu VALUES (1, NULL, 'Home', '/site/index', 0);
INSERT INTO tbl_menu VALUES (3, NULL, 'Login', '/site/login', 1001);
INSERT INTO tbl_menu VALUES (8, NULL, 'Accounting', '/accounting', 6);
INSERT INTO tbl_menu VALUES (7, NULL, 'Sales', '/sales', 5);
INSERT INTO tbl_menu VALUES (11, 9, 'Roles', '/role/admin', 93);
INSERT INTO tbl_menu VALUES (10, 9, 'Menus', '/menu/admin', 91);
INSERT INTO tbl_menu VALUES (12, 9, 'Users', '/user/admin', 92);
INSERT INTO tbl_menu VALUES (13, 9, 'Menus Role', '/roleMenu/admin', 94);
INSERT INTO tbl_menu VALUES (14, 9, 'Users Role', '/userRole/admin', 95);
INSERT INTO tbl_menu VALUES (15, 4, 'Product', '/product/admin', 43);
INSERT INTO tbl_menu VALUES (22, 15, 'Supply List', '/supplylist/admin', 46);
INSERT INTO tbl_menu VALUES (19, 4, 'Supplier', '/suppliers/admin', 41);
INSERT INTO tbl_menu VALUES (31, 6, 'Good Movement', '', 63);
INSERT INTO tbl_menu VALUES (4, NULL, 'Data Master', '', 2);
INSERT INTO tbl_menu VALUES (9, NULL, 'Sys Admin', '', 1);
INSERT INTO tbl_menu VALUES (2, NULL, 'Logout', '/site/logout', 1000);
INSERT INTO tbl_menu VALUES (6, NULL, 'Inventory', '', 4);
INSERT INTO tbl_menu VALUES (38, 9, 'Structure', '', 90);
INSERT INTO tbl_menu VALUES (39, 38, 'Organization', '/organization/admin', 901);
INSERT INTO tbl_menu VALUES (40, 38, 'Branch', '/branch/admin', 902);
INSERT INTO tbl_menu VALUES (37, 5, 'Purchase Delivery', '/podeliveryHdr/admin', 52);
INSERT INTO tbl_menu VALUES (36, 5, 'Purchase Order', '/purchaseOrder/admin', 51);
INSERT INTO tbl_menu VALUES (21, 15, 'Uoms', '/uoms/admin', 45);
INSERT INTO tbl_menu VALUES (16, 15, 'Manufacturer', '/manufacturer/admin', 42);
INSERT INTO tbl_menu VALUES (17, 15, 'Groups/Principals', '/groups/admin', 43);
INSERT INTO tbl_menu VALUES (18, 15, 'Categories', '/category/admin', 44);
INSERT INTO tbl_menu VALUES (5, 6, 'Purchasing', '', 3);
INSERT INTO tbl_menu VALUES (41, 5, 'Purchase Invoice', '/poinvoiceHdr/admin', 53);
INSERT INTO tbl_menu VALUES (44, 31, 'Location Transfer', '', 634);
INSERT INTO tbl_menu VALUES (34, 31, 'Movement History', '/mvHistory/admin', 636);
INSERT INTO tbl_menu VALUES (49, 7, 'Transaction', '', 71);
INSERT INTO tbl_menu VALUES (50, 7, 'Analysis Tools', '', 72);
INSERT INTO tbl_menu VALUES (48, 7, 'Setup', '', 73);
INSERT INTO tbl_menu VALUES (45, 49, 'Sales Request', '/sales/salRequest', 491);
INSERT INTO tbl_menu VALUES (47, 49, 'Sales Delivery', '/sales/delivery', 493);
INSERT INTO tbl_menu VALUES (51, 49, 'Good Shipment', '/sales/shipment', 494);
INSERT INTO tbl_menu VALUES (23, 48, 'Customers', '/customers/admin', 481);
INSERT INTO tbl_menu VALUES (52, 48, 'Products Price', '', 482);
INSERT INTO tbl_menu VALUES (24, 48, 'Sales Districs', '/districs/admin', 480);
INSERT INTO tbl_menu VALUES (25, 23, 'Types', '/customerType/admin', 232);
INSERT INTO tbl_menu VALUES (26, 23, 'Classes', '/customerClass/admin', 233);
INSERT INTO tbl_menu VALUES (53, 23, 'Customer Details', '/customer/create', 234);
INSERT INTO tbl_menu VALUES (54, 6, 'Setup', '', 64);
INSERT INTO tbl_menu VALUES (29, 54, 'Warehouses', '/warehouse/admin', 541);
INSERT INTO tbl_menu VALUES (30, 54, 'Locators', '/locator/admin', 542);
INSERT INTO tbl_menu VALUES (55, 31, 'Canvas Loading', '', 314);
INSERT INTO tbl_menu VALUES (56, 31, 'Canvas Return', '', 315);
INSERT INTO tbl_menu VALUES (33, 31, 'Good Receipt', '/greceiptHdr/admin', 311);
INSERT INTO tbl_menu VALUES (32, 31, 'Good Issue', '/goodIssue/admin', 312);
INSERT INTO tbl_menu VALUES (43, 31, 'M2M Transfer', '', 313);
INSERT INTO tbl_menu VALUES (57, 7, 'Sales Journey', '', 70);
INSERT INTO tbl_menu VALUES (59, 57, 'Journey Monitoring', '', 572);
INSERT INTO tbl_menu VALUES (58, 57, 'Create Plan', '', 571);
INSERT INTO tbl_menu VALUES (60, 57, 'Effective Call', '', 573);
INSERT INTO tbl_menu VALUES (46, 49, 'Sales Order', '/sales/salesOrder', 492);


--
-- Data for Name: tbl_role; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO tbl_role VALUES (2, 'admin', 'Sys Admin');
INSERT INTO tbl_role VALUES (1, 'guest', 'Anonimous');


--
-- Data for Name: tbl_role_menu; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO tbl_role_menu VALUES (21, 1, 1);
INSERT INTO tbl_role_menu VALUES (23, 2, 2);
INSERT INTO tbl_role_menu VALUES (25, 2, 4);
INSERT INTO tbl_role_menu VALUES (27, 2, 6);
INSERT INTO tbl_role_menu VALUES (30, 2, 9);
INSERT INTO tbl_role_menu VALUES (31, 2, 10);
INSERT INTO tbl_role_menu VALUES (32, 2, 11);
INSERT INTO tbl_role_menu VALUES (33, 2, 12);
INSERT INTO tbl_role_menu VALUES (34, 2, 12);
INSERT INTO tbl_role_menu VALUES (35, 2, 13);
INSERT INTO tbl_role_menu VALUES (36, 2, 14);
INSERT INTO tbl_role_menu VALUES (37, 2, 15);
INSERT INTO tbl_role_menu VALUES (38, 2, 16);
INSERT INTO tbl_role_menu VALUES (39, 2, 17);
INSERT INTO tbl_role_menu VALUES (40, 2, 18);
INSERT INTO tbl_role_menu VALUES (41, 2, 19);
INSERT INTO tbl_role_menu VALUES (22, 1, 3);
INSERT INTO tbl_role_menu VALUES (42, 2, 1);
INSERT INTO tbl_role_menu VALUES (43, 2, 21);
INSERT INTO tbl_role_menu VALUES (44, 2, 22);
INSERT INTO tbl_role_menu VALUES (45, 2, 23);
INSERT INTO tbl_role_menu VALUES (46, 2, 24);
INSERT INTO tbl_role_menu VALUES (47, 2, 25);
INSERT INTO tbl_role_menu VALUES (48, 2, 26);
INSERT INTO tbl_role_menu VALUES (51, 2, 29);
INSERT INTO tbl_role_menu VALUES (52, 2, 30);
INSERT INTO tbl_role_menu VALUES (53, 2, 31);
INSERT INTO tbl_role_menu VALUES (54, 2, 32);
INSERT INTO tbl_role_menu VALUES (55, 2, 33);
INSERT INTO tbl_role_menu VALUES (56, 2, 34);
INSERT INTO tbl_role_menu VALUES (59, 2, 5);
INSERT INTO tbl_role_menu VALUES (61, 2, 37);
INSERT INTO tbl_role_menu VALUES (62, 2, 38);
INSERT INTO tbl_role_menu VALUES (63, 2, 39);
INSERT INTO tbl_role_menu VALUES (64, 2, 40);
INSERT INTO tbl_role_menu VALUES (65, 2, 41);
INSERT INTO tbl_role_menu VALUES (1, 2, 43);
INSERT INTO tbl_role_menu VALUES (3, 2, 7);
INSERT INTO tbl_role_menu VALUES (4, 2, 45);
INSERT INTO tbl_role_menu VALUES (5, 2, 46);
INSERT INTO tbl_role_menu VALUES (6, 2, 47);
INSERT INTO tbl_role_menu VALUES (7, 2, 48);
INSERT INTO tbl_role_menu VALUES (8, 2, 49);
INSERT INTO tbl_role_menu VALUES (9, 2, 50);
INSERT INTO tbl_role_menu VALUES (10, 2, 51);
INSERT INTO tbl_role_menu VALUES (11, 2, 52);
INSERT INTO tbl_role_menu VALUES (12, 2, 53);
INSERT INTO tbl_role_menu VALUES (13, 2, 54);
INSERT INTO tbl_role_menu VALUES (14, 2, 55);
INSERT INTO tbl_role_menu VALUES (15, 2, 56);
INSERT INTO tbl_role_menu VALUES (16, 2, 57);
INSERT INTO tbl_role_menu VALUES (17, 2, 58);
INSERT INTO tbl_role_menu VALUES (18, 2, 59);
INSERT INTO tbl_role_menu VALUES (19, 2, 60);


--
-- Data for Name: tbl_user_role; Type: TABLE DATA; Schema: public; Owner: sangkilsoft
--

INSERT INTO tbl_user_role VALUES (1, 1, 1);
INSERT INTO tbl_user_role VALUES (2, 2, 2);
INSERT INTO tbl_user_role VALUES (3, 3, 1);


--
-- PostgreSQL database dump complete
--

