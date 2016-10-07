
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

create procedure asp_ConsultaItems
as
select it.ID_ITEM, it.NAME_ITEM, it.QUANTITY_ITEM, ity.NAME_ITYPES, pr.TYPE_PROCESS, co.NAME_COLOR, va.NAME_VARIETY, sp.NAME_SPECIE, gr.NAME_GRADE, cu.NAME_CUT, ta.NAME_TAX
from items it, ITEMS_TYPES ity, TAXES ta, PROCESS pr, COLORS co, VARIETIES va, SPECIES sp, GRADES gr, CUTS cu
where it.ID_ITYPES=ity.ID_ITYPES and
	it.ID_TAX=ta.ID_TAX and
	it.ID_PROCESS=pr.ID_PROCESS and
	it.ID_COLOR=co.ID_COLOR and
	it.ID_VARIETY=va.ID_VARIETY and
	IT.ID_SPECIE=SP.ID_SPECIE and
	it.ID_GRADE=gr.ID_GRADE and
	it.ID_CUT=cu.ID_CUT
go