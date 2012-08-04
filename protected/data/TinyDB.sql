
CREATE TABLE whse (
                cd_whse VARCHAR(4) NOT NULL,
                nm_whse VARCHAR(32) NOT NULL,
                create_by INTEGER NOT NULL,
                CONSTRAINT whse_pk PRIMARY KEY (cd_whse)
);
COMMENT ON TABLE whse IS 'Warehouse list table';
