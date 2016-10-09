
use inbloom
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

CREATE PROCEDURE ASP_CONSULTASPECIE
AS
SELECT SP.ID_SPECIE, SP.NAME_SPECIE, SP.DATE_SPECIE,TA.ID_TAX, TA.COD_TAX, TA.NAME_TAX, VA.ID_VARIETY, VA.NAME_VARIETY
FROM SPECIES SP, TAXES TA, VARIETIES VA
WHERE SP.ID_TAX=TA.ID_TAX AND SP.ID_VARIETY=VA.ID_VARIETY
ORDER BY SP.NAME_SPECIE, SP.DATE_SPECIE
GO

CREATE PROCEDURE ASP_CONSULTA_ITEMS
AS
SELECT IT.ID_ITEM, SP.ID_SPECIE, SP.NAME_SPECIE, CO.ID_COLOR, CO.NAME_COLOR, ITY.ID_ITYPES, ITY.NAME_ITYPES, CU.ID_CUT, CU.NAME_CUT, GR.ID_GRADE, GR.NAME_GRADE
FROM ITEMS IT, SPECIES SP, COLORS CO, ITEMS_TYPES ITY, CUTS CU, GRADES GR
WHERE IT.ID_SPECIE=SP.ID_SPECIE
AND IT.ID_COLOR=CO.ID_COLOR
AND IT.ID_ITYPES=ITY.ID_ITYPES
AND IT.ID_CUT=CU.ID_CUT
AND IT.ID_GRADE=GR.ID_GRADE
ORDER BY SP.NAME_SPECIE, CO.NAME_COLOR,  ITY.NAME_ITYPES
GO