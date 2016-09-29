/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2008                    */
/* Created on:     29/09/2016 10:34:42                          */
/*==============================================================*/


/*==============================================================*/
/* Table: BOXES                                                 */
/*==============================================================*/
create table BOXES (
   ID_BOX               int identity(1,1)    not null,
   ID_PRODUCT           int                  null,
   ID_BTYPE             int                  null,
   ID_WEIGHT            int                  null,
   NAME_BOX             varchar(50)          null,
   HEIGHT_BOX           decimal(10,3)        null,
   WIDTH_BOX            decimal(10,3)        null,
   DENSITY_BOX          decimal(10,3)        null,
   DATE_BOX             datetime             null,
   SHORTNAME_BOX        varchar(10)          null,
   constraint PK_BOXES primary key nonclustered (ID_BOX)
)
go

/*==============================================================*/
/* Index: PRODUCT_BOXES2_FK                                     */
/*==============================================================*/
create index PRODUCT_BOXES2_FK on BOXES (
ID_PRODUCT ASC
)
go

/*==============================================================*/
/* Index: BOXES_TYPES_FK                                        */
/*==============================================================*/
create index BOXES_TYPES_FK on BOXES (
ID_BTYPE ASC
)
go

/*==============================================================*/
/* Index: WEIGHTES_BOXES_FK                                     */
/*==============================================================*/
create index WEIGHTES_BOXES_FK on BOXES (
ID_WEIGHT ASC
)
go

/*==============================================================*/
/* Table: BOX_TYPES                                             */
/*==============================================================*/
create table BOX_TYPES (
   ID_BTYPE             int identity(1,1)    not null,
   TYPEBOXE_BTYPE       varchar(10)          null,
   constraint PK_BOX_TYPES primary key nonclustered (ID_BTYPE)
)
go

/*==============================================================*/
/* Table: COLORS                                                */
/*==============================================================*/
create table COLORS (
   ID_COLOR             int identity(1,1)    not null,
   NAME_COLOR           varchar(100)         null,
   DATE_COLOR           datetime             null,
   constraint PK_COLORS primary key nonclustered (ID_COLOR)
)
go

/*==============================================================*/
/* Table: COSTS                                                 */
/*==============================================================*/
create table COSTS (
   ID_COST              int identity(1,1)    not null,
   VALUE_COST           decimal(10,3)        null,
   DATE_COST            datetime             null,
   constraint PK_COSTS primary key nonclustered (ID_COST)
)
go

/*==============================================================*/
/* Table: CUTS                                                  */
/*==============================================================*/
create table CUTS (
   ID_CUT               int identity(1,1)    not null,
   NAME_CUT             varchar(80)          null,
   DATE_CUT             datetime             null,
   constraint PK_CUTS primary key nonclustered (ID_CUT)
)
go

/*==============================================================*/
/* Table: DEALINGS                                              */
/*==============================================================*/
create table DEALINGS (
   ID_DEALING           int identity(1,1)    not null,
   TABLE_DEALING        varchar(50)          null,
   SYNTAXISAT_DEALING   varchar(100)         null,
   SYNTAXISNW_DEALING   varchar(100)         null,
   DATE_DEALING         datetime             null,
   IDUSER_DEALING       int                  null,
   constraint PK_DEALINGS primary key nonclustered (ID_DEALING)
)
go

/*==============================================================*/
/* Table: EPHITES                                               */
/*==============================================================*/
create table EPHITES (
   ID_EPITHES           int identity(1,1)    not null,
   ID_MATERIAL          int                  null,
   NAME_EPITHES         varchar(50)          null,
   constraint PK_EPHITES primary key nonclustered (ID_EPITHES)
)
go

/*==============================================================*/
/* Index: RELATIONSHIP_18_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_18_FK on EPHITES (
ID_MATERIAL ASC
)
go

/*==============================================================*/
/* Table: GRADES                                                */
/*==============================================================*/
create table GRADES (
   ID_GRADE             int identity(1,1)    not null,
   NAME_GRADE           varchar(80)          null,
   DATE_GRADE           datetime             null,
   constraint PK_GRADES primary key nonclustered (ID_GRADE)
)
go

/*==============================================================*/
/* Table: ITEMS                                                 */
/*==============================================================*/
create table ITEMS (
   ID_ITEM              int identity(1,1)    not null,
   ID_ITYPES            int                  null,
   ID_TAX               int                  null,
   ID_COLOR             int                  null,
   ID_COST              int                  null,
   ID_VARIETY           int                  null,
   ID_SPECIE            int                  null,
   ID_PRESCRIPTION      int                  null,
   ID_GRADE             int                  null,
   ID_CUT               int                  null,
   NAME_ITEM            varchar(100)         null,
   QUANTITY_ITEM        decimal(10,3)        null,
   constraint PK_ITEMS primary key nonclustered (ID_ITEM)
)
go

/*==============================================================*/
/* Index: ITEMS_PRESCRIPTION_FK                                 */
/*==============================================================*/
create index ITEMS_PRESCRIPTION_FK on ITEMS (
ID_PRESCRIPTION ASC
)
go

/*==============================================================*/
/* Index: ITEM_COLOR_FK                                         */
/*==============================================================*/
create index ITEM_COLOR_FK on ITEMS (
ID_COLOR ASC
)
go

/*==============================================================*/
/* Index: ITEM_COSTS_FK                                         */
/*==============================================================*/
create index ITEM_COSTS_FK on ITEMS (
ID_COST ASC
)
go

/*==============================================================*/
/* Index: ITEM_TYPES_FK                                         */
/*==============================================================*/
create index ITEM_TYPES_FK on ITEMS (
ID_ITYPES ASC
)
go

/*==============================================================*/
/* Index: ITEM_GRADE_FK                                         */
/*==============================================================*/
create index ITEM_GRADE_FK on ITEMS (
ID_GRADE ASC
)
go

/*==============================================================*/
/* Index: ITEM_CUTS_FK                                          */
/*==============================================================*/
create index ITEM_CUTS_FK on ITEMS (
ID_CUT ASC
)
go

/*==============================================================*/
/* Index: ITEM_TAXES_FK                                         */
/*==============================================================*/
create index ITEM_TAXES_FK on ITEMS (
ID_TAX ASC
)
go

/*==============================================================*/
/* Index: ITEM_VARIETYS_FK                                      */
/*==============================================================*/
create index ITEM_VARIETYS_FK on ITEMS (
ID_VARIETY ASC
)
go

/*==============================================================*/
/* Index: ITEM_SPECIE_FK                                        */
/*==============================================================*/
create index ITEM_SPECIE_FK on ITEMS (
ID_SPECIE ASC
)
go

/*==============================================================*/
/* Table: ITEMS_TYPES                                           */
/*==============================================================*/
create table ITEMS_TYPES (
   ID_ITYPES            int identity(1,1)    not null,
   NAME_ITYPES          varchar(80)          null,
   DATE_ITYPES          datetime             null,
   constraint PK_ITEMS_TYPES primary key nonclustered (ID_ITYPES)
)
go

/*==============================================================*/
/* Table: MATERIALS_ITEMS                                       */
/*==============================================================*/
create table MATERIALS_ITEMS (
   ID_MATERIAL          int identity(1,1)    not null,
   NAME_MATERIALS       varchar(100)         null,
   QUANTITY_MATERIAL    int                  null,
   constraint PK_MATERIALS_ITEMS primary key nonclustered (ID_MATERIAL)
)
go

/*==============================================================*/
/* Table: PROCESSES                                             */
/*==============================================================*/
create table PROCESSES (
   ID_PROCESS           int identity(1,1)    not null,
   ID_ITEM              int                  null,
   TYPE_PROCESS         varchar(80)          null,
   DATE_PROCESS         datetime             null,
   constraint PK_PROCESSES primary key nonclustered (ID_PROCESS)
)
go

/*==============================================================*/
/* Index: ITEM_PROCESS_FK                                       */
/*==============================================================*/
create index ITEM_PROCESS_FK on PROCESSES (
ID_ITEM ASC
)
go

/*==============================================================*/
/* Table: PRODUCTS                                              */
/*==============================================================*/
create table PRODUCTS (
   ID_PRODUCT           int identity(1,1)    not null,
   ID_BOX               int                  null,
   PRO_ID_PRODUCT       int                  null,
   NAME_PRODUCT         varchar(100)         null,
   DATECREATE_PRODUCT   datetime             null,
   PRESENTATION_PRODUCT varchar(100)         null,
   IMAGE_PRODUCT        text                 null,
   DESCRIPTION_PRODUCT  varchar(100)         null,
   QUANTITY_TOTAL_PRODUCT int                  null,
   STATUS_PRODUCT       varchar(20)          null,
   UPC_PRODUCT          varchar(20)          null,
   CODTYPE_PRODUCT      varchar(20)          null,
   MODIFYDATE_PRODU     datetime             null,
   ONLINENAME_PRODUCT   varchar(50)          null,
   ID_MATERIALP         int                  null,
   constraint PK_PRODUCTS primary key nonclustered (ID_PRODUCT)
)
go

/*==============================================================*/
/* Index: PRODUCT_BOXES_FK                                      */
/*==============================================================*/
create index PRODUCT_BOXES_FK on PRODUCTS (
ID_BOX ASC
)
go

/*==============================================================*/
/* Index: PROD_FK                                               */
/*==============================================================*/
create index PROD_FK on PRODUCTS (
PRO_ID_PRODUCT ASC
)
go

/*==============================================================*/
/* Table: PRODUCT_TYPES                                         */
/*==============================================================*/
create table PRODUCT_TYPES (
   ID_PTYPE             int identity(1,1)    not null,
   NAME_PTYPE           varchar(80)          null,
   constraint PK_PRODUCT_TYPES primary key nonclustered (ID_PTYPE)
)
go

/*==============================================================*/
/* Table: RECIPES                                               */
/*==============================================================*/
create table RECIPES (
   ID_PRESCRIPTION      int identity(1,1)    not null,
   ID_PTYPE             int                  null,
   ID_PRODUCT           int                  null,
   NAME_PRESCRIPTION    varchar(100)         null,
   STATUS_PRESCRIPTION  varchar(20)          null,
   QUANTITY_PRESCRIPTION int                  null,
   PRESENTATION_PRESCRIPTION varchar(100)         null,
   DATECREATE_PRESCRIPTION datetime             null,
   MODIFY_PRESCRIPTION  datetime             null,
   ID_MATERIALR         int                  null,
   constraint PK_RECIPES primary key nonclustered (ID_PRESCRIPTION)
)
go

/*==============================================================*/
/* Index: PRODUCT_RECIPIES_FK                                   */
/*==============================================================*/
create index PRODUCT_RECIPIES_FK on RECIPES (
ID_PRODUCT ASC
)
go

/*==============================================================*/
/* Index: PRODUCT_TYPE_FK                                       */
/*==============================================================*/
create index PRODUCT_TYPE_FK on RECIPES (
ID_PTYPE ASC
)
go

/*==============================================================*/
/* Table: SPECIES                                               */
/*==============================================================*/
create table SPECIES (
   ID_SPECIE            int identity(1,1)    not null,
   NAME_SPECIE          varchar(50)          null,
   DATE_SPECIE          datetime             null,
   constraint PK_SPECIES primary key nonclustered (ID_SPECIE)
)
go

/*==============================================================*/
/* Table: TAXES                                                 */
/*==============================================================*/
create table TAXES (
   ID_TAX               int identity(1,1)    not null,
   NAME_TAX             varchar(80)          null,
   COST_TAX             decimal(10,3)        null,
   DATE_TAX             datetime             null,
   constraint PK_TAXES primary key nonclustered (ID_TAX)
)
go

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
create table USERS (
   ID_USERS             int identity(1,1)    not null,
   NAME_USERS           varchar(80)          null,
   ADRESS_USERS         varchar(100)         null,
   PHONE_USERS          varchar(10)          null,
   NICK_USERS           varchar(10)          null,
   EMAIL_USERS          varchar(100)         null,
   DATECREATE_USERS     datetime             null,
   MODIFY_USERS         datetime             null,
   constraint PK_USERS primary key nonclustered (ID_USERS)
)
go

/*==============================================================*/
/* Table: USER_PASSWORDS                                        */
/*==============================================================*/
create table USER_PASSWORDS (
   ID_PASS              int identity(1,1)    not null,
   ID_USERS             int                  null,
   PASS                 varchar(10)          null,
   DATECREATE_PASS      datetime             null,
   STATUS_PASS          varchar(10)          null,
   MODIFI_PASS          datetime             null,
   constraint PK_USER_PASSWORDS primary key nonclustered (ID_PASS)
)
go

/*==============================================================*/
/* Index: USERS_PASSWORDS_FK                                    */
/*==============================================================*/
create index USERS_PASSWORDS_FK on USER_PASSWORDS (
ID_USERS ASC
)
go

/*==============================================================*/
/* Table: VARIETYS                                              */
/*==============================================================*/
create table VARIETYS (
   ID_VARIETY           int identity(1,1)    not null,
   NAME_VARIETY         varchar(80)          null,
   DATE_VARIETY         datetime             null,
   constraint PK_VARIETYS primary key nonclustered (ID_VARIETY)
)
go

/*==============================================================*/
/* Table: WEIGHTBOXES                                           */
/*==============================================================*/
create table WEIGHTBOXES (
   ID_WEIGHT            int identity(1,1)    not null,
   LB_WEIGHT            decimal(10,3)        null,
   KG_WEIGHT            decimal(10,3)        null,
   constraint PK_WEIGHTBOXES primary key nonclustered (ID_WEIGHT)
)
go

alter table BOXES
   add constraint FK_BOXES_BOXES_TYP_BOX_TYPE foreign key (ID_BTYPE)
      references BOX_TYPES (ID_BTYPE)
go

alter table BOXES
   add constraint FK_BOXES_PRODUCT_B_PRODUCTS foreign key (ID_PRODUCT)
      references PRODUCTS (ID_PRODUCT)
go

alter table BOXES
   add constraint FK_BOXES_WEIGHTES__WEIGHTBO foreign key (ID_WEIGHT)
      references WEIGHTBOXES (ID_WEIGHT)
go

alter table EPHITES
   add constraint FK_EPHITES_RELATIONS_MATERIAL foreign key (ID_MATERIAL)
      references MATERIALS_ITEMS (ID_MATERIAL)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEMS_PRE_RECIPES foreign key (ID_PRESCRIPTION)
      references RECIPES (ID_PRESCRIPTION)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_COLO_COLORS foreign key (ID_COLOR)
      references COLORS (ID_COLOR)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_COST_COSTS foreign key (ID_COST)
      references COSTS (ID_COST)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_CUTS_CUTS foreign key (ID_CUT)
      references CUTS (ID_CUT)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_GRAD_GRADES foreign key (ID_GRADE)
      references GRADES (ID_GRADE)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_SPEC_SPECIES foreign key (ID_SPECIE)
      references SPECIES (ID_SPECIE)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_TAXE_TAXES foreign key (ID_TAX)
      references TAXES (ID_TAX)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_TYPE_ITEMS_TY foreign key (ID_ITYPES)
      references ITEMS_TYPES (ID_ITYPES)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_VARI_VARIETYS foreign key (ID_VARIETY)
      references VARIETYS (ID_VARIETY)
go

alter table PROCESSES
   add constraint FK_PROCESSE_ITEM_PROC_ITEMS foreign key (ID_ITEM)
      references ITEMS (ID_ITEM)
go

alter table PRODUCTS
   add constraint FK_PRODUCTS_PROD_PRODUCTS foreign key (PRO_ID_PRODUCT)
      references PRODUCTS (ID_PRODUCT)
go

alter table PRODUCTS
   add constraint FK_PRODUCTS_PRODUCT_B_BOXES foreign key (ID_BOX)
      references BOXES (ID_BOX)
go

alter table RECIPES
   add constraint FK_RECIPES_PRODUCT_R_PRODUCTS foreign key (ID_PRODUCT)
      references PRODUCTS (ID_PRODUCT)
go

alter table RECIPES
   add constraint FK_RECIPES_PRODUCT_T_PRODUCT_ foreign key (ID_PTYPE)
      references PRODUCT_TYPES (ID_PTYPE)
go

alter table USER_PASSWORDS
   add constraint FK_USER_PAS_USERS_PAS_USERS foreign key (ID_USERS)
      references USERS (ID_USERS)
go

