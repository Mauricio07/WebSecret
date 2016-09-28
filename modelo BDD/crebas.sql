/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2008                    */
/* Created on:     01/09/2016 12:32:37 p.m.                     */
/*==============================================================*/


if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('CAJAS') and o.name = 'FK_CAJAS_PRODUCTO__PRODUCTO')
alter table CAJAS
   drop constraint FK_CAJAS_PRODUCTO__PRODUCTO
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('CATEGORIAS') and o.name = 'FK_CATEGORI_ITEM_CATE_ITEMS')
alter table CATEGORIAS
   drop constraint FK_CATEGORI_ITEM_CATE_ITEMS
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('CLIENTES') and o.name = 'FK_CLIENTES_VENDEDORE_VENDEDOR')
alter table CLIENTES
   drop constraint FK_CLIENTES_VENDEDORE_VENDEDOR
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('COLORES') and o.name = 'FK_COLORES_ITEM_COLO_ITEMS')
alter table COLORES
   drop constraint FK_COLORES_ITEM_COLO_ITEMS
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('DESPACHO_ESPECIALIZACION') and o.name = 'FK_DESPACHO_DESPACHO__COMPRAS')
alter table DESPACHO_ESPECIALIZACION
   drop constraint FK_DESPACHO_DESPACHO__COMPRAS
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('DESPACHO_ESPECIALIZACION') and o.name = 'FK_DESPACHO_DESPACHO__DESPACHO')
alter table DESPACHO_ESPECIALIZACION
   drop constraint FK_DESPACHO_DESPACHO__DESPACHO
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('ESPECIALIZACIONES') and o.name = 'FK_ESPECIAL_ORDEN_ESP_ORDENES')
alter table ESPECIALIZACIONES
   drop constraint FK_ESPECIAL_ORDEN_ESP_ORDENES
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('ESPECIALIZACIONES') and o.name = 'FK_ESPECIAL_PRODUCTO__PRODUCTO')
alter table ESPECIALIZACIONES
   drop constraint FK_ESPECIAL_PRODUCTO__PRODUCTO
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('ITEMS') and o.name = 'FK_ITEMS_ITEM_CORT_CORTES')
alter table ITEMS
   drop constraint FK_ITEMS_ITEM_CORT_CORTES
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('ITEMS') and o.name = 'FK_ITEMS_ITEM_COST_COSTOS')
alter table ITEMS
   drop constraint FK_ITEMS_ITEM_COST_COSTOS
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('ITEMS') and o.name = 'FK_ITEMS_ITEM_GRAD_GRADES')
alter table ITEMS
   drop constraint FK_ITEMS_ITEM_GRAD_GRADES
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('ITEMS') and o.name = 'FK_ITEMS_ITEM_IMPU_IMPUESTO')
alter table ITEMS
   drop constraint FK_ITEMS_ITEM_IMPU_IMPUESTO
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('ITEMS') and o.name = 'FK_ITEMS_ITEM_TIPO_TIPOS_IT')
alter table ITEMS
   drop constraint FK_ITEMS_ITEM_TIPO_TIPOS_IT
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('MATERIALES') and o.name = 'FK_MATERIAL_PRODUCTO__PRODUCTO')
alter table MATERIALES
   drop constraint FK_MATERIAL_PRODUCTO__PRODUCTO
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('MATERIAL_ITEMS') and o.name = 'FK_MATERIAL_CUALIDAD__RECETAS')
alter table MATERIAL_ITEMS
   drop constraint FK_MATERIAL_CUALIDAD__RECETAS
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('ORDENES') and o.name = 'FK_ORDENES_CLIENTE_O_CLIENTES')
alter table ORDENES
   drop constraint FK_ORDENES_CLIENTE_O_CLIENTES
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('PRODUCTOS') and o.name = 'FK_PRODUCTO_PRODUCTO__CAJAS')
alter table PRODUCTOS
   drop constraint FK_PRODUCTO_PRODUCTO__CAJAS
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('PRODUCTOS') and o.name = 'FK_PRODUCTO_PRODUCTO__DESPACHO')
alter table PRODUCTOS
   drop constraint FK_PRODUCTO_PRODUCTO__DESPACHO
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('PRODUCTO_COMPRA') and o.name = 'FK_PRODUCTO_PRODUCTO__PRODUCTO')
alter table PRODUCTO_COMPRA
   drop constraint FK_PRODUCTO_PRODUCTO__PRODUCTO
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('PRODUCTO_COMPRA') and o.name = 'FK_PRODUCTO_PRODUCTO__COMPRAS')
alter table PRODUCTO_COMPRA
   drop constraint FK_PRODUCTO_PRODUCTO__COMPRAS
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('PROVEEDOR') and o.name = 'FK_PROVEEDO_COMPRA_PR_COMPRAS')
alter table PROVEEDOR
   drop constraint FK_PROVEEDO_COMPRA_PR_COMPRAS
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('RECETAS') and o.name = 'FK_RECETAS_ITEMS_REC_ITEMS')
alter table RECETAS
   drop constraint FK_RECETAS_ITEMS_REC_ITEMS
go

if exists (select 1
   from sys.sysreferences r join sys.sysobjects o on (o.id = r.constid and o.type = 'F')
   where r.fkeyid = object_id('RECETAS') and o.name = 'FK_RECETAS_PRODUCTO__PRODUCTO')
alter table RECETAS
   drop constraint FK_RECETAS_PRODUCTO__PRODUCTO
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('CAJAS')
            and   name  = 'PRODUCTO_CAJA2_FK'
            and   indid > 0
            and   indid < 255)
   drop index CAJAS.PRODUCTO_CAJA2_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('CAJAS')
            and   type = 'U')
   drop table CAJAS
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('CATEGORIAS')
            and   name  = 'ITEM_CATEGORIA_FK'
            and   indid > 0
            and   indid < 255)
   drop index CATEGORIAS.ITEM_CATEGORIA_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('CATEGORIAS')
            and   type = 'U')
   drop table CATEGORIAS
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('CLIENTES')
            and   name  = 'VENDEDORES_CLIENTES_FK'
            and   indid > 0
            and   indid < 255)
   drop index CLIENTES.VENDEDORES_CLIENTES_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('CLIENTES')
            and   type = 'U')
   drop table CLIENTES
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('COLORES')
            and   name  = 'ITEM_COLOR_FK'
            and   indid > 0
            and   indid < 255)
   drop index COLORES.ITEM_COLOR_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('COLORES')
            and   type = 'U')
   drop table COLORES
go

if exists (select 1
            from  sysobjects
           where  id = object_id('COMPRAS')
            and   type = 'U')
   drop table COMPRAS
go

if exists (select 1
            from  sysobjects
           where  id = object_id('CORTES')
            and   type = 'U')
   drop table CORTES
go

if exists (select 1
            from  sysobjects
           where  id = object_id('COSTOS')
            and   type = 'U')
   drop table COSTOS
go

if exists (select 1
            from  sysobjects
           where  id = object_id('DESPACHO')
            and   type = 'U')
   drop table DESPACHO
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('DESPACHO_ESPECIALIZACION')
            and   name  = 'DESPACHO_ESPECIALIZACION2_FK'
            and   indid > 0
            and   indid < 255)
   drop index DESPACHO_ESPECIALIZACION.DESPACHO_ESPECIALIZACION2_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('DESPACHO_ESPECIALIZACION')
            and   name  = 'DESPACHO_ESPECIALIZACION_FK'
            and   indid > 0
            and   indid < 255)
   drop index DESPACHO_ESPECIALIZACION.DESPACHO_ESPECIALIZACION_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('DESPACHO_ESPECIALIZACION')
            and   type = 'U')
   drop table DESPACHO_ESPECIALIZACION
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('ESPECIALIZACIONES')
            and   name  = 'ORDEN_ESPECIALIZACION_FK'
            and   indid > 0
            and   indid < 255)
   drop index ESPECIALIZACIONES.ORDEN_ESPECIALIZACION_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('ESPECIALIZACIONES')
            and   name  = 'PRODUCTO_ESPECIALIZACION_FK'
            and   indid > 0
            and   indid < 255)
   drop index ESPECIALIZACIONES.PRODUCTO_ESPECIALIZACION_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('ESPECIALIZACIONES')
            and   type = 'U')
   drop table ESPECIALIZACIONES
go

if exists (select 1
            from  sysobjects
           where  id = object_id('GRADES')
            and   type = 'U')
   drop table GRADES
go

if exists (select 1
            from  sysobjects
           where  id = object_id('IMPUESTOS')
            and   type = 'U')
   drop table IMPUESTOS
go

if exists (select 1
            from  sysobjects
           where  id = object_id('ITEMS')
            and   type = 'U')
   drop table ITEMS
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('MATERIALES')
            and   name  = 'PRODUCTO_MATERIAL_FK'
            and   indid > 0
            and   indid < 255)
   drop index MATERIALES.PRODUCTO_MATERIAL_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('MATERIALES')
            and   type = 'U')
   drop table MATERIALES
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('MATERIAL_ITEMS')
            and   name  = 'CUALIDAD_MATERIAL_FK'
            and   indid > 0
            and   indid < 255)
   drop index MATERIAL_ITEMS.CUALIDAD_MATERIAL_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('MATERIAL_ITEMS')
            and   type = 'U')
   drop table MATERIAL_ITEMS
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('ORDENES')
            and   name  = 'CLIENTE_ORDEN_FK'
            and   indid > 0
            and   indid < 255)
   drop index ORDENES.CLIENTE_ORDEN_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('ORDENES')
            and   type = 'U')
   drop table ORDENES
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('PRODUCTOS')
            and   name  = 'PRODUCTO_DESPACHO_FK'
            and   indid > 0
            and   indid < 255)
   drop index PRODUCTOS.PRODUCTO_DESPACHO_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('PRODUCTOS')
            and   name  = 'PRODUCTO_CAJA_FK'
            and   indid > 0
            and   indid < 255)
   drop index PRODUCTOS.PRODUCTO_CAJA_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('PRODUCTOS')
            and   type = 'U')
   drop table PRODUCTOS
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('PRODUCTO_COMPRA')
            and   name  = 'PRODUCTO_COMPRA2_FK'
            and   indid > 0
            and   indid < 255)
   drop index PRODUCTO_COMPRA.PRODUCTO_COMPRA2_FK
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('PRODUCTO_COMPRA')
            and   name  = 'PRODUCTO_COMPRA_FK'
            and   indid > 0
            and   indid < 255)
   drop index PRODUCTO_COMPRA.PRODUCTO_COMPRA_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('PRODUCTO_COMPRA')
            and   type = 'U')
   drop table PRODUCTO_COMPRA
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('PROVEEDOR')
            and   name  = 'COMPRA_PROVEEDOR_FK'
            and   indid > 0
            and   indid < 255)
   drop index PROVEEDOR.COMPRA_PROVEEDOR_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('PROVEEDOR')
            and   type = 'U')
   drop table PROVEEDOR
go

if exists (select 1
            from  sysindexes
           where  id    = object_id('RECETAS')
            and   name  = 'PRODUCTO_RECETA_FK'
            and   indid > 0
            and   indid < 255)
   drop index RECETAS.PRODUCTO_RECETA_FK
go

if exists (select 1
            from  sysobjects
           where  id = object_id('RECETAS')
            and   type = 'U')
   drop table RECETAS
go

if exists (select 1
            from  sysobjects
           where  id = object_id('TIPOS_ITEMS')
            and   type = 'U')
   drop table TIPOS_ITEMS
go

if exists (select 1
            from  sysobjects
           where  id = object_id('VENDEDORES')
            and   type = 'U')
   drop table VENDEDORES
go

if exists(select 1 from systypes where name='DOMAIN_1')
   drop type DOMAIN_1
go

/*==============================================================*/
/* Domain: DOMAIN_1                                             */
/*==============================================================*/
create type DOMAIN_1
   from char(10)
go

/*==============================================================*/
/* Table: CAJAS                                                 */
/*==============================================================*/
create table CAJAS (
   CAJA_ID              int identity(1,1)    not null,
   PROD_ID              int                  null,
   CAJA_ALTO            decimal(10,3)        null,
   CAJA_ANCHO           decimal(10,3)        null,
   CAJA_PESO            decimal(10,3)        null,
   constraint PK_CAJAS primary key nonclustered (CAJA_ID)
)
go

/*==============================================================*/
/* Index: PRODUCTO_CAJA2_FK                                     */
/*==============================================================*/
create index PRODUCTO_CAJA2_FK on CAJAS (
PROD_ID ASC
)
go

/*==============================================================*/
/* Table: CATEGORIAS                                            */
/*==============================================================*/
create table CATEGORIAS (
   CATEGORIA_ID         int identity(1,1)    not null,
   ITEM_ID              int                  null,
   CATEGORIA_NOMBRE     varchar(100)         null,
   constraint PK_CATEGORIAS primary key nonclustered (CATEGORIA_ID)
)
go

/*==============================================================*/
/* Index: ITEM_CATEGORIA_FK                                     */
/*==============================================================*/
create index ITEM_CATEGORIA_FK on CATEGORIAS (
ITEM_ID ASC
)
go

/*==============================================================*/
/* Table: CLIENTES                                              */
/*==============================================================*/
create table CLIENTES (
   CLIENTE_ID           int identity(1,1)    not null,
   VENDEDOR_ID          int                  null,
   APELLIDOS_NOMBRES    varchar(100)         null,
   RAZON_SOCIAL         varchar(100)         null,
   CLIENTE_TELEFONO     varchar(100)         null,
   CLIENTE_CORREO       varchar(100)         null,
   constraint PK_CLIENTES primary key nonclustered (CLIENTE_ID)
)
go

/*==============================================================*/
/* Index: VENDEDORES_CLIENTES_FK                                */
/*==============================================================*/
create index VENDEDORES_CLIENTES_FK on CLIENTES (
VENDEDOR_ID ASC
)
go

/*==============================================================*/
/* Table: COLORES                                               */
/*==============================================================*/
create table COLORES (
   COLOR_ID             int identity(1,1)    not null,
   ITEM_ID              int                  null,
   COLOR_NOMBRE         varchar(100)         null,
   COLOR_FECHACREACION  datetime             null,
   constraint PK_COLORES primary key nonclustered (COLOR_ID)
)
go

/*==============================================================*/
/* Index: ITEM_COLOR_FK                                         */
/*==============================================================*/
create index ITEM_COLOR_FK on COLORES (
ITEM_ID ASC
)
go

/*==============================================================*/
/* Table: COMPRAS                                               */
/*==============================================================*/
create table COMPRAS (
   COMPRAS_ID           int identity(1,1)    not null,
   COMPRA_INVOICE       int                  null,
   COMPRAS_AWD          varchar(20)          null,
   COMPRAS_TOTAL        decimal(10,3)        null,
   COMPRAS_CANTIDAD     int                  null,
   constraint PK_COMPRAS primary key nonclustered (COMPRAS_ID)
)
go

/*==============================================================*/
/* Table: CORTES                                                */
/*==============================================================*/
create table CORTES (
   CORTE_ID             int identity(1,1)    not null,
   CORTE_NOMBRE         varchar(80)          null,
   constraint PK_CORTES primary key nonclustered (CORTE_ID)
)
go

/*==============================================================*/
/* Table: COSTOS                                                */
/*==============================================================*/
create table COSTOS (
   COSTO_ID             int identity(1,1)    not null,
   COSTO_VALOR          decimal(10,3)        null,
   constraint PK_COSTOS primary key nonclustered (COSTO_ID)
)
go

/*==============================================================*/
/* Table: DESPACHO                                              */
/*==============================================================*/
create table DESPACHO (
   DESPACHO_ID          int identity(1,1)    not null,
   DESPACHO_AEROLINIA   varchar(20)          null,
   DESPACHO_PAIS        varchar(50)          null,
   DESPACHO_HAWD        varchar(20)          null,
   DESPACHO_FECHA       datetime             null,
   constraint PK_DESPACHO primary key nonclustered (DESPACHO_ID)
)
go

/*==============================================================*/
/* Table: DESPACHO_ESPECIALIZACION                              */
/*==============================================================*/
create table DESPACHO_ESPECIALIZACION (
   COMPRAS_ID           int                  not null,
   DESPACHO_ID          int                  not null,
   constraint PK_DESPACHO_ESPECIALIZACION primary key (COMPRAS_ID, DESPACHO_ID)
)
go

/*==============================================================*/
/* Index: DESPACHO_ESPECIALIZACION_FK                           */
/*==============================================================*/
create index DESPACHO_ESPECIALIZACION_FK on DESPACHO_ESPECIALIZACION (
COMPRAS_ID ASC
)
go

/*==============================================================*/
/* Index: DESPACHO_ESPECIALIZACION2_FK                          */
/*==============================================================*/
create index DESPACHO_ESPECIALIZACION2_FK on DESPACHO_ESPECIALIZACION (
DESPACHO_ID ASC
)
go

/*==============================================================*/
/* Table: ESPECIALIZACIONES                                     */
/*==============================================================*/
create table ESPECIALIZACIONES (
   ESPECIALIZA_ID       int identity(1,1)    not null,
   ORDEN_ID             int                  null,
   PROD_ID              int                  null,
   ESPECIALIZA_NOMBRE   varchar(100)         null,
   ESPECIALIZA_PRECIO   decimal(10,3)        null,
   constraint PK_ESPECIALIZACIONES primary key nonclustered (ESPECIALIZA_ID)
)
go

/*==============================================================*/
/* Index: PRODUCTO_ESPECIALIZACION_FK                           */
/*==============================================================*/
create index PRODUCTO_ESPECIALIZACION_FK on ESPECIALIZACIONES (
PROD_ID ASC
)
go

/*==============================================================*/
/* Index: ORDEN_ESPECIALIZACION_FK                              */
/*==============================================================*/
create index ORDEN_ESPECIALIZACION_FK on ESPECIALIZACIONES (
ORDEN_ID ASC
)
go

/*==============================================================*/
/* Table: GRADES                                                */
/*==============================================================*/
create table GRADES (
   GRADE_ID             int identity(1,1)    not null,
   GRADE_NOMBRE         varchar(80)          null,
   constraint PK_GRADES primary key nonclustered (GRADE_ID)
)
go

/*==============================================================*/
/* Table: IMPUESTOS                                             */
/*==============================================================*/
create table IMPUESTOS (
   IMPUESTO_ID          int identity(1,1)    not null,
   IMPUESTO_NOMBRE      varchar(80)          null,
   constraint PK_IMPUESTOS primary key nonclustered (IMPUESTO_ID)
)
go

/*==============================================================*/
/* Table: ITEMS                                                 */
/*==============================================================*/
create table ITEMS (
   ITEM_ID              int identity(1,1)    not null,
   TIPO_ID              int                  null,
   IMPUESTO_ID          int                  null,
   COSTO_ID             int                  null,
   GRADE_ID             int                  null,
   CORTE_ID             int                  null,
   ITEM_NOMBRE          varchar(100)         null,
   ITEM_TAMANIO         decimal(10,3)        null,
   ITEM_CANTIDAD        decimal(10,3)        null,
   constraint PK_ITEMS primary key nonclustered (ITEM_ID)
)
go

/*==============================================================*/
/* Table: MATERIALES                                            */
/*==============================================================*/
create table MATERIALES (
   MATERIAL_ID          int identity(1,1)    not null,
   PROD_ID              int                  null,
   MATERIAL_NOMBRE      varchar(100)         null,
   MATERIAL_CANTIDAD    int                  null,
   MATERIAL_PRECIO      decimal(10,3)        null,
   constraint PK_MATERIALES primary key nonclustered (MATERIAL_ID)
)
go

/*==============================================================*/
/* Index: PRODUCTO_MATERIAL_FK                                  */
/*==============================================================*/
create index PRODUCTO_MATERIAL_FK on MATERIALES (
PROD_ID ASC
)
go

/*==============================================================*/
/* Table: MATERIAL_ITEMS                                        */
/*==============================================================*/
create table MATERIAL_ITEMS (
   MATEITEM_ID          int identity(1,1)    not null,
   RECETA_ID            int                  null,
   MATEITEM_NOMBRE      varchar(100)         null,
   MATEITEM_CANTIDAD    int                  null,
   MATEITEM_COSTO       decimal(10,3)        null,
   constraint PK_MATERIAL_ITEMS primary key nonclustered (MATEITEM_ID)
)
go

/*==============================================================*/
/* Index: CUALIDAD_MATERIAL_FK                                  */
/*==============================================================*/
create index CUALIDAD_MATERIAL_FK on MATERIAL_ITEMS (
RECETA_ID ASC
)
go

/*==============================================================*/
/* Table: ORDENES                                               */
/*==============================================================*/
create table ORDENES (
   ORDEN_ID             int identity(1,1)    not null,
   CLIENTE_ID           int                  null,
   ORDEN_FECHAINGRESO   datetime             null,
   ORDEN_FECHAENVIO     datetime             null,
   ORDEN_CANTIDAD       int                  null,
   constraint PK_ORDENES primary key nonclustered (ORDEN_ID)
)
go

/*==============================================================*/
/* Index: CLIENTE_ORDEN_FK                                      */
/*==============================================================*/
create index CLIENTE_ORDEN_FK on ORDENES (
CLIENTE_ID ASC
)
go

/*==============================================================*/
/* Table: PRODUCTOS                                             */
/*==============================================================*/
create table PRODUCTOS (
   PROD_ID              int identity(1,1)    not null,
   DESPACHO_ID          int                  null,
   CAJA_ID              int                  null,
   PROD_NOMBRE          varchar(100)         null,
   PROD_FECHACREACION   datetime             null,
   PROD_CANTIDAD        int                  null,
   PROD_TIPO            varchar(50)          null,
   PROD_PRESENTACION    varchar(100)         null,
   constraint PK_PRODUCTOS primary key nonclustered (PROD_ID)
)
go

/*==============================================================*/
/* Index: PRODUCTO_CAJA_FK                                      */
/*==============================================================*/
create index PRODUCTO_CAJA_FK on PRODUCTOS (
CAJA_ID ASC
)
go

/*==============================================================*/
/* Index: PRODUCTO_DESPACHO_FK                                  */
/*==============================================================*/
create index PRODUCTO_DESPACHO_FK on PRODUCTOS (
DESPACHO_ID ASC
)
go

/*==============================================================*/
/* Table: PRODUCTO_COMPRA                                       */
/*==============================================================*/
create table PRODUCTO_COMPRA (
   PROD_ID              int identity(1,1)    not null,
   COMPRAS_ID           int                  not null,
   constraint PK_PRODUCTO_COMPRA primary key (PROD_ID, COMPRAS_ID)
)
go

/*==============================================================*/
/* Index: PRODUCTO_COMPRA_FK                                    */
/*==============================================================*/
create index PRODUCTO_COMPRA_FK on PRODUCTO_COMPRA (
PROD_ID ASC
)
go

/*==============================================================*/
/* Index: PRODUCTO_COMPRA2_FK                                   */
/*==============================================================*/
create index PRODUCTO_COMPRA2_FK on PRODUCTO_COMPRA (
COMPRAS_ID ASC
)
go

/*==============================================================*/
/* Table: PROVEEDOR                                             */
/*==============================================================*/
create table PROVEEDOR (
   PROVEEDOR_ID         int identity(1,1)    not null,
   COMPRAS_ID           int                  null,
   PROVEEDOR_RUC        varchar(13)          null,
   PROVEEDOR_NOMBRE     varchar(80)          null,
   PROVEEDOR_DIRECCION  varchar(100)         null,
   PROVEEDOR_TELEFONO   varchar(10)          null,
   constraint PK_PROVEEDOR primary key nonclustered (PROVEEDOR_ID)
)
go

/*==============================================================*/
/* Index: COMPRA_PROVEEDOR_FK                                   */
/*==============================================================*/
create index COMPRA_PROVEEDOR_FK on PROVEEDOR (
COMPRAS_ID ASC
)
go

/*==============================================================*/
/* Table: RECETAS                                               */
/*==============================================================*/
create table RECETAS (
   RECETA_ID            int identity(1,1)    not null,
   ITEM_ID              int                  null,
   PROD_ID              int                  null,
   RECETA_NOMBRE        varchar(100)         null,
   RECETA_CANTIDAD      int                  null,
   RECETA_PRESENTACION  varchar(100)         null,
   constraint PK_RECETAS primary key nonclustered (RECETA_ID)
)
go

/*==============================================================*/
/* Index: PRODUCTO_RECETA_FK                                    */
/*==============================================================*/
create index PRODUCTO_RECETA_FK on RECETAS (
PROD_ID ASC
)
go

/*==============================================================*/
/* Table: TIPOS_ITEMS                                           */
/*==============================================================*/
create table TIPOS_ITEMS (
   TIPO_ID              int identity(1,1)    not null,
   TIPO_NOMBRE          varchar(80)          null,
   constraint PK_TIPOS_ITEMS primary key nonclustered (TIPO_ID)
)
go

/*==============================================================*/
/* Table: VENDEDORES                                            */
/*==============================================================*/
create table VENDEDORES (
   VENDEDOR_ID          int identity(1,1)    not null,
   VENDEDOR_NOMBRES     varchar(100)         null,
   VENDEDOR_DIRECCION   varchar(100)         null,
   VENDEDOR_TELEFONO    varchar(10)          null,
   constraint PK_VENDEDORES primary key nonclustered (VENDEDOR_ID)
)
go

alter table CAJAS
   add constraint FK_CAJAS_PRODUCTO__PRODUCTO foreign key (PROD_ID)
      references PRODUCTOS (PROD_ID)
go

alter table CATEGORIAS
   add constraint FK_CATEGORI_ITEM_CATE_ITEMS foreign key (ITEM_ID)
      references ITEMS (ITEM_ID)
go

alter table CLIENTES
   add constraint FK_CLIENTES_VENDEDORE_VENDEDOR foreign key (VENDEDOR_ID)
      references VENDEDORES (VENDEDOR_ID)
go

alter table COLORES
   add constraint FK_COLORES_ITEM_COLO_ITEMS foreign key (ITEM_ID)
      references ITEMS (ITEM_ID)
go

alter table DESPACHO_ESPECIALIZACION
   add constraint FK_DESPACHO_DESPACHO__COMPRAS foreign key (COMPRAS_ID)
      references COMPRAS (COMPRAS_ID)
go

alter table DESPACHO_ESPECIALIZACION
   add constraint FK_DESPACHO_DESPACHO__DESPACHO foreign key (DESPACHO_ID)
      references DESPACHO (DESPACHO_ID)
go

alter table ESPECIALIZACIONES
   add constraint FK_ESPECIAL_ORDEN_ESP_ORDENES foreign key (ORDEN_ID)
      references ORDENES (ORDEN_ID)
go

alter table ESPECIALIZACIONES
   add constraint FK_ESPECIAL_PRODUCTO__PRODUCTO foreign key (PROD_ID)
      references PRODUCTOS (PROD_ID)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_CORT_CORTES foreign key (CORTE_ID)
      references CORTES (CORTE_ID)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_COST_COSTOS foreign key (COSTO_ID)
      references COSTOS (COSTO_ID)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_GRAD_GRADES foreign key (GRADE_ID)
      references GRADES (GRADE_ID)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_IMPU_IMPUESTO foreign key (IMPUESTO_ID)
      references IMPUESTOS (IMPUESTO_ID)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_TIPO_TIPOS_IT foreign key (TIPO_ID)
      references TIPOS_ITEMS (TIPO_ID)
go

alter table MATERIALES
   add constraint FK_MATERIAL_PRODUCTO__PRODUCTO foreign key (PROD_ID)
      references PRODUCTOS (PROD_ID)
go

alter table MATERIAL_ITEMS
   add constraint FK_MATERIAL_CUALIDAD__RECETAS foreign key (RECETA_ID)
      references RECETAS (RECETA_ID)
go

alter table ORDENES
   add constraint FK_ORDENES_CLIENTE_O_CLIENTES foreign key (CLIENTE_ID)
      references CLIENTES (CLIENTE_ID)
go

alter table PRODUCTOS
   add constraint FK_PRODUCTO_PRODUCTO__CAJAS foreign key (CAJA_ID)
      references CAJAS (CAJA_ID)
go

alter table PRODUCTOS
   add constraint FK_PRODUCTO_PRODUCTO__DESPACHO foreign key (DESPACHO_ID)
      references DESPACHO (DESPACHO_ID)
go

alter table PRODUCTO_COMPRA
   add constraint FK_PRODUCTO_PRODUCTO__PRODUCTO foreign key (PROD_ID)
      references PRODUCTOS (PROD_ID)
go

alter table PRODUCTO_COMPRA
   add constraint FK_PRODUCTO_PRODUCTO__COMPRAS foreign key (COMPRAS_ID)
      references COMPRAS (COMPRAS_ID)
go

alter table PROVEEDOR
   add constraint FK_PROVEEDO_COMPRA_PR_COMPRAS foreign key (COMPRAS_ID)
      references COMPRAS (COMPRAS_ID)
go

alter table RECETAS
   add constraint FK_RECETAS_ITEMS_REC_ITEMS foreign key (ITEM_ID)
      references ITEMS (ITEM_ID)
go

alter table RECETAS
   add constraint FK_RECETAS_PRODUCTO__PRODUCTO foreign key (PROD_ID)
      references PRODUCTOS (PROD_ID)
go

