
CREATE SEQUENCE public.price_cat_id_price_cat_seq_1;

CREATE TABLE public.price_cat (
                id_price_cat INTEGER NOT NULL DEFAULT nextval('public.price_cat_id_price_cat_seq_1'),
                description VARCHAR(64) NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT price_cat_pk PRIMARY KEY (id_price_cat)
);
COMMENT ON COLUMN public.price_cat.update_by IS 'id of user creator';
COMMENT ON COLUMN public.price_cat.create_by IS 'id of user creator';


ALTER SEQUENCE public.price_cat_id_price_cat_seq_1 OWNED BY public.price_cat.id_price_cat;

CREATE SEQUENCE public.stock_transfer_id_stransfer_seq;

CREATE SEQUENCE public.organization_id_orgn_seq_2_1;

CREATE SEQUENCE public.branch_id_branch_seq_1_2_1;

CREATE TABLE public.stock_transfer (
                id_stransfer INTEGER NOT NULL DEFAULT nextval('public.stock_transfer_id_stransfer_seq'),
                strans_num VARCHAR(13) NOT NULL,
                id_orgn INTEGER NOT NULL DEFAULT nextval('public.organization_id_orgn_seq_2_1'),
                id_warehouse INTEGER NOT NULL,
                id_branch INTEGER NOT NULL DEFAULT nextval('public.branch_id_branch_seq_1_2_1'),
                description VARCHAR(64) NOT NULL,
                ref_number VARCHAR(16),
                status SMALLINT NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT stock_transfer_pk PRIMARY KEY (id_stransfer)
);
COMMENT ON COLUMN public.stock_transfer.status IS 'delete (-1), inactive (0), active(1).';
COMMENT ON COLUMN public.stock_transfer.create_by IS 'id of user creator';
COMMENT ON COLUMN public.stock_transfer.update_by IS 'id of user creator';


ALTER SEQUENCE public.stock_transfer_id_stransfer_seq OWNED BY public.stock_transfer.id_stransfer;

ALTER SEQUENCE public.organization_id_orgn_seq_2_1 OWNED BY public.stock_transfer.id_orgn;

ALTER SEQUENCE public.branch_id_branch_seq_1_2_1 OWNED BY public.stock_transfer.id_branch;

CREATE SEQUENCE public.podelivery_hdr_id_delivery_seq;

CREATE TABLE public.podelivery_hdr (
                id_delivery INTEGER NOT NULL DEFAULT nextval('public.podelivery_hdr_id_delivery_seq'),
                do_num VARCHAR(13) NOT NULL,
                id_orgn INTEGER NOT NULL,
                id_branch INTEGER NOT NULL,
                id_supplier INTEGER NOT NULL,
                description VARCHAR(64) NOT NULL,
                po_num VARCHAR(13),
                gr_num VARCHAR(13),
                ref_number VARCHAR(16),
                status SMALLINT NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT podelivery_hdr_pk PRIMARY KEY (id_delivery)
);
COMMENT ON COLUMN public.podelivery_hdr.status IS 'delete (-1), inactive (0), active(1).';
COMMENT ON COLUMN public.podelivery_hdr.create_by IS 'id of user creator';
COMMENT ON COLUMN public.podelivery_hdr.update_by IS 'id of user creator';


ALTER SEQUENCE public.podelivery_hdr_id_delivery_seq OWNED BY public.podelivery_hdr.id_delivery;

CREATE SEQUENCE public.poinvoice_hdr_id_invoice_seq;

CREATE TABLE public.poinvoice_hdr (
                id_invoice INTEGER NOT NULL DEFAULT nextval('public.poinvoice_hdr_id_invoice_seq'),
                invoice_num VARCHAR(13) NOT NULL,
                id_delivery INTEGER NOT NULL,
                id_orgn INTEGER NOT NULL,
                id_branch INTEGER NOT NULL,
                id_supplier INTEGER NOT NULL,
                description VARCHAR(64) NOT NULL,
                total_value DOUBLE PRECISION NOT NULL,
                total_discount DOUBLE PRECISION DEFAULT 0 NOT NULL,
                total_tax DOUBLE PRECISION DEFAULT 0 NOT NULL,
                total_paid DOUBLE PRECISION DEFAULT 0 NOT NULL,
                status SMALLINT NOT NULL,
                date_limit DATE NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT poinvoice_hdr_pk PRIMARY KEY (id_invoice)
);
COMMENT ON TABLE public.poinvoice_hdr IS 'pre-requisite : items received';
COMMENT ON COLUMN public.poinvoice_hdr.status IS 'delete (-1), Open(0), Partial Paid(1), Paid(2)';
COMMENT ON COLUMN public.poinvoice_hdr.create_by IS 'id of user creator';
COMMENT ON COLUMN public.poinvoice_hdr.update_by IS 'id of user creator';


ALTER SEQUENCE public.poinvoice_hdr_id_invoice_seq OWNED BY public.poinvoice_hdr.id_invoice;

CREATE UNIQUE INDEX purchase_invoice_ucode
 ON public.poinvoice_hdr
 ( invoice_num );

CREATE SEQUENCE public.poinvoice_payment_id_payment_seq;

CREATE TABLE public.poinvoice_payment (
                id_payment INTEGER NOT NULL DEFAULT nextval('public.poinvoice_payment_id_payment_seq'),
                item_line INTEGER NOT NULL,
                id_invoice INTEGER NOT NULL,
                value DOUBLE PRECISION NOT NULL,
                kwitansi_num VARCHAR(13) NOT NULL,
                payment_type SMALLINT NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT poinvoice_payment_pk PRIMARY KEY (id_payment)
);
COMMENT ON COLUMN public.poinvoice_payment.payment_type IS 'Cash, Giro, Transfer';
COMMENT ON COLUMN public.poinvoice_payment.create_by IS 'id of user creator';
COMMENT ON COLUMN public.poinvoice_payment.update_by IS 'id of user creator';


ALTER SEQUENCE public.poinvoice_payment_id_payment_seq OWNED BY public.poinvoice_payment.id_payment;

CREATE SEQUENCE public.podelivery_line_id_line_seq;

CREATE TABLE public.podelivery_line (
                id_line INTEGER NOT NULL DEFAULT nextval('public.podelivery_line_id_line_seq'),
                id_delivery INTEGER NOT NULL,
                id_product INTEGER NOT NULL,
                id_uoms INTEGER NOT NULL,
                qty_trans DOUBLE PRECISION NOT NULL,
                value_trans DOUBLE PRECISION NOT NULL,
                percent_tax DOUBLE PRECISION NOT NULL,
                value_tax DOUBLE PRECISION NOT NULL,
                percent_disc DOUBLE PRECISION,
                value_disc DOUBLE PRECISION,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT podelivery_line_pk PRIMARY KEY (id_line)
);
COMMENT ON COLUMN public.podelivery_line.create_by IS 'id of user creator';
COMMENT ON COLUMN public.podelivery_line.update_by IS 'id of user creator';


ALTER SEQUENCE public.podelivery_line_id_line_seq OWNED BY public.podelivery_line.id_line;

CREATE SEQUENCE public.porder_hdr_id_po_seq;

CREATE TABLE public.porder_hdr (
                id_po INTEGER NOT NULL DEFAULT nextval('public.porder_hdr_id_po_seq'),
                po_num VARCHAR(13) NOT NULL,
                id_branch INTEGER NOT NULL,
                id_orgn INTEGER NOT NULL,
                description VARCHAR(64) NOT NULL,
                ref_number VARCHAR(16),
                id_supplier INTEGER NOT NULL,
                status SMALLINT NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT porder_hdr_pk PRIMARY KEY (id_po)
);
COMMENT ON COLUMN public.porder_hdr.status IS 'delete (-1), inactive (0), active(1).';
COMMENT ON COLUMN public.porder_hdr.create_by IS 'id of user creator';
COMMENT ON COLUMN public.porder_hdr.update_by IS 'id of user creator';


ALTER SEQUENCE public.porder_hdr_id_po_seq OWNED BY public.porder_hdr.id_po;

CREATE SEQUENCE public.porder_line_id_line_seq;

CREATE TABLE public.porder_line (
                id_line INTEGER NOT NULL DEFAULT nextval('public.porder_line_id_line_seq'),
                id_po INTEGER NOT NULL,
                item_line INTEGER NOT NULL,
                id_product INTEGER NOT NULL,
                id_uoms INTEGER NOT NULL,
                qty_trans DOUBLE PRECISION NOT NULL,
                value_trans DOUBLE PRECISION NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT porder_line_pk PRIMARY KEY (id_line)
);
COMMENT ON COLUMN public.porder_line.create_by IS 'id of user creator';
COMMENT ON COLUMN public.porder_line.update_by IS 'id of user creator';


ALTER SEQUENCE public.porder_line_id_line_seq OWNED BY public.porder_line.id_line;

CREATE SEQUENCE public.warehouse_id_warehouse_seq;

CREATE TABLE public.warehouse (
                id_warehouse INTEGER NOT NULL DEFAULT nextval('public.warehouse_id_warehouse_seq'),
                cd_whse VARCHAR(4) NOT NULL,
                nm_whse VARCHAR(32) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT warehouse_pk PRIMARY KEY (id_warehouse)
);
COMMENT ON TABLE public.warehouse IS 'Warehouse table';
COMMENT ON COLUMN public.warehouse.create_by IS 'id of user creator';
COMMENT ON COLUMN public.warehouse.update_by IS 'id of user creator';


ALTER SEQUENCE public.warehouse_id_warehouse_seq OWNED BY public.warehouse.id_warehouse;

CREATE SEQUENCE public.locator_id_locator_seq;

CREATE TABLE public.locator (
                id_locator INTEGER NOT NULL DEFAULT nextval('public.locator_id_locator_seq'),
                id_warehouse INTEGER NOT NULL,
                cd_locator VARCHAR(4) NOT NULL,
                nm_locator VARCHAR(32) NOT NULL,
                description VARCHAR(64),
                latitude DOUBLE PRECISION DEFAULT 0 NOT NULL,
                longitude DOUBLE PRECISION DEFAULT 0 NOT NULL,
                capacity DOUBLE PRECISION,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_date TIMESTAMP NOT NULL,
                CONSTRAINT locator_pk PRIMARY KEY (id_locator)
);
COMMENT ON TABLE public.locator IS 'storing item location include box, mobile, dll';
COMMENT ON COLUMN public.locator.create_by IS 'id of user creator';
COMMENT ON COLUMN public.locator.update_by IS 'id of user creator';


ALTER SEQUENCE public.locator_id_locator_seq OWNED BY public.locator.id_locator;

CREATE UNIQUE INDEX locator_uncode
 ON public.locator
 ( cd_locator );

CREATE SEQUENCE public.gissue_hdr_id_issue_seq;

CREATE TABLE public.gissue_hdr (
                id_issue INTEGER NOT NULL DEFAULT nextval('public.gissue_hdr_id_issue_seq'),
                gi_number VARCHAR(13) NOT NULL,
                id_orgn INTEGER NOT NULL,
                id_branch INTEGER NOT NULL,
                id_warehouse INTEGER NOT NULL,
                id_locator INTEGER NOT NULL,
                description VARCHAR(64) NOT NULL,
                status SMALLINT NOT NULL,
                issue_date DATE NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                CONSTRAINT gissue_hdr_pk PRIMARY KEY (id_issue)
);
COMMENT ON COLUMN public.gissue_hdr.status IS 'delete (-1), inactive (0), active(1).';
COMMENT ON COLUMN public.gissue_hdr.create_by IS 'id of user creator';
COMMENT ON COLUMN public.gissue_hdr.update_by IS 'id of user creator';


ALTER SEQUENCE public.gissue_hdr_id_issue_seq OWNED BY public.gissue_hdr.id_issue;

CREATE SEQUENCE public.greceipt_hdr_id_receipt_seq;

CREATE TABLE public.greceipt_hdr (
                id_receipt INTEGER NOT NULL DEFAULT nextval('public.greceipt_hdr_id_receipt_seq'),
                gr_num VARCHAR(13) NOT NULL,
                id_orgn INTEGER NOT NULL,
                id_branch INTEGER NOT NULL,
                id_warehouse INTEGER NOT NULL,
                id_locator INTEGER NOT NULL,
                description VARCHAR(64) NOT NULL,
                status SMALLINT NOT NULL,
                trans_type VARCHAR,
                ref_number VARCHAR(16),
                receipt_date DATE NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                CONSTRAINT greceipt_hdr_pk PRIMARY KEY (id_receipt)
);
COMMENT ON COLUMN public.greceipt_hdr.status IS 'delete (-1), inactive (0), active(1).';
COMMENT ON COLUMN public.greceipt_hdr.trans_type IS 'purchasing, sales, item_movement, dll';
COMMENT ON COLUMN public.greceipt_hdr.create_by IS 'id of user creator';
COMMENT ON COLUMN public.greceipt_hdr.update_by IS 'id of user creator';


ALTER SEQUENCE public.greceipt_hdr_id_receipt_seq OWNED BY public.greceipt_hdr.id_receipt;

CREATE SEQUENCE public.districs_id_distric_seq;

CREATE TABLE public.districs (
                id_distric INTEGER NOT NULL DEFAULT nextval('public.districs_id_distric_seq'),
                cd_distric VARCHAR(4) NOT NULL,
                nm_distric VARCHAR(32) NOT NULL,
                description VARCHAR(64) NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT districs_pk PRIMARY KEY (id_distric)
);
COMMENT ON TABLE public.districs IS 'represent market area';
COMMENT ON COLUMN public.districs.create_by IS 'id of user creator';
COMMENT ON COLUMN public.districs.update_by IS 'id of user creator';


ALTER SEQUENCE public.districs_id_distric_seq OWNED BY public.districs.id_distric;

CREATE SEQUENCE public.customer_class_id_cclass_seq;

CREATE TABLE public.customer_class (
                id_cclass INTEGER NOT NULL DEFAULT nextval('public.customer_class_id_cclass_seq'),
                cd_cclass VARCHAR(4) NOT NULL,
                nm_cclass VARCHAR(32) NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT cust_class_pk PRIMARY KEY (id_cclass)
);
COMMENT ON TABLE public.customer_class IS 'represent Modern Trade (MT), General Trade (GT), Traditional Trade (TT)';
COMMENT ON COLUMN public.customer_class.cd_cclass IS 'GT/MT';
COMMENT ON COLUMN public.customer_class.create_by IS 'id of user creator';
COMMENT ON COLUMN public.customer_class.update_by IS 'id of user creator';


ALTER SEQUENCE public.customer_class_id_cclass_seq OWNED BY public.customer_class.id_cclass;

CREATE UNIQUE INDEX unique_cd_cclass
 ON public.customer_class
 ( cd_cclass );

CREATE SEQUENCE public.customer_type_id_ctype_seq;

CREATE TABLE public.customer_type (
                id_ctype INTEGER NOT NULL DEFAULT nextval('public.customer_type_id_ctype_seq'),
                cd_ctype VARCHAR(4) NOT NULL,
                create_by INTEGER NOT NULL,
                nm_ctype VARCHAR(32) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT cust_type_pk PRIMARY KEY (id_ctype)
);
COMMENT ON TABLE public.customer_type IS 'warung, mini_market, super_market, dll.';
COMMENT ON COLUMN public.customer_type.create_by IS 'id of user creator';
COMMENT ON COLUMN public.customer_type.update_by IS 'id of user creator';


ALTER SEQUENCE public.customer_type_id_ctype_seq OWNED BY public.customer_type.id_ctype;

CREATE UNIQUE INDEX unique_cd_ctype
 ON public.customer_type
 ( cd_ctype );

CREATE SEQUENCE public.customers_id_seq;

CREATE TABLE public.customers (
                id_customer INTEGER NOT NULL DEFAULT nextval('public.customers_id_seq'),
                cd_cust VARCHAR(4) NOT NULL,
                nm_cust VARCHAR(64) NOT NULL,
                id_ctype INTEGER NOT NULL,
                id_cclass INTEGER NOT NULL,
                addrs VARCHAR(32),
                contact_name VARCHAR(32),
                contact_number VARCHAR(16),
                status SMALLINT DEFAULT 1 NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT customers_pk PRIMARY KEY (id_customer)
);
COMMENT ON COLUMN public.customers.status IS 'active (1) , inactive(0), delete(-1)';
COMMENT ON COLUMN public.customers.create_by IS 'id of user creator';
COMMENT ON COLUMN public.customers.update_by IS 'id of user creator';


ALTER SEQUENCE public.customers_id_seq OWNED BY public.customers.id_customer;

CREATE UNIQUE INDEX unique_cd_cust
 ON public.customers
 ( cd_cust );

CREATE TABLE public.customer_limitation (
                id_customer INTEGER NOT NULL,
                multi_invoice SMALLINT DEFAULT 1 NOT NULL,
                credit_limit REAL NOT NULL,
                blocked BOOLEAN NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT customer_limitation_pk PRIMARY KEY (id_customer)
);
COMMENT ON COLUMN public.customer_limitation.multi_invoice IS 'number of open invoice';
COMMENT ON COLUMN public.customer_limitation.create_by IS 'id of user creator';
COMMENT ON COLUMN public.customer_limitation.update_by IS 'id of user creator';


CREATE TABLE public.customer_detail (
                id_customer INTEGER NOT NULL,
                id_distric INTEGER NOT NULL,
                addr2 VARCHAR(64),
                latitude REAL NOT NULL,
                longtitude REAL NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT customer_dtl_pk PRIMARY KEY (id_customer)
);
COMMENT ON COLUMN public.customer_detail.create_by IS 'id of user creator';
COMMENT ON COLUMN public.customer_detail.update_by IS 'id of user creator';


CREATE SEQUENCE public.organization_id_orgn_seq;

CREATE TABLE public.Organization (
                id_orgn INTEGER NOT NULL DEFAULT nextval('public.organization_id_orgn_seq'),
                cd_orgn VARCHAR(4) NOT NULL,
                update_by INTEGER NOT NULL,
                nm_orgn VARCHAR(32) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT organization_pk PRIMARY KEY (id_orgn)
);
COMMENT ON COLUMN public.Organization.update_by IS 'id of user creator';
COMMENT ON COLUMN public.Organization.create_by IS 'id of user creator';


ALTER SEQUENCE public.organization_id_orgn_seq OWNED BY public.Organization.id_orgn;

CREATE UNIQUE INDEX organization_ucode
 ON public.Organization
 ( cd_orgn );

CREATE SEQUENCE public.branch_id_branch_seq_1;

CREATE TABLE public.Branch (
                id_branch INTEGER NOT NULL DEFAULT nextval('public.branch_id_branch_seq_1'),
                cd_branch VARCHAR(4) NOT NULL,
                nm_branch VARCHAR(32) NOT NULL,
                id_orgn INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT branch_pk PRIMARY KEY (id_branch)
);
COMMENT ON COLUMN public.Branch.update_by IS 'id of user creator';
COMMENT ON COLUMN public.Branch.create_by IS 'id of user creator';


ALTER SEQUENCE public.branch_id_branch_seq_1 OWNED BY public.Branch.id_branch;

CREATE UNIQUE INDEX branch_ucode
 ON public.Branch
 ( cd_branch );

CREATE SEQUENCE public.tbl_menu_menu_id_seq;

CREATE TABLE public.tbl_menu (
                menu_id INTEGER NOT NULL DEFAULT nextval('public.tbl_menu_menu_id_seq'),
                parent_id INTEGER,
                label VARCHAR(128) NOT NULL,
                url VARCHAR(128),
                urutan INTEGER DEFAULT 1000 NOT NULL,
                CONSTRAINT tbl_menu_pk PRIMARY KEY (menu_id)
);


ALTER SEQUENCE public.tbl_menu_menu_id_seq OWNED BY public.tbl_menu.menu_id;

CREATE SEQUENCE public.tbl_role_role_id_seq;

CREATE TABLE public.tbl_role (
                role_id INTEGER NOT NULL DEFAULT nextval('public.tbl_role_role_id_seq'),
                role VARCHAR(45) NOT NULL,
                deskripsi VARCHAR(100),
                CONSTRAINT tbl_role_pk PRIMARY KEY (role_id)
);


ALTER SEQUENCE public.tbl_role_role_id_seq OWNED BY public.tbl_role.role_id;

CREATE SEQUENCE public.tbl_role_menu_id_rolemn_seq;

CREATE TABLE public.tbl_role_menu (
                id_rolemn INTEGER NOT NULL DEFAULT nextval('public.tbl_role_menu_id_rolemn_seq'),
                role_id INTEGER NOT NULL,
                menu_id INTEGER NOT NULL,
                CONSTRAINT tbl_role_menu_pk PRIMARY KEY (id_rolemn)
);


ALTER SEQUENCE public.tbl_role_menu_id_rolemn_seq OWNED BY public.tbl_role_menu.id_rolemn;

CREATE SEQUENCE public.tbl_user_user_id_seq;

CREATE TABLE public.tbl_user (
                user_id INTEGER NOT NULL DEFAULT nextval('public.tbl_user_user_id_seq'),
                username VARCHAR(128) NOT NULL,
                password VARCHAR(128) NOT NULL,
                email VARCHAR(128) NOT NULL,
                CONSTRAINT tbl_user_pk PRIMARY KEY (user_id)
);


ALTER SEQUENCE public.tbl_user_user_id_seq OWNED BY public.tbl_user.user_id;

CREATE SEQUENCE public.tbl_user_role_id_seq;

CREATE TABLE public.tbl_user_role (
                id INTEGER NOT NULL DEFAULT nextval('public.tbl_user_role_id_seq'),
                user_id INTEGER NOT NULL,
                role_id INTEGER NOT NULL,
                CONSTRAINT tbl_user_role_pk PRIMARY KEY (id)
);


ALTER SEQUENCE public.tbl_user_role_id_seq OWNED BY public.tbl_user_role.id;

CREATE SEQUENCE public.branch_access_id_branchaccs_seq;

CREATE TABLE public.Branch_Access (
                id_branchaccs INTEGER NOT NULL DEFAULT nextval('public.branch_access_id_branchaccs_seq'),
                id_branch INTEGER NOT NULL,
                user_id INTEGER NOT NULL,
                description VARCHAR(64) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT branch_access_pk PRIMARY KEY (id_branchaccs)
);
COMMENT ON COLUMN public.Branch_Access.update_by IS 'id of user creator';
COMMENT ON COLUMN public.Branch_Access.create_by IS 'id of user creator';


ALTER SEQUENCE public.branch_access_id_branchaccs_seq OWNED BY public.Branch_Access.id_branchaccs;

CREATE SEQUENCE public.suppliers_id_supplier_seq;

CREATE TABLE public.suppliers (
                id_supplier INTEGER NOT NULL DEFAULT nextval('public.suppliers_id_supplier_seq'),
                cd_supplier VARCHAR(4) NOT NULL,
                nm_supplier VARCHAR(32) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT suppliers_pk PRIMARY KEY (id_supplier)
);
COMMENT ON COLUMN public.suppliers.create_by IS 'id of user creator';
COMMENT ON COLUMN public.suppliers.update_by IS 'id of user creator';


ALTER SEQUENCE public.suppliers_id_supplier_seq OWNED BY public.suppliers.id_supplier;

CREATE UNIQUE INDEX supplier_ucode
 ON public.suppliers
 ( cd_supplier );

CREATE SEQUENCE public.category_id_category_seq;

CREATE TABLE public.category (
                id_category INTEGER NOT NULL DEFAULT nextval('public.category_id_category_seq'),
                cd_category VARCHAR(4) NOT NULL,
                create_date TIMESTAMP NOT NULL,
                nm_category VARCHAR(32) NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT p_category_pk PRIMARY KEY (id_category)
);
COMMENT ON COLUMN public.category.create_by IS 'id of user creator';
COMMENT ON COLUMN public.category.update_by IS 'id of user creator';


ALTER SEQUENCE public.category_id_category_seq OWNED BY public.category.id_category;

CREATE UNIQUE INDEX product_category_ucode
 ON public.category
 ( cd_category );

CREATE SEQUENCE public.groups_id_groups_seq;

CREATE TABLE public.Groups (
                id_groups INTEGER NOT NULL DEFAULT nextval('public.groups_id_groups_seq'),
                cd_group VARCHAR(4) NOT NULL,
                nm_group VARCHAR(32) NOT NULL,
                update_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT groups_pk PRIMARY KEY (id_groups)
);
COMMENT ON TABLE public.Groups IS 'Acomadate principal on AWS Group';
COMMENT ON COLUMN public.Groups.update_by IS 'id of user creator';
COMMENT ON COLUMN public.Groups.create_by IS 'id of user creator';


ALTER SEQUENCE public.groups_id_groups_seq OWNED BY public.Groups.id_groups;

CREATE UNIQUE INDEX groups_unique_code
 ON public.Groups
 ( cd_group );

CREATE SEQUENCE public.uoms_id_uoms_seq;

CREATE TABLE public.Uoms (
                id_uoms INTEGER NOT NULL DEFAULT nextval('public.uoms_id_uoms_seq'),
                cd_uom VARCHAR(4) NOT NULL,
                update_by INTEGER NOT NULL,
                nm_uom VARCHAR(32) NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT uoms_pk PRIMARY KEY (id_uoms)
);
COMMENT ON COLUMN public.Uoms.update_by IS 'id of user creator';
COMMENT ON COLUMN public.Uoms.create_by IS 'id of user creator';


ALTER SEQUENCE public.uoms_id_uoms_seq OWNED BY public.Uoms.id_uoms;

CREATE UNIQUE INDEX uoms_unique_code
 ON public.Uoms
 ( cd_uom );

CREATE SEQUENCE public.manufacturer_id_manfrs_seq;

CREATE TABLE public.Manufacturer (
                id_manfrs INTEGER NOT NULL DEFAULT nextval('public.manufacturer_id_manfrs_seq'),
                cd_manf VARCHAR(4) NOT NULL,
                nm_manufacturer VARCHAR(32) NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                CONSTRAINT manufacturer_pk PRIMARY KEY (id_manfrs)
);
COMMENT ON COLUMN public.Manufacturer.create_by IS 'id of user creator';
COMMENT ON COLUMN public.Manufacturer.update_by IS 'id of user creator';


ALTER SEQUENCE public.manufacturer_id_manfrs_seq OWNED BY public.Manufacturer.id_manfrs;

CREATE UNIQUE INDEX manufacturer_cd
 ON public.Manufacturer
 ( cd_manf );

CREATE SEQUENCE public.product_id_product_seq;

CREATE TABLE public.Product (
                id_product INTEGER NOT NULL DEFAULT nextval('public.product_id_product_seq'),
                cd_product VARCHAR(13) NOT NULL,
                nm_product VARCHAR(64) NOT NULL,
                id_manfrs INTEGER NOT NULL,
                id_uoms INTEGER NOT NULL,
                id_groups INTEGER NOT NULL,
                id_category INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT product_pk PRIMARY KEY (id_product)
);
COMMENT ON TABLE public.Product IS 'details of product';
COMMENT ON COLUMN public.Product.cd_product IS 'product number eg.barcode label';
COMMENT ON COLUMN public.Product.create_by IS 'id of user creator';
COMMENT ON COLUMN public.Product.update_by IS 'id of user creator';


ALTER SEQUENCE public.product_id_product_seq OWNED BY public.Product.id_product;

CREATE UNIQUE INDEX product_ucode
 ON public.Product
 ( cd_product );

CREATE SEQUENCE public.mv_history_id_movement_seq;

CREATE SEQUENCE public.branch_id_branch_seq_1_1;

CREATE SEQUENCE public.organization_id_orgn_seq_1_1;

CREATE TABLE public.mv_history (
                id_movement INTEGER NOT NULL DEFAULT nextval('public.mv_history_id_movement_seq'),
                id_locator INTEGER NOT NULL,
                id_branch INTEGER NOT NULL DEFAULT nextval('public.branch_id_branch_seq_1_1'),
                id_orgn INTEGER NOT NULL DEFAULT nextval('public.organization_id_orgn_seq_1_1'),
                id_product INTEGER NOT NULL,
                qty_mvnt DOUBLE PRECISION NOT NULL,
                val_mvnt DOUBLE PRECISION NOT NULL,
                qty_current DOUBLE PRECISION NOT NULL,
                val_current DOUBLE PRECISION NOT NULL,
                trans_type VARCHAR(32),
                trans_source VARCHAR(32),
                ref_number VARCHAR(13),
                update_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                CONSTRAINT mv_history_pk PRIMARY KEY (id_movement)
);
COMMENT ON COLUMN public.mv_history.trans_source IS 'Controller/action execute';
COMMENT ON COLUMN public.mv_history.create_by IS 'id of user creator';
COMMENT ON COLUMN public.mv_history.update_by IS 'id of user creator';


ALTER SEQUENCE public.mv_history_id_movement_seq OWNED BY public.mv_history.id_movement;

ALTER SEQUENCE public.branch_id_branch_seq_1_1 OWNED BY public.mv_history.id_branch;

ALTER SEQUENCE public.organization_id_orgn_seq_1_1 OWNED BY public.mv_history.id_orgn;

CREATE SEQUENCE public.cogs_id_cogs_seq;

CREATE TABLE public.cogs (
                id_cogs INTEGER NOT NULL DEFAULT nextval('public.cogs_id_cogs_seq'),
                id_product INTEGER NOT NULL,
                id_orgn INTEGER NOT NULL,
                id_branch INTEGER NOT NULL,
                cogs DOUBLE PRECISION DEFAULT 0 NOT NULL,
                update_by INTEGER NOT NULL,
                create_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                CONSTRAINT cogs_pk PRIMARY KEY (id_cogs)
);
COMMENT ON COLUMN public.cogs.update_by IS 'id of user creator';
COMMENT ON COLUMN public.cogs.create_by IS 'id of user creator';


ALTER SEQUENCE public.cogs_id_cogs_seq OWNED BY public.cogs.id_cogs;

CREATE SEQUENCE public.price_id_price_seq;

CREATE TABLE public.price (
                id_price INTEGER NOT NULL DEFAULT nextval('public.price_id_price_seq'),
                id_product INTEGER NOT NULL,
                id_orgn INTEGER NOT NULL,
                id_branch INTEGER NOT NULL,
                sales_price DOUBLE PRECISION NOT NULL,
                id_price_cat INTEGER NOT NULL,
                reff_num VARCHAR(13),
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                CONSTRAINT price_pk PRIMARY KEY (id_price)
);
COMMENT ON COLUMN public.price.reff_num IS 'number of delivery while update';
COMMENT ON COLUMN public.price.create_by IS 'id of user creator';
COMMENT ON COLUMN public.price.update_by IS 'id of user creator';


ALTER SEQUENCE public.price_id_price_seq OWNED BY public.price.id_price;

CREATE SEQUENCE public.greceipt_line_id_line_seq;

CREATE TABLE public.greceipt_line (
                id_line INTEGER NOT NULL DEFAULT nextval('public.greceipt_line_id_line_seq'),
                id_receipt INTEGER NOT NULL,
                id_product INTEGER NOT NULL,
                qty_trans DOUBLE PRECISION NOT NULL,
                id_uoms INTEGER NOT NULL,
                value_disc DOUBLE PRECISION,
                percent_disc DOUBLE PRECISION,
                percent_tax DOUBLE PRECISION NOT NULL,
                value_tax DOUBLE PRECISION NOT NULL,
                value_trans DOUBLE PRECISION NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT greceipt_line_pk PRIMARY KEY (id_line)
);
COMMENT ON COLUMN public.greceipt_line.create_by IS 'id of user creator';
COMMENT ON COLUMN public.greceipt_line.update_by IS 'id of user creator';


ALTER SEQUENCE public.greceipt_line_id_line_seq OWNED BY public.greceipt_line.id_line;

CREATE TABLE public.batch (
                id_line INTEGER NOT NULL,
                id_product INTEGER NOT NULL,
                batch_num VARCHAR(13) NOT NULL,
                date_expire DATE,
                qty_receipt DOUBLE PRECISION DEFAULT 0 NOT NULL,
                qty_issued DOUBLE PRECISION DEFAULT 0 NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT batch_pk PRIMARY KEY (id_line)
);
COMMENT ON TABLE public.batch IS 'batch off production, include expire date, etc.';
COMMENT ON COLUMN public.batch.create_by IS 'id of user creator';
COMMENT ON COLUMN public.batch.update_by IS 'id of user creator';


CREATE SEQUENCE public.gissue_line_id_line_seq;

CREATE TABLE public.gissue_line (
                id_line INTEGER NOT NULL DEFAULT nextval('public.gissue_line_id_line_seq'),
                id_issue INTEGER NOT NULL,
                item_line INTEGER NOT NULL,
                qty_trans DOUBLE PRECISION NOT NULL,
                value_trans DOUBLE PRECISION NOT NULL,
                id_product INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT gissue_line_pk PRIMARY KEY (id_line)
);
COMMENT ON COLUMN public.gissue_line.update_by IS 'id of user creator';
COMMENT ON COLUMN public.gissue_line.create_by IS 'id of user creator';


ALTER SEQUENCE public.gissue_line_id_line_seq OWNED BY public.gissue_line.id_line;

CREATE SEQUENCE public.supply_list_id_supply_seq;

CREATE TABLE public.Supply_list (
                id_supply INTEGER NOT NULL DEFAULT nextval('public.supply_list_id_supply_seq'),
                id_supplier INTEGER NOT NULL,
                id_product INTEGER NOT NULL,
                create_date TIMESTAMP NOT NULL,
                create_by INTEGER NOT NULL,
                update_date TIMESTAMP NOT NULL,
                update_by INTEGER NOT NULL,
                CONSTRAINT supply_list_pk PRIMARY KEY (id_supply)
);
COMMENT ON COLUMN public.Supply_list.create_by IS 'id of user creator';
COMMENT ON COLUMN public.Supply_list.update_by IS 'id of user creator';


ALTER SEQUENCE public.supply_list_id_supply_seq OWNED BY public.Supply_list.id_supply;

ALTER TABLE public.price ADD CONSTRAINT price_cat_price_fk
FOREIGN KEY (id_price_cat)
REFERENCES public.price_cat (id_price_cat)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.podelivery_line ADD CONSTRAINT po_delivery_pdelivery_line_fk
FOREIGN KEY (id_delivery)
REFERENCES public.podelivery_hdr (id_delivery)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.poinvoice_hdr ADD CONSTRAINT po_delivery_purchase_invoice_fk
FOREIGN KEY (id_delivery)
REFERENCES public.podelivery_hdr (id_delivery)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.poinvoice_payment ADD CONSTRAINT purchas_invoice_payment_detail_fk
FOREIGN KEY (id_invoice)
REFERENCES public.poinvoice_hdr (id_invoice)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.porder_line ADD CONSTRAINT purchase_order_po_line_fk
FOREIGN KEY (id_po)
REFERENCES public.porder_hdr (id_po)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.locator ADD CONSTRAINT warehouse_locator_fk
FOREIGN KEY (id_warehouse)
REFERENCES public.warehouse (id_warehouse)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.greceipt_hdr ADD CONSTRAINT warehouse_good_receipt_fk
FOREIGN KEY (id_warehouse)
REFERENCES public.warehouse (id_warehouse)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.gissue_hdr ADD CONSTRAINT warehouse_good_issue_fk
FOREIGN KEY (id_warehouse)
REFERENCES public.warehouse (id_warehouse)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.mv_history ADD CONSTRAINT locator_mv_history_fk
FOREIGN KEY (id_locator)
REFERENCES public.locator (id_locator)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.greceipt_hdr ADD CONSTRAINT locator_good_receipt_fk
FOREIGN KEY (id_locator)
REFERENCES public.locator (id_locator)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.gissue_hdr ADD CONSTRAINT locator_good_issue_fk
FOREIGN KEY (id_locator)
REFERENCES public.locator (id_locator)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.gissue_line ADD CONSTRAINT good_issue_gi_line_fk
FOREIGN KEY (id_issue)
REFERENCES public.gissue_hdr (id_issue)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.greceipt_line ADD CONSTRAINT good_receipt_gr_line_fk
FOREIGN KEY (id_receipt)
REFERENCES public.greceipt_hdr (id_receipt)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customer_detail ADD CONSTRAINT districs_customer_detail_fk
FOREIGN KEY (id_distric)
REFERENCES public.districs (id_distric)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customers ADD CONSTRAINT customer_class_customers_fk
FOREIGN KEY (id_cclass)
REFERENCES public.customer_class (id_cclass)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customers ADD CONSTRAINT customer_type_customers_fk
FOREIGN KEY (id_ctype)
REFERENCES public.customer_type (id_ctype)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customer_detail ADD CONSTRAINT customers_customer_detail_fk
FOREIGN KEY (id_customer)
REFERENCES public.customers (id_customer)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.customer_limitation ADD CONSTRAINT customers_customer_limitation_fk
FOREIGN KEY (id_customer)
REFERENCES public.customers (id_customer)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Branch ADD CONSTRAINT organization_branch_fk
FOREIGN KEY (id_orgn)
REFERENCES public.Organization (id_orgn)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Branch_Access ADD CONSTRAINT branch_branch_access_fk
FOREIGN KEY (id_branch)
REFERENCES public.Branch (id_branch)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tbl_role_menu ADD CONSTRAINT tbl_menu_tbl_role_menu_fk
FOREIGN KEY (menu_id)
REFERENCES public.tbl_menu (menu_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tbl_role_menu ADD CONSTRAINT tbl_role_tbl_role_menu_fk
FOREIGN KEY (role_id)
REFERENCES public.tbl_role (role_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tbl_user_role ADD CONSTRAINT tbl_role_tbl_user_role_fk
FOREIGN KEY (role_id)
REFERENCES public.tbl_role (role_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Branch_Access ADD CONSTRAINT tbl_user_branch_access_fk
FOREIGN KEY (user_id)
REFERENCES public.tbl_user (user_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tbl_user_role ADD CONSTRAINT tbl_user_tbl_user_role_fk
FOREIGN KEY (user_id)
REFERENCES public.tbl_user (user_id)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Supply_list ADD CONSTRAINT supplier_supply_list_fk
FOREIGN KEY (id_supplier)
REFERENCES public.suppliers (id_supplier)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Product ADD CONSTRAINT product_category_product_fk
FOREIGN KEY (id_category)
REFERENCES public.category (id_category)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Product ADD CONSTRAINT groups_product_fk
FOREIGN KEY (id_groups)
REFERENCES public.Groups (id_groups)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Product ADD CONSTRAINT uoms_product_fk
FOREIGN KEY (id_uoms)
REFERENCES public.Uoms (id_uoms)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Product ADD CONSTRAINT manufacturer_product_fk
FOREIGN KEY (id_manfrs)
REFERENCES public.Manufacturer (id_manfrs)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.Supply_list ADD CONSTRAINT product_supply_list_fk
FOREIGN KEY (id_product)
REFERENCES public.Product (id_product)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.gissue_line ADD CONSTRAINT product_gi_line_fk
FOREIGN KEY (id_product)
REFERENCES public.Product (id_product)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.greceipt_line ADD CONSTRAINT product_gr_line_fk
FOREIGN KEY (id_product)
REFERENCES public.Product (id_product)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.price ADD CONSTRAINT product_price_fk
FOREIGN KEY (id_product)
REFERENCES public.Product (id_product)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.cogs ADD CONSTRAINT product_cogs_fk
FOREIGN KEY (id_product)
REFERENCES public.Product (id_product)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.mv_history ADD CONSTRAINT product_mv_history_fk
FOREIGN KEY (id_product)
REFERENCES public.Product (id_product)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.batch ADD CONSTRAINT gr_line_batch_fk
FOREIGN KEY (id_line)
REFERENCES public.greceipt_line (id_line)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
