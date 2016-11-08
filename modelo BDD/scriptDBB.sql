/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2012                    */
/* Created on:     08/11/2016 16:30:18                          */
/*==============================================================*/


/*==============================================================*/
/* Table: BOXES                                                 */
/*==============================================================*/
create table BOXES (
   ID_BOX               int                  identity,
   ID_BTYPE             int                  null,
   ID_WEIGHT            int                  null,
   HEIGHT_BOX           decimal(10,3)        null,
   WIDTH_BOX            decimal(10,3)        null,
   LARGE_BOX            decimal(10,3)        null,
   DATE_BOX             datetime             null,
   LENGTH_BOX           decimal(10,3)        null,
   constraint PK_BOXES primary key nonclustered (ID_BOX)
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
   ID_BTYPE             int                  identity,
   TYPEBOXE_BTYPE       varchar(10)          null,
   DATECREATE_BTYPE     datetime             null,
   constraint PK_BOX_TYPES primary key nonclustered (ID_BTYPE)
)
go

/*==============================================================*/
/* Table: COLORS                                                */
/*==============================================================*/
create table COLORS (
   ID_COLOR             int                  identity,
   NAME_COLOR           varchar(100)         null,
   DATE_COLOR           datetime             null,
   constraint PK_COLORS primary key nonclustered (ID_COLOR)
)
go

/*==============================================================*/
/* Table: CUTS                                                  */
/*==============================================================*/
create table CUTS (
   ID_CUT               int                  identity,
   NAME_CUT             varchar(80)          null,
   DATE_CUT             datetime             null,
   constraint PK_CUTS primary key nonclustered (ID_CUT)
)
go

/*==============================================================*/
/* Table: DEALINGS                                              */
/*==============================================================*/
create table DEALINGS (
   ID_DEALING           int                  identity,
   TABLE_DEALING        varchar(50)          null,
   SYNTAXISAT_DEALING   varchar(100)         null,
   SYNTAXISNW_DEALING   varchar(100)         null,
   DATE_DEALING         datetime             null,
   IDUSER_DEALING       int                  null,
   constraint PK_DEALINGS primary key nonclustered (ID_DEALING)
)
go

/*==============================================================*/
/* Table: GRADES                                                */
/*==============================================================*/
create table GRADES (
   ID_GRADE             int                  identity,
   NAME_GRADE           varchar(80)          null,
   DATE_GRADE           datetime             null,
   constraint PK_GRADES primary key nonclustered (ID_GRADE)
)
go

/*==============================================================*/
/* Table: ITEMS                                                 */
/*==============================================================*/
create table ITEMS (
   ID_ITEM              int                  identity,
   ID_ITYPES            int                  null,
   ID_PROCESS           int                  null,
   ID_COLOR             int                  null,
   ID_SPECIE            int                  null,
   ID_GRADE             int                  null,
   ID_CUT               int                  null,
   DATE_ITEM            datetime             null,
   MODIFY_ITEM          datetime             null,
   DELETE_ITEM          datetime             null,
   STATE_ITEM           smallint             null default 0,
   constraint PK_ITEMS primary key nonclustered (ID_ITEM)
)
go

/*==============================================================*/
/* Index: ITEM_PROCESS_FK                                       */
/*==============================================================*/
create index ITEM_PROCESS_FK on ITEMS (
ID_PROCESS ASC
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
/* Index: ITEM_SPECIE_FK                                        */
/*==============================================================*/
create index ITEM_SPECIE_FK on ITEMS (
ID_SPECIE ASC
)
go

/*==============================================================*/
/* Table: ITEMS_RECIPES                                         */
/*==============================================================*/
create table ITEMS_RECIPES (
   ID_ITEM              int                  null,
   ID_RECIPE            int                  null,
   QUANTITY_RECIPEITEM  int                  null
)
go

/*==============================================================*/
/* Index: RELATIONSHIP_19_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_19_FK on ITEMS_RECIPES (
ID_ITEM ASC
)
go

/*==============================================================*/
/* Index: RELATIONSHIP_20_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_20_FK on ITEMS_RECIPES (
ID_RECIPE ASC
)
go

/*==============================================================*/
/* Table: ITEMS_TYPES                                           */
/*==============================================================*/
create table ITEMS_TYPES (
   ID_ITYPES            int                  identity,
   NAME_ITYPES          varchar(80)          null,
   DATE_ITYPES          datetime             null,
   constraint PK_ITEMS_TYPES primary key nonclustered (ID_ITYPES)
)
go

/*==============================================================*/
/* Table: MATERIALS_ITEMS                                       */
/*==============================================================*/
create table MATERIALS_ITEMS (
   ID_MATERIAL          int                  identity,
   NAME_MATERIALS       varchar(100)         null,
   ABREB_MATERIALS      varchar(10)          null,
   DATE_MATERIAL        datetime             null,
   MODIFY_MATERIAL      datetime             null,
   DELETE_MATERIAL      datetime             null,
   STATE_MATERIAL       int                  null,
   TYPE_MATERIALS       char(2)              null,
   constraint PK_MATERIALS_ITEMS primary key nonclustered (ID_MATERIAL)
)
go

/*==============================================================*/
/* Table: MATERIALS_PRODUCTS                                    */
/*==============================================================*/
create table MATERIALS_PRODUCTS (
   ID_MATERIAL          int                  null,
   ID_PRODUCT           int                  null,
   QUANTITY_PRODMAT     int                  null
)
go

/*==============================================================*/
/* Index: RELATIONSHIP_25_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_25_FK on MATERIALS_PRODUCTS (
ID_MATERIAL ASC
)
go

/*==============================================================*/
/* Index: RELATIONSHIP_26_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_26_FK on MATERIALS_PRODUCTS (
ID_PRODUCT ASC
)
go

/*==============================================================*/
/* Table: PRESENTATIONES                                        */
/*==============================================================*/
create table PRESENTATIONES (
   ID_PTYPE             int                  identity,
   NAME_PTYPE           varchar(80)          null,
   DATE_PTYPE           datetime             null,
   constraint PK_PRESENTATIONES primary key nonclustered (ID_PTYPE)
)
go

/*==============================================================*/
/* Table: PROCESS                                               */
/*==============================================================*/
create table PROCESS (
   ID_PROCESS           int                  identity,
   TYPE_PROCESS         varchar(80)          null,
   DATE_PROCESS         datetime             null,
   constraint PK_PROCESS primary key nonclustered (ID_PROCESS)
)
go

/*==============================================================*/
/* Table: PRODUCTS                                              */
/*==============================================================*/
create table PRODUCTS (
   ID_PRODUCT           int                  identity,
   ID_BOX               int                  null,
   CODE_PRODUCT         varchar(20)          null,
   NAME_PRODUCT         varchar(100)         null,
   DATECREATE_PRODUCT   datetime             null,
   IMAGE_PRODUCT        text                 null,
   DESCRIPTION_PRODUCT  varchar(100)         null,
   STATUS_PRODUCT       smallint             null,
   UPC_PRODUCT          varchar(20)          null,
   MODIFYDATE_PRODU     datetime             null,
   ONLINENAME_PRODUCT   varchar(50)          null,
   DATEDELETE_PRODUCT   datetime             null,
   ID_USERPROD          int                  null,
   CODIGOCADENA         text                 null,
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
/* Table: PRODUCT_RECIPIES                                      */
/*==============================================================*/
create table PRODUCT_RECIPIES (
   ID_RECIPE            int                  null,
   ID_PRODUCT           int                  null,
   PACK                 int                  null
)
go

/*==============================================================*/
/* Index: RELATIONSHIP_23_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_23_FK on PRODUCT_RECIPIES (
ID_RECIPE ASC
)
go

/*==============================================================*/
/* Index: RELATIONSHIP_24_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_24_FK on PRODUCT_RECIPIES (
ID_PRODUCT ASC
)
go

/*==============================================================*/
/* Table: RECIPES                                               */
/*==============================================================*/
create table RECIPES (
   ID_RECIPE            int                  identity,
   ID_PTYPE             int                  null,
   NAME_RECIPE          varchar(100)         null,
   STATUS_RECIPE        smallint             null,
   DATECREATE_RECIPE    datetime             null,
   MODIFY_RECIPE        datetime             null,
   DELETE_RECIPE        datetime             null,
   constraint PK_RECIPES primary key nonclustered (ID_RECIPE)
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
/* Table: RECIPE_ITEMS                                          */
/*==============================================================*/
create table RECIPE_ITEMS (
   ID_RECIPE            int                  null,
   ID_MATERIAL          int                  null,
   QUANTITY_RECIPEMAT   int                  null
)
go

/*==============================================================*/
/* Index: RELATIONSHIP_21_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_21_FK on RECIPE_ITEMS (
ID_RECIPE ASC
)
go

/*==============================================================*/
/* Index: RELATIONSHIP_22_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_22_FK on RECIPE_ITEMS (
ID_MATERIAL ASC
)
go

/*==============================================================*/
/* Table: SPECIES                                               */
/*==============================================================*/
create table SPECIES (
   ID_SPECIE            int                  identity,
   ID_TAX               int                  null,
   NAME_SPECIE          varchar(50)          null,
   DATE_SPECIE          datetime             null,
   constraint PK_SPECIES primary key nonclustered (ID_SPECIE)
)
go

/*==============================================================*/
/* Index: ITEM_TAXES_FK                                         */
/*==============================================================*/
create index ITEM_TAXES_FK on SPECIES (
ID_TAX ASC
)
go

/*==============================================================*/
/* Table: TAXES                                                 */
/*==============================================================*/
create table TAXES (
   ID_TAX               int                  identity,
   NAME_TAX             varchar(80)          null,
   COST_TAX             decimal(10,3)        null,
   DATE_TAX             datetime             null,
   COD_TAX              varchar(20)          null,
   constraint PK_TAXES primary key nonclustered (ID_TAX)
)
go

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
create table USERS (
   ID_USERS             int                  identity,
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
   ID_PASS              int                  identity,
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
/* Table: VARIETIES                                             */
/*==============================================================*/
create table VARIETIES (
   ID_VARIETY           int                  identity,
   ID_ITEM              int                  null,
   NAME_VARIETY         varchar(80)          null,
   DATE_VARIETY         datetime             null,
   constraint PK_VARIETIES primary key nonclustered (ID_VARIETY)
)
go

/*==============================================================*/
/* Index: ITEM_VARIETYS_FK                                      */
/*==============================================================*/
create index ITEM_VARIETYS_FK on VARIETIES (
ID_ITEM ASC
)
go

/*==============================================================*/
/* Table: WEIGHTBOXES                                           */
/*==============================================================*/
create table WEIGHTBOXES (
   ID_WEIGHT            int                  identity,
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
   add constraint FK_BOXES_WEIGHTES__WEIGHTBO foreign key (ID_WEIGHT)
      references WEIGHTBOXES (ID_WEIGHT)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_COLO_COLORS foreign key (ID_COLOR)
      references COLORS (ID_COLOR)
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
   add constraint FK_ITEMS_ITEM_PROC_PROCESS foreign key (ID_PROCESS)
      references PROCESS (ID_PROCESS)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_SPEC_SPECIES foreign key (ID_SPECIE)
      references SPECIES (ID_SPECIE)
go

alter table ITEMS
   add constraint FK_ITEMS_ITEM_TYPE_ITEMS_TY foreign key (ID_ITYPES)
      references ITEMS_TYPES (ID_ITYPES)
go

alter table ITEMS_RECIPES
   add constraint FK_ITEMS_RE_RELATIONS_ITEMS foreign key (ID_ITEM)
      references ITEMS (ID_ITEM)
go

alter table ITEMS_RECIPES
   add constraint FK_ITEMS_RE_RELATIONS_RECIPES foreign key (ID_RECIPE)
      references RECIPES (ID_RECIPE)
go

alter table MATERIALS_PRODUCTS
   add constraint FK_MATERIAL_RELATIONS_MATERIAL foreign key (ID_MATERIAL)
      references MATERIALS_ITEMS (ID_MATERIAL)
go

alter table MATERIALS_PRODUCTS
   add constraint FK_MATERIAL_RELATIONS_PRODUCTS foreign key (ID_PRODUCT)
      references PRODUCTS (ID_PRODUCT)
go

alter table PRODUCTS
   add constraint FK_PRODUCTS_PRODUCT_B_BOXES foreign key (ID_BOX)
      references BOXES (ID_BOX)
go

alter table PRODUCT_RECIPIES
   add constraint FK_PRODUCT__RELATIONS_RECIPES foreign key (ID_RECIPE)
      references RECIPES (ID_RECIPE)
go

alter table PRODUCT_RECIPIES
   add constraint FK_PRODUCT__RELATIONS_PRODUCTS foreign key (ID_PRODUCT)
      references PRODUCTS (ID_PRODUCT)
go

alter table RECIPES
   add constraint FK_RECIPES_PRODUCT_T_PRESENTA foreign key (ID_PTYPE)
      references PRESENTATIONES (ID_PTYPE)
go

alter table RECIPE_ITEMS
   add constraint FK_RECIPE_I_RELATIONS_RECIPES foreign key (ID_RECIPE)
      references RECIPES (ID_RECIPE)
go

alter table RECIPE_ITEMS
   add constraint FK_RECIPE_I_RELATIONS_MATERIAL foreign key (ID_MATERIAL)
      references MATERIALS_ITEMS (ID_MATERIAL)
go

alter table SPECIES
   add constraint FK_SPECIES_ITEM_TAXE_TAXES foreign key (ID_TAX)
      references TAXES (ID_TAX)
go

alter table USER_PASSWORDS
   add constraint FK_USER_PAS_USERS_PAS_USERS foreign key (ID_USERS)
      references USERS (ID_USERS)
go

alter table VARIETIES
   add constraint FK_VARIETIE_ITEM_VARI_ITEMS foreign key (ID_ITEM)
      references ITEMS (ID_ITEM)
go

