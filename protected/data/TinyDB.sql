
CREATE TABLE public.gi_type (
                cd_gitype VARCHAR(4) NOT NULL,
                nm_type VARCHAR(32) NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT gi_type_pk PRIMARY KEY (cd_gitype)
);
COMMENT ON COLUMN public.gi_type.create_by IS 'id of user creator';
COMMENT ON COLUMN public.gi_type.update_by IS 'id of user creator';


CREATE TABLE public.good_issue (
                gi_num VARCHAR(32) NOT NULL,
                cd_gitype VARCHAR(4) NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT good_issue_pk PRIMARY KEY (gi_num)
);
COMMENT ON COLUMN public.good_issue.create_by IS 'id of user creator';
COMMENT ON COLUMN public.good_issue.update_by IS 'id of user creator';


CREATE TABLE public.gr_type (
                cd_grtype VARCHAR(4) NOT NULL,
                nm_type VARCHAR(32) NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT gr_type_pk PRIMARY KEY (cd_grtype)
);
COMMENT ON COLUMN public.gr_type.update_by IS 'id of user creator';
COMMENT ON COLUMN public.gr_type.create_by IS 'id of user creator';


CREATE TABLE public.good_receipt (
                gr_num VARCHAR(16) NOT NULL,
                cd_grtype VARCHAR(4) NOT NULL,
                ref_num VARCHAR(16) NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT good_receipt_pk PRIMARY KEY (gr_num)
);
COMMENT ON COLUMN public.good_receipt.update_by IS 'id of user creator';
COMMENT ON COLUMN public.good_receipt.create_by IS 'id of user creator';


CREATE TABLE public.vehicle_master (
                cd_vmaster VARCHAR(4) NOT NULL,
                nopol VARCHAR(10) NOT NULL,
                stnk VARCHAR(32) NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT vehicle_master_pk PRIMARY KEY (cd_vmaster)
);
COMMENT ON COLUMN public.vehicle_master.create_by IS 'id of user creator';
COMMENT ON COLUMN public.vehicle_master.update_by IS 'id of user creator';


CREATE TABLE public.groups (
                cd_group VARCHAR(4) NOT NULL,
                update_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT groups_pk PRIMARY KEY (cd_group)
);
COMMENT ON TABLE public.groups IS 'acomadate principal on AWS Group';
COMMENT ON COLUMN public.groups.update_by IS 'id of user creator';
COMMENT ON COLUMN public.groups.create_by IS 'id of user creator';


CREATE TABLE public.users (
                id_user INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT users_pk PRIMARY KEY (id_user)
);
COMMENT ON COLUMN public.users.update_by IS 'id of user creator';
COMMENT ON COLUMN public.users.create_by IS 'id of user creator';


CREATE TABLE public.organization (
                cd_orgn VARCHAR(4) NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT organization_pk PRIMARY KEY (cd_orgn)
);
COMMENT ON COLUMN public.organization.update_by IS 'id of user creator';
COMMENT ON COLUMN public.organization.create_by IS 'id of user creator';


CREATE TABLE public.branch (
                cd_branch VARCHAR(4) NOT NULL,
                cd_orgn VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT branch_pk PRIMARY KEY (cd_branch)
);
COMMENT ON COLUMN public.branch.update_by IS 'id of user creator';
COMMENT ON COLUMN public.branch.create_by IS 'id of user creator';


CREATE TABLE public.branch_access (
                id_user INTEGER NOT NULL,
                cd_branch VARCHAR(4) NOT NULL,
                description VARCHAR(64) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT branch_access_pk PRIMARY KEY (id_user, cd_branch)
);
COMMENT ON COLUMN public.branch_access.update_by IS 'id of user creator';
COMMENT ON COLUMN public.branch_access.create_by IS 'id of user creator';


CREATE TABLE public.Districs (
                cd_distric VARCHAR(4) NOT NULL,
                nm_distric VARCHAR(32) NOT NULL,
                description VARCHAR(64) NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT districs PRIMARY KEY (cd_distric)
);
COMMENT ON TABLE public.Districs IS 'represent market area';
COMMENT ON COLUMN public.Districs.create_by IS 'id of user creator';
COMMENT ON COLUMN public.Districs.update_by IS 'id of user creator';


CREATE TABLE public.Customer_Type (
                cd_ctype VARCHAR(4) NOT NULL,
                create_by INTEGER NOT NULL,
                nm_ctype VARCHAR(32) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT cust_type_pk PRIMARY KEY (cd_ctype)
);
COMMENT ON TABLE public.Customer_Type IS 'warung, mini_market, super_market, dll.';
COMMENT ON COLUMN public.Customer_Type.create_by IS 'id of user creator';
COMMENT ON COLUMN public.Customer_Type.update_by IS 'id of user creator';


CREATE TABLE public.Customer_Class (
                cd_cclass VARCHAR(4) NOT NULL,
                nm_cclass VARCHAR(32) NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT cust_class_pk PRIMARY KEY (cd_cclass)
);
COMMENT ON TABLE public.Customer_Class IS 'represent Modern Trade (MT), General Trade (GT), Traditional Trade (TT)';
COMMENT ON COLUMN public.Customer_Class.cd_cclass IS 'GT/MT';
COMMENT ON COLUMN public.Customer_Class.create_by IS 'id of user creator';
COMMENT ON COLUMN public.Customer_Class.update_by IS 'id of user creator';


CREATE TABLE public.customers (
                cd_cust VARCHAR(4) NOT NULL,
                nm_cust VARCHAR(64) NOT NULL,
                cd_cclass VARCHAR(4) NOT NULL,
                cd_ctype VARCHAR(4) NOT NULL,
                contact_name VARCHAR(32),
                contact_number VARCHAR(16),
                status SMALLINT NOT NULL,
                latitude REAL NOT NULL,
                longtitude REAL NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT customers_pk PRIMARY KEY (cd_cust)
);
COMMENT ON COLUMN public.customers.cd_cclass IS 'GT/MT';
COMMENT ON COLUMN public.customers.status IS 'active (1) , inactive(0), delete(-1)';
COMMENT ON COLUMN public.customers.create_by IS 'id of user creator';
COMMENT ON COLUMN public.customers.update_by IS 'id of user creator';


CREATE TABLE public.cust_limit (
                cd_cust VARCHAR(4) NOT NULL,
                multi_invoice SMALLINT NOT NULL,
                credit_limit REAL NOT NULL,
                blocked SMALLINT NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT cust_limit_pk PRIMARY KEY (cd_cust)
);
COMMENT ON COLUMN public.cust_limit.create_by IS 'id of user creator';
COMMENT ON COLUMN public.cust_limit.update_by IS 'id of user creator';


CREATE TABLE public.po_customer (
                po_num VARCHAR(16) NOT NULL,
                cd_cust VARCHAR(4) NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                CONSTRAINT po_customer_pk PRIMARY KEY (po_num)
);
COMMENT ON COLUMN public.po_customer.update_by IS 'id of user creator';
COMMENT ON COLUMN public.po_customer.create_by IS 'id of user creator';


CREATE TABLE public.Kecamatan (
                cd_kec VARCHAR(4) NOT NULL,
                cd_distric VARCHAR(4) NOT NULL,
                nm_kec VARCHAR(32) NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT kecamatan_pk PRIMARY KEY (cd_kec)
);
COMMENT ON COLUMN public.Kecamatan.create_by IS 'id of user creator';
COMMENT ON COLUMN public.Kecamatan.update_by IS 'id of user creator';


CREATE TABLE public.customer_dtl (
                cd_cust VARCHAR(4) NOT NULL,
                address2 VARCHAR(64),
                cd_distric VARCHAR(4) NOT NULL,
                cd_kec VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT customer_dtl_pk PRIMARY KEY (cd_cust)
);
COMMENT ON COLUMN public.customer_dtl.create_by IS 'id of user creator';
COMMENT ON COLUMN public.customer_dtl.update_by IS 'id of user creator';


CREATE TABLE public.sales_order (
                so_num VARCHAR(16) NOT NULL,
                po_num VARCHAR(16),
                cd_cust VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT sales_order_pk PRIMARY KEY (so_num)
);
COMMENT ON COLUMN public.sales_order.create_by IS 'id of user creator';
COMMENT ON COLUMN public.sales_order.update_by IS 'id of user creator';


CREATE TABLE public.so_invoice (
                invoice_num VARCHAR(16) NOT NULL,
                so_num VARCHAR(16),
                gi_num VARCHAR(32) NOT NULL,
                invoice_val REAL NOT NULL,
                paid_val REAL NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT so_invoice_pk PRIMARY KEY (invoice_num)
);
COMMENT ON COLUMN public.so_invoice.update_by IS 'id of user creator';
COMMENT ON COLUMN public.so_invoice.create_by IS 'id of user creator';


CREATE TABLE public.so_payment (
                invoice_num VARCHAR(16) NOT NULL,
                line_num INTEGER NOT NULL,
                payment_val REAL NOT NULL,
                ref_num VARCHAR(16) NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT so_payment_pk PRIMARY KEY (invoice_num, line_num)
);
COMMENT ON COLUMN public.so_payment.create_by IS 'id of user creator';
COMMENT ON COLUMN public.so_payment.update_by IS 'id of user creator';


CREATE TABLE public.do_sales (
                do_num VARCHAR(16) NOT NULL,
                so_num VARCHAR(16),
                schedule_date TIMESTAMP NOT NULL,
                shp_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                CONSTRAINT do_sales_pk PRIMARY KEY (do_num)
);
COMMENT ON COLUMN public.do_sales.create_by IS 'id of user creator';
COMMENT ON COLUMN public.do_sales.update_by IS 'id of user creator';


CREATE TABLE public.warehouse (
                cd_whse VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT warehouse_pk PRIMARY KEY (cd_whse)
);
COMMENT ON COLUMN public.warehouse.create_by IS 'id of user creator';
COMMENT ON COLUMN public.warehouse.update_by IS 'id of user creator';


CREATE TABLE public.shipment (
                shp_num VARCHAR(16) NOT NULL,
                cd_whse VARCHAR(4) NOT NULL,
                cd_vmaster VARCHAR(4) NOT NULL,
                supir VARCHAR(32) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT shipment_pk PRIMARY KEY (shp_num)
);
COMMENT ON COLUMN public.shipment.update_by IS 'id of user creator';
COMMENT ON COLUMN public.shipment.create_by IS 'id of user creator';


CREATE TABLE public.inv_transfer (
                itrans_num VARCHAR(16) NOT NULL,
                cd_whse VARCHAR(4) NOT NULL,
                to_whse VARCHAR(4) NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT inv_transfer_pk PRIMARY KEY (itrans_num)
);
COMMENT ON COLUMN public.inv_transfer.update_by IS 'id of user creator';
COMMENT ON COLUMN public.inv_transfer.create_by IS 'id of user creator';


CREATE TABLE public.locator (
                cd_loctr VARCHAR(4) NOT NULL,
                cd_whse VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT locator_pk PRIMARY KEY (cd_loctr)
);
COMMENT ON COLUMN public.locator.create_by IS 'id of user creator';
COMMENT ON COLUMN public.locator.update_by IS 'id of user creator';


CREATE TABLE public.supplier (
                cd_supplier VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT supplier_pk PRIMARY KEY (cd_supplier)
);
COMMENT ON COLUMN public.supplier.create_by IS 'id of user creator';
COMMENT ON COLUMN public.supplier.update_by IS 'id of user creator';


CREATE TABLE public.purchase_order (
                po_num VARCHAR(16) NOT NULL,
                cd_supplier VARCHAR(4) NOT NULL,
                cd_whse VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT purchase_order_pk PRIMARY KEY (po_num)
);
COMMENT ON TABLE public.purchase_order IS 'header of PO';
COMMENT ON COLUMN public.purchase_order.create_by IS 'id of user creator';
COMMENT ON COLUMN public.purchase_order.update_by IS 'id of user creator';


CREATE TABLE public.po_invoice (
                invoice_num VARCHAR(16) NOT NULL,
                po_num VARCHAR(16),
                gr_num VARCHAR(16),
                invoice_val REAL NOT NULL,
                paid_val REAL NOT NULL,
                status SMALLINT NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT po_invoice_pk PRIMARY KEY (invoice_num)
);
COMMENT ON COLUMN public.po_invoice.update_by IS 'id of user creator';
COMMENT ON COLUMN public.po_invoice.create_by IS 'id of user creator';


CREATE TABLE public.po_payment (
                invoice_num VARCHAR(16) NOT NULL,
                line_num INTEGER NOT NULL,
                payment_val REAL NOT NULL,
                ref_num VARCHAR(16) NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT po_payment_pk PRIMARY KEY (invoice_num, line_num)
);
COMMENT ON COLUMN public.po_payment.create_by IS 'id of user creator';
COMMENT ON COLUMN public.po_payment.update_by IS 'id of user creator';


CREATE TABLE public.manufacturer (
                cd_manf VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT manufacturer_pk PRIMARY KEY (cd_manf)
);
COMMENT ON COLUMN public.manufacturer.create_by IS 'id of user creator';
COMMENT ON COLUMN public.manufacturer.update_by IS 'id of user creator';


CREATE TABLE public.p_category (
                cd_category VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT p_category_pk PRIMARY KEY (cd_category)
);
COMMENT ON COLUMN public.p_category.create_by IS 'id of user creator';
COMMENT ON COLUMN public.p_category.update_by IS 'id of user creator';


CREATE TABLE public.product (
                product_num VARCHAR(13) NOT NULL,
                cd_category VARCHAR(4) NOT NULL,
                cd_manf VARCHAR(4) NOT NULL,
                cd_group VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT product_pk PRIMARY KEY (product_num)
);
COMMENT ON TABLE public.product IS 'details of product';
COMMENT ON COLUMN public.product.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.product.create_by IS 'id of user creator';
COMMENT ON COLUMN public.product.update_by IS 'id of user creator';


CREATE TABLE public.gi_line (
                gi_num VARCHAR(32) NOT NULL,
                line_num INTEGER NOT NULL,
                product_num VARCHAR(13) NOT NULL,
                qty REAL NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT gi_line_pk PRIMARY KEY (gi_num, line_num)
);
COMMENT ON COLUMN public.gi_line.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.gi_line.update_by IS 'id of user creator';
COMMENT ON COLUMN public.gi_line.create_by IS 'id of user creator';


CREATE TABLE public.gr_line (
                lime_num INTEGER NOT NULL,
                gr_num VARCHAR(16) NOT NULL,
                product_num VARCHAR(13) NOT NULL,
                qty REAL NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT gr_line_pk PRIMARY KEY (lime_num, gr_num)
);
COMMENT ON COLUMN public.gr_line.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.gr_line.update_by IS 'id of user creator';
COMMENT ON COLUMN public.gr_line.create_by IS 'id of user creator';


CREATE TABLE public.do_sales_line (
                do_num VARCHAR(16) NOT NULL,
                line_num INTEGER NOT NULL,
                product_num VARCHAR(13) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT do_sales_line_pk PRIMARY KEY (do_num, line_num)
);
COMMENT ON COLUMN public.do_sales_line.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.do_sales_line.update_by IS 'id of user creator';
COMMENT ON COLUMN public.do_sales_line.create_by IS 'id of user creator';


CREATE TABLE public.shp_line (
                shp_num VARCHAR(16) NOT NULL,
                do_num VARCHAR(16) NOT NULL,
                line_num INTEGER NOT NULL,
                qty REAL NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT shp_line_pk PRIMARY KEY (shp_num)
);
COMMENT ON COLUMN public.shp_line.update_by IS 'id of user creator';
COMMENT ON COLUMN public.shp_line.create_by IS 'id of user creator';


CREATE TABLE public.po_cust_line (
                po_num VARCHAR(16) NOT NULL,
                line_num INTEGER NOT NULL,
                product_num VARCHAR(13) NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT po_cust_line_pk PRIMARY KEY (po_num, line_num)
);
COMMENT ON COLUMN public.po_cust_line.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.po_cust_line.create_by IS 'id of user creator';
COMMENT ON COLUMN public.po_cust_line.update_by IS 'id of user creator';


CREATE TABLE public.it_line_items (
                itrans_num VARCHAR(16) NOT NULL,
                line_num INTEGER NOT NULL,
                product_num VARCHAR(13) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT it_line_items_pk PRIMARY KEY (itrans_num, line_num)
);
COMMENT ON COLUMN public.it_line_items.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.it_line_items.update_by IS 'id of user creator';
COMMENT ON COLUMN public.it_line_items.create_by IS 'id of user creator';


CREATE TABLE public.so_line_items (
                so_num VARCHAR(16) NOT NULL,
                line_num INTEGER NOT NULL,
                product_num VARCHAR(13) NOT NULL,
                qty DOUBLE PRECISION NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT so_line_items_pk PRIMARY KEY (so_num, line_num)
);
COMMENT ON COLUMN public.so_line_items.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.so_line_items.create_by IS 'id of user creator';
COMMENT ON COLUMN public.so_line_items.update_by IS 'id of user creator';


CREATE TABLE public.inventory (
                product_num VARCHAR(13) NOT NULL,
                cd_loctr VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                qty DOUBLE PRECISION NOT NULL,
                CONSTRAINT inventory_pk PRIMARY KEY (product_num, cd_loctr)
);
COMMENT ON COLUMN public.inventory.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.inventory.create_by IS 'id of user creator';
COMMENT ON COLUMN public.inventory.update_by IS 'id of user creator';


CREATE TABLE public.po_line_items (
                po_num VARCHAR(16) NOT NULL,
                line_num INTEGER NOT NULL,
                product_num VARCHAR(13) NOT NULL,
                qty DOUBLE PRECISION NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT po_line_items_pk PRIMARY KEY (po_num, line_num)
);
COMMENT ON COLUMN public.po_line_items.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.po_line_items.create_by IS 'id of user creator';
COMMENT ON COLUMN public.po_line_items.update_by IS 'id of user creator';


CREATE TABLE public.supply_list (
                cd_supplier VARCHAR(4) NOT NULL,
                product_num VARCHAR(13) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT supply_list_pk PRIMARY KEY (cd_supplier, product_num)
);
COMMENT ON COLUMN public.supply_list.product_num IS 'product number eg.barcode label';
COMMENT ON COLUMN public.supply_list.create_by IS 'id of user creator';
COMMENT ON COLUMN public.supply_list.update_by IS 'id of user creator';


ALTER TABLE public.good_issue ADD CONSTRAINT gi_type_good_issue_fk
FOREIGN KEY (cd_gitype)
REFERENCES public.gi_type (cd_gitype)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.gi_line ADD CONSTRAINT good_issue_gi_line_fk
FOREIGN KEY (gi_num)
REFERENCES public.good_issue (gi_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.so_invoice ADD CONSTRAINT good_issue_so_invoice_fk
FOREIGN KEY (gi_num)
REFERENCES public.good_issue (gi_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.good_receipt ADD CONSTRAINT gr_type_good_receipt_fk
FOREIGN KEY (cd_grtype)
REFERENCES public.gr_type (cd_grtype)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.gr_line ADD CONSTRAINT good_receipt_gr_line_fk
FOREIGN KEY (gr_num)
REFERENCES public.good_receipt (gr_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.po_invoice ADD CONSTRAINT good_receipt_po_invoice_fk
FOREIGN KEY (gr_num)
REFERENCES public.good_receipt (gr_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.shipment ADD CONSTRAINT vehicle_master_shipment_fk
FOREIGN KEY (cd_vmaster)
REFERENCES public.vehicle_master (cd_vmaster)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.product ADD CONSTRAINT groups_product_fk
FOREIGN KEY (cd_group)
REFERENCES public.groups (cd_group)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.branch_access ADD CONSTRAINT users_branch_access_fk
FOREIGN KEY (id_user)
REFERENCES public.users (id_user)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.branch ADD CONSTRAINT organization_branch_fk
FOREIGN KEY (cd_orgn)
REFERENCES public.organization (cd_orgn)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.branch_access ADD CONSTRAINT branch_branch_access_fk
FOREIGN KEY (cd_branch)
REFERENCES public.branch (cd_branch)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Kecamatan ADD CONSTRAINT districs_kecamatan_fk
FOREIGN KEY (cd_distric)
REFERENCES public.Districs (cd_distric)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customer_dtl ADD CONSTRAINT districs_customer_dtl_fk
FOREIGN KEY (cd_distric)
REFERENCES public.Districs (cd_distric)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customers ADD CONSTRAINT customer_type_customers_fk
FOREIGN KEY (cd_ctype)
REFERENCES public.Customer_Type (cd_ctype)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customers ADD CONSTRAINT customer_class_customers_fk
FOREIGN KEY (cd_cclass)
REFERENCES public.Customer_Class (cd_cclass)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.sales_order ADD CONSTRAINT customers_sales_order_fk
FOREIGN KEY (cd_cust)
REFERENCES public.customers (cd_cust)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.po_customer ADD CONSTRAINT customers_po_customer_fk
FOREIGN KEY (cd_cust)
REFERENCES public.customers (cd_cust)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customer_dtl ADD CONSTRAINT customers_customer_dtl_fk
FOREIGN KEY (cd_cust)
REFERENCES public.customers (cd_cust)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.cust_limit ADD CONSTRAINT customers_cust_limit_fk
FOREIGN KEY (cd_cust)
REFERENCES public.customers (cd_cust)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.po_cust_line ADD CONSTRAINT po_customer_po_cust_line_fk
FOREIGN KEY (po_num)
REFERENCES public.po_customer (po_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.sales_order ADD CONSTRAINT po_customer_sales_order_fk
FOREIGN KEY (po_num)
REFERENCES public.po_customer (po_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customer_dtl ADD CONSTRAINT kecamatan_customer_dtl_fk
FOREIGN KEY (cd_kec)
REFERENCES public.Kecamatan (cd_kec)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.so_line_items ADD CONSTRAINT sales_order_so_line_items_fk
FOREIGN KEY (so_num)
REFERENCES public.sales_order (so_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.do_sales ADD CONSTRAINT sales_order_do_sales_fk
FOREIGN KEY (so_num)
REFERENCES public.sales_order (so_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.so_invoice ADD CONSTRAINT sales_order_so_invoice_fk
FOREIGN KEY (so_num)
REFERENCES public.sales_order (so_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.so_payment ADD CONSTRAINT so_invoice_so_payment_fk
FOREIGN KEY (invoice_num)
REFERENCES public.so_invoice (invoice_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.do_sales_line ADD CONSTRAINT do_sales_do_sales_line_fk
FOREIGN KEY (do_num)
REFERENCES public.do_sales (do_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.purchase_order ADD CONSTRAINT warehouse_purchase_order_fk
FOREIGN KEY (cd_whse)
REFERENCES public.warehouse (cd_whse)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.locator ADD CONSTRAINT warehouse_locator_fk
FOREIGN KEY (cd_whse)
REFERENCES public.warehouse (cd_whse)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.inv_transfer ADD CONSTRAINT warehouse_inv_transfer_fk
FOREIGN KEY (cd_whse)
REFERENCES public.warehouse (cd_whse)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.inv_transfer ADD CONSTRAINT warehouse_inv_transfer_fk1
FOREIGN KEY (to_whse)
REFERENCES public.warehouse (cd_whse)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.shipment ADD CONSTRAINT warehouse_shipment_fk
FOREIGN KEY (cd_whse)
REFERENCES public.warehouse (cd_whse)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.shp_line ADD CONSTRAINT shipment_shp_line_fk
FOREIGN KEY (shp_num)
REFERENCES public.shipment (shp_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.it_line_items ADD CONSTRAINT inv_transfer_it_line_items_fk
FOREIGN KEY (itrans_num)
REFERENCES public.inv_transfer (itrans_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.inventory ADD CONSTRAINT locator_inventory_fk
FOREIGN KEY (cd_loctr)
REFERENCES public.locator (cd_loctr)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.supply_list ADD CONSTRAINT supplier_supply_list_fk
FOREIGN KEY (cd_supplier)
REFERENCES public.supplier (cd_supplier)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.purchase_order ADD CONSTRAINT supplier_purchase_order_fk
FOREIGN KEY (cd_supplier)
REFERENCES public.supplier (cd_supplier)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.po_line_items ADD CONSTRAINT purchase_order_po_line_items_fk
FOREIGN KEY (po_num)
REFERENCES public.purchase_order (po_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.po_invoice ADD CONSTRAINT purchase_order_po_invoice_fk
FOREIGN KEY (po_num)
REFERENCES public.purchase_order (po_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.po_payment ADD CONSTRAINT po_invoice_po_payment_fk
FOREIGN KEY (invoice_num)
REFERENCES public.po_invoice (invoice_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.product ADD CONSTRAINT manufacturer_product_fk
FOREIGN KEY (cd_manf)
REFERENCES public.manufacturer (cd_manf)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.product ADD CONSTRAINT p_category_product_fk
FOREIGN KEY (cd_category)
REFERENCES public.p_category (cd_category)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.supply_list ADD CONSTRAINT product_supply_list_fk
FOREIGN KEY (product_num)
REFERENCES public.product (product_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.po_line_items ADD CONSTRAINT product_po_line_items_fk
FOREIGN KEY (product_num)
REFERENCES public.product (product_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.inventory ADD CONSTRAINT product_inventory_fk
FOREIGN KEY (product_num)
REFERENCES public.product (product_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.so_line_items ADD CONSTRAINT product_so_line_items_fk
FOREIGN KEY (product_num)
REFERENCES public.product (product_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.it_line_items ADD CONSTRAINT product_it_line_items_fk
FOREIGN KEY (product_num)
REFERENCES public.product (product_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.po_cust_line ADD CONSTRAINT product_po_cust_line_fk
FOREIGN KEY (product_num)
REFERENCES public.product (product_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.do_sales_line ADD CONSTRAINT product_do_sales_line_fk
FOREIGN KEY (product_num)
REFERENCES public.product (product_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.gr_line ADD CONSTRAINT product_gr_line_fk
FOREIGN KEY (product_num)
REFERENCES public.product (product_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.gi_line ADD CONSTRAINT product_gi_line_fk
FOREIGN KEY (product_num)
REFERENCES public.product (product_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.shp_line ADD CONSTRAINT do_sales_line_shp_line_fk
FOREIGN KEY (do_num, line_num)
REFERENCES public.do_sales_line (do_num, line_num)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
