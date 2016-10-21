
use inbloomOk
go

CREATE PROCEDURE ASP_LOGINUSERS @username varchar(50), @passuser varchar(50)
as
select u.name_users
from users u, user_passwords up
where u.id_users=up.id_users
and up.status_pass='enable';

go

CREATE PROCEDURE SP_LOGINUSER @name varchar(80), @address varchar(80), @phone varchar(10), @nick varchar(50), @email varchar(80), @pass varchar(20)
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

CREATE PROCEDURE ASP_CONSULTASPECIE
AS
SELECT SP.ID_SPECIE, SP.NAME_SPECIE, SP.DATE_SPECIE,TA.ID_TAX, TA.COD_TAX, TA.NAME_TAX, VA.ID_VARIETY, VA.NAME_VARIETY
FROM SPECIES SP, TAXES TA, VARIETIES VA
WHERE SP.ID_TAX=TA.ID_TAX AND SP.ID_VARIETY=VA.ID_VARIETY
ORDER BY SP.NAME_SPECIE, SP.DATE_SPECIE
GO

CREATE PROCEDURE ASP_CONSULTA_ITEMS
AS
SELECT IT.ID_ITEM, SP.ID_SPECIE, SP.NAME_SPECIE, CO.ID_COLOR, CO.NAME_COLOR, ITY.ID_ITYPES, ITY.NAME_ITYPES, CU.ID_CUT, CU.NAME_CUT, GR.ID_GRADE, GR.NAME_GRADE, PR.ID_PROCESS, PR.TYPE_PROCESS
FROM ITEMS IT, SPECIES SP, COLORS CO, ITEMS_TYPES ITY, CUTS CU, GRADES GR, PROCESS PR
WHERE IT.ID_SPECIE=SP.ID_SPECIE
AND IT.ID_COLOR=CO.ID_COLOR
AND IT.ID_ITYPES=ITY.ID_ITYPES
AND IT.ID_CUT=CU.ID_CUT
AND IT.ID_GRADE=GR.ID_GRADE
AND IT.ID_PROCESS=PR.ID_PROCESS
ORDER BY SP.NAME_SPECIE, CO.NAME_COLOR,  ITY.NAME_ITYPES
GO

CREATE PROCEDURE SP_ADD_ITEM_RECIPE(@idRecip int, @quanRecip int ,@idCol int, @idCut int, @idGra int, @idType int, @idProcess int, @idSpec int)
as
-- items receta
declare @idItem int

--comprueba que no exista creada la receta
set @idItem = (select ID_ITEM from items 
where ID_COLOR=@idCol and ID_CUT=@idCut and ID_GRADE=@idGra and ID_ITYPES=@idType and ID_PROCESS=@idProcess and ID_SPECIE=@idSpec)

if (@idItem=null) 
	insert into items(ID_COLOR, ID_CUT, ID_GRADE, ID_ITYPES, ID_PROCESS,ID_SPECIE, DATE_ITEM)
	values(@idCol, @idCut, @idGra, @idType, @idProcess, @idSpec, GETDATE());

-- almacena la id en la receta
insert into ITEMS_RECIPES(ID_RECIPE, ID_ITEM, QUANTITY_RECIPE)
values(@idRecip, @idItem, @quanRecip);

go

CREATE PROCEDURE SP_ADD_RECIPE_HEADER @idPtype INT
AS
DECLARE @vNum INT

set @vNum=(select SUBSTRING('RECETA-1',8,1) from RECIPES);

INSERT INTO RECIPES(ID_PTYPE, DATECREATE_RECIPE)
VALUES(@idPtype, GETDATE());

go