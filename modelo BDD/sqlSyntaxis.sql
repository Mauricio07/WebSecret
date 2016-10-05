/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2012                    */
/* Created on:     05/10/2016 17:18:24                          */
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
   SHORTNAME_BOX        varchar(10)          null
)
go

alter table BOXES
   add constraint PK_BOXES primary key nonclustered (ID_BOX)
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
   TYPEBOXE_BTYPE       varchar(10)          null
)
go

alter table BOX_TYPES
   add constraint PK_BOX_TYPES primary key nonclustered (ID_BTYPE)
go

/*==============================================================*/
/* Table: COLORS                                                */
/*==============================================================*/
create table COLORS (
   ID_COLOR             int identity(1,1)    not null,
   NAME_COLOR           varchar(100)         null,
   DATE_COLOR           datetime             null
)
go

alter table COLORS
   add constraint PK_COLORS primary key nonclustered (ID_COLOR)
go

/*==============================================================*/
/* Table: COSTS                                                 */
/*==============================================================*/
create table COSTS (
   ID_COST              int identity(1,1)    not null,
   VALUE_COST           decimal(10,3)        null,
   DATE_COST            datetime             null
)
go

alter table COSTS
   add constraint PK_COSTS primary key nonclustered (ID_COST)
go

/*==============================================================*/
/* Table: CUTS                                                  */
/*==============================================================*/
create table CUTS (
   ID_CUT               int identity(1,1)    not null,
   NAME_CUT             varchar(80)          null,
   DATE_CUT             datetime             null
)
go

alter table CUTS
   add constraint PK_CUTS primary key nonclustered (ID_CUT)
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
   IDUSER_DEALING       int                  null
)
go

alter table DEALINGS
   add constraint PK_DEALINGS primary key nonclustered (ID_DEALING)
go

/*==============================================================*/
/* Table: EPHITES                                               */
/*==============================================================*/
create table EPHITES (
   ID_EPITHES           int identity(1,1)    not null,
   ID_MATERIAL          int                  null,
   NAME_EPITHES         varchar(50)          null
)
go

alter table EPHITES
   add constraint PK_EPHITES primary key nonclustered (ID_EPITHES)
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
   DATE_GRADE           datetime             null
)
go

alter table GRADES
   add constraint PK_GRADES primary key nonclustered (ID_GRADE)
go

/*==============================================================*/
/* Table: ITEMS                                                 */
/*==============================================================*/
create table ITEMS (
   ID_ITEM              int identity(1,1)    not null,
   ID_ITYPES            int                  null,
   ID_TAX               int                  null,
   ID_PROCESS           int                  null,
   ID_COLOR             int                  null,
   ID_COST              int                  null,
   ID_VARIATY           int                  null,
   ID_SPECIE            int                  null,
   ID_RECIPES           int                  null,
   ID_GRADE             int                  null,
   ID_CUT               int                  null,
   NAME_ITEM            varchar(100)         null,
   QUANTITY_ITEM        decimal(10,3)        null
)
go

alter table ITEMS
   add constraint PK_ITEMS primary key nonclustered (ID_ITEM)
go

/*==============================================================*/
/* Index: ITEMS_RECIPES_FK                                      */
/*==============================================================*/
create index ITEMS_RECIPES_FK on ITEMS (
ID_RECIPES ASC
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
ID_VARIATY ASC
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
   DATE_ITYPES          datetime             null
)
go

alter table ITEMS_TYPES
   add constraint PK_ITEMS_TYPES primary key nonclustered (ID_ITYPES)
go

/*==============================================================*/
/* Table: MATERIALS_ITEMS                                       */
/*==============================================================*/
create table MATERIALS_ITEMS (
   ID_MATERIAL          int identity(1,1)    not null,
   NAME_MATERIALS       varchar(100)         null,
   QUANTITY_MATERIAL    int                  null
)
go

alter table MATERIALS_ITEMS
   add constraint PK_MATERIALS_ITEMS primary key nonclustered (ID_MATERIAL)
go

/*==============================================================*/
/* Table: PRESENTATIONES                                        */
/*==============================================================*/
create table PRESENTATIONES (
   ID_PTYPE             int identity(1,1)    not null,
   NAME_PTYPE           varchar(80)          null,
   DATE_PTYPE           datetime             null
)
go

alter table PRESENTATIONES
   add constraint PK_PRESENTATIONES primary key nonclustered (ID_PTYPE)
go

/*==============================================================*/
/* Table: PROCESS                                               */
/*==============================================================*/
create table PROCESS (
   ID_PROCESS           int identity(1,1)    not null,
   TYPE_PROCESS         varchar(80)          null,
   DATE_PROCESS         datetime             null
)
go

alter table PROCESS
   add constraint PK_PROCESS primary key nonclustered (ID_PROCESS)
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
   ID_MATERIALP         int                  null
)
go

alter table PRODUCTS
   add constraint PK_PRODUCTS primary key nonclustered (ID_PRODUCT)
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
/* Table: RECIPES                                               */
/*==============================================================*/
create table RECIPES (
   ID_RECIPES           int identity(1,1)    not null,
   ID_PTYPE             int                  null,
   ID_PRODUCT           int                  null,
   NAME_RECIPES         varchar(100)         null,
   STATUS_RECIPES       varchar(20)          null,
   QUANTITY_RECIPES     int                  null,
   PRESENTATION_RECIPES varchar(100)         null,
   DATECREATE_RECIPES   datetime             null,
   MODIFY_RECIPES       datetime             null,
   ID_MATERIALR         int                  null
)
go

alter table RECIPES
   add constraint PK_RECIPES primary key nonclustered (ID_RECIPES)
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
   NAME_SPECIE          varchar(50)          null
)
go

alter table SPECIES
   add constraint PK_SPECIES primary key nonclustered (ID_SPECIE)
go

/*==============================================================*/
/* Table: TAXES                                                 */
/*==============================================================*/
create table TAXES (
   ID_TAX               int identity(1,1)    not null,
   NAME_TAX             varchar(80)          null,
   COST_TAX             decimal(10,3)        null,
   DATE_TAX             datetime             null
)
go

alter table TAXES
   add constraint PK_TAXES primary key nonclustered (ID_TAX)
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
   MODIFY_USERS         datetime             null
)
go

alter table USERS
   add constraint PK_USERS primary key nonclustered (ID_USERS)
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
   MODIFI_PASS          datetime             null
)
go

alter table USER_PASSWORDS
   add constraint PK_USER_PASSWORDS primary key nonclustered (ID_PASS)
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
   ID_VARIATY           int identity(1,1)    not null,
   NAME_VARIATY         varchar(80)          null,
   DATE_VARIATY         datetime             null
)
go

alter table VARIETIES
   add constraint PK_VARIETIES primary key nonclustered (ID_VARIATY)
go

/*==============================================================*/
/* Table: WEIGHTBOXES                                           */
/*==============================================================*/
create table WEIGHTBOXES (
   ID_WEIGHT            int identity(1,1)    not null,
   LB_WEIGHT            decimal(10,3)        null,
   KG_WEIGHT            decimal(10,3)        null
)
go

alter table WEIGHTBOXES
   add constraint PK_WEIGHTBOXES primary key nonclustered (ID_WEIGHT)
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
   add constraint FK_ITEMS_ITEMS_REC_RECIPES foreign key (ID_RECIPES)
      references RECIPES (ID_RECIPES)
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
   add constraint FK_ITEMS_ITEM_PROC_PROCESS foreign key (ID_PROCESS)
      references PROCESS (ID_PROCESS)
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
   add constraint FK_ITEMS_ITEM_VARI_VARIETIE foreign key (ID_VARIATY)
      references VARIETIES (ID_VARIATY)
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
   add constraint FK_RECIPES_PRODUCT_T_PRESENTA foreign key (ID_PTYPE)
      references PRESENTATIONES (ID_PTYPE)
go

alter table USER_PASSWORDS
   add constraint FK_USER_PAS_USERS_PAS_USERS foreign key (ID_USERS)
      references USERS (ID_USERS)
go

create procedure asp_loginUsers @username varchar(50), @passuser varchar(50)
as
select u.name_users
from users u, user_passwords up
where u.id_users=up.id_users
and up.status_pass='enable';

go

create procedure Sp_loginUser @name varchar(80), @address varchar(80), @phone varchar(10), @nick varchar(50), @email varchar(80), @pass varchar(20)
as
	declare @v_id int;

	insert into USERS(NAME_USERS, ADRESS_USERS, PHONE_USERS,NICK_USERS, EMAIL_USERS, DATECREATE_USERS)
	values (@name, @address, @phone, @nick, @email, getdate());

	set @v_id=(select MAX(id_users) from USERS);

	insert into USER_PASSWORDS(ID_USERS, PASS, DATECREATE_PASS, STATUS_PASS)
	values(@v_id, @pass, GETDATE(), 'Enable');
go

	exec Sp_loginUser 'HUERTAS MAURICIO','NINGUNA','0992696254','EMHT','emauricio@hotmail.com','123456';
	exec Sp_loginUser 'TORO ANDRES','NINGUNA','099999999','ANDRES','andres@hotmail.com','123456';
	exec Sp_loginUser 'BENAVIDES DAVID','NINGUNA','099999999','DAVID','david@hotmail.com','123456';
	exec Sp_loginUser 'JUAN CARLOS','NINGUNA','099999999','JUAN','jc@hotmail.com','123456';
go