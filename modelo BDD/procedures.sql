
use inbloomOk
go

CREATE PROCEDURE ASP_LOGINUSERS @username varchar(50), @passuser varchar(50)
as
SELECT USERS.NAME_USERS
FROM USERS, USER_PASSWORDS
WHERE USERS.ID_USERS=USER_PASSWORDS.ID_USERS
AND USERS.NICK_USERS=@username
AND USER_PASSWORDS.PASS =@passuser
AND USER_PASSWORDS.STATUS_PASS='enable'

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
	exec Sp_loginUser 'BENAVIDES DAVID','NINGUNA','099999999','DAVID','david@hotmail.com','123459';
	exec Sp_loginUser 'JUAN CARLOS','NINGUNA','099999999','JUAN','jc@hotmail.com','123456';
go

CREATE PROCEDURE ASP_CONSULTASPECIE
AS
SELECT SP.ID_SPECIE, SP.NAME_SPECIE, SP.DATE_SPECIE,TA.ID_TAX, TA.COD_TAX, TA.NAME_TAX
FROM SPECIES SP, TAXES TA, VARIETIES VA
WHERE SP.ID_TAX=TA.ID_TAX 
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

CREATE PROCEDURE SP_ADD_ITEM_RECIPE(@idRecip int, @quanRecip int ,@idCol int, @idCut int, @idGra int, @idType int, @idProcess int, @idSpec int, @idVariety int)
as
-- items receta
declare @idItem int
SET NOCOUNT ON
--comprueba que no exista creada la receta
set @idItem =(select count(*) from items where ID_COLOR=@idCol and ID_CUT=@idCut and ID_GRADE=@idGra and ID_ITYPES=@idType 
and ID_PROCESS=@idProcess and ID_SPECIE=@idSpec)

if (@idItem=0)
begin
	--ADD ITEM SPECIE
	insert into items(ID_COLOR, ID_CUT, ID_GRADE, ID_ITYPES, ID_PROCESS,ID_SPECIE, ID_VARIETY, DATE_ITEM, STATE_ITEM)
	values(@idCol, @idCut, @idGra, @idType, @idProcess, @idSpec, @idVariety, GETDATE(),1);
end

set @idItem =(select ID_ITEM from items where ID_COLOR=@idCol and ID_CUT=@idCut 
and ID_GRADE=@idGra and ID_ITYPES=@idType and ID_PROCESS=@idProcess and ID_SPECIE=@idSpec AND ID_VARIETY=@idVariety)		

-- almacena la id en la receta
if (select count(*) from ITEMS_RECIPES where ID_RECIPE=@idRecip and ID_ITEM=@idItem)=0
begin
	insert into ITEMS_RECIPES(ID_RECIPE, ID_ITEM, QUANTITY_RECIPEITEM)
	values(@idRecip, @idItem, @quanRecip);
end

select @idItem as 'INDEX';
go

CREATE PROCEDURE SP_ADD_RECIPE_HEADER @idProduct int, @idPtype INT
AS
DECLARE @vNum INT

SET NOCOUNT ON

set @vNum=(SELECT ISNULL(MAX(ID_RECIPE),0) FROM RECIPES)+1;

INSERT INTO RECIPES(ID_PTYPE, DATECREATE_RECIPE, STATUS_RECIPE, NAME_RECIPE)
VALUES(@idPtype, GETDATE(),1, CONCAT('RECIPE_',@vNum));

SELECT MAX(ID_RECIPE)as'ID_RECIPE' FROM RECIPES
go

CREATE PROCEDURE SP_UPDATE_RECIPE_HEADER @IdproductUpdate int, @idPtype int 
AS
DECLARE @IdRecipe int
SET NOCOUNT ON
SET @IdRecipe=(SELECT ID_RECIPE FROM RECIPES 
				WHERE ID_PTYPE=@idPtype 
				AND ID_RECIPE=(SELECT ID_RECIPE FROM PRODUCT_RECIPIES WHERE ID_PRODUCT=@IdproductUpdate))

IF @IdRecipe>0
	BEGIN
		UPDATE RECIPES SET ID_PTYPE=@idPtype, MODIFY_RECIPE=GETDATE() 
		where ID_RECIPE=@IdRecipe
	END
ELSE
	BEGIN
		EXEC SP_ADD_RECIPE_HEADER 0, @idPtype
	END
SELECT @IdRecipe AS'OK'
GO

CREATE PROCEDURE SP_ADD_UPDATE_PRODUCTS @id_ProdUpdate int, @pack int, @idBox int, @codProd varchar(20),
	@nameProd varchar(100), @path varchar(200), @desc varchar(100), @codUpc varchar(20), @onlineName varchar(100),@itemNum int ,@iduser int
AS

declare @IdProd int
SET NOCOUNT ON
BEGIN TRANSACTION
	BEGIN TRY
		if (@id_ProdUpdate=0)
		begin
			-- ADD PRODUCT
			INSERT INTO PRODUCTS(CODE_PRODUCT, NAME_PRODUCT, ID_BOX, IMAGE_PRODUCT, DESCRIPTION_PRODUCT, UPC_PRODUCT, ITEM_NUMBER, ONLINENAME_PRODUCT, DATECREATE_PRODUCT,ID_USERPROD)
			VALUES(@codProd, @nameProd, @idBox, @path, @desc, @codUpc,@itemNum, @onlineName, GETDATE(),@iduser);
		
			SELECT MAX(ID_PRODUCT) AS'ID' FROM PRODUCTS;
		end
		else
		begin
			-- ADD PRODUCT
			UPDATE PRODUCTS
			SET CODE_PRODUCT=@codProd, NAME_PRODUCT=@nameProd,  ID_BOX= @idBox, DESCRIPTION_PRODUCT=@desc, 	 
			UPC_PRODUCT= @codUpc,  ONLINENAME_PRODUCT=@onlineName, MODIFYDATE_PRODU= GETDATE(),	ID_USERPROD=@iduser
			WHERE  ID_PRODUCT=@id_ProdUpdate	

			if LEN(@path)>0
			begin
			UPDATE PRODUCTS SET IMAGE_PRODUCT=@path WHERE ID_PRODUCT=@id_ProdUpdate	
			end
		
			SELECT @id_ProdUpdate AS'ID'
		end
		COMMIT --add
	END TRY
	BEGIN CATCH
		ROLLBACK
		SELECT 0;
	END CATCH
go


CREATE PROCEDURE SP_HABILITA_PRODUCTO @IdProd int
as
declare @id_Receta int
declare @state int

set @state=0;
--producto recetas
SET NOCOUNT ON
if (select count(*) from PRODUCT_RECIPIES where ID_PRODUCT=@IdProd)>=1
begin
	set @id_Receta=(select top 1 ID_RECIPE from PRODUCT_RECIPIES where ID_PRODUCT=@IdProd);
	-- receta items
	if (select count(*) from RECIPE_ITEMS where ID_RECIPE=@id_Receta)>=1
	begin
		--materiales productos
		if (select count(*) from MATERIALS_PRODUCTS where ID_PRODUCT=@IdProd)>=1		
			set @state=1;					
	end 
end

UPDATE PRODUCTS SET STATUS_PRODUCT=@state WHERE ID_PRODUCT=@IdProd;
SELECT @state AS 'OK'

GO

-- OJO
CREATE PROCEDURE SP_ADD_PRODUCT_RECIPE @idProd int, @idRecipe int, @pack int
AS
-- ADD PRODUCT RECIPES
set nocount on
if @idRecipe>0
begin	
	INSERT INTO PRODUCT_RECIPIES(ID_PRODUCT, ID_RECIPE, PACK)
	VALUES(@IdProd, @idRecipe, @pack);
	--cambia el estado activado si cumple con los requisitos minimos	
end
select 	@idRecipe as'ok'

go
CREATE PROCEDURE SP_ADD_MATERIALS_PRODUCT @idProd int, @idMat int, @quantity int
AS
SET NOCOUNT ON
	INSERT INTO MATERIALS_PRODUCTS(ID_PRODUCT, ID_MATERIAL,QUANTITY_PRODMAT)
	VALUES(@idProd,@idMat, @quantity);
	SELECT @idProd as'ok'
go

CREATE PROCEDURE SP_ADD_MATERIAL_RECIPE @idRecipe int, @idMaterial int, @quantity int
AS
SET NOCOUNT ON
if (select count(*) from RECIPE_ITEMS where ID_RECIPE=@idRecipe and ID_MATERIAL=@idMaterial)=0
begin
	INSERT INTO RECIPE_ITEMS (ID_RECIPE, ID_MATERIAL, QUANTITY_RECIPEMAT)
	VALUES(@idRecipe,@idMaterial, @quantity);
end
	select @idRecipe as'ok'
go

CREATE PROCEDURE SP_ADD_TYPEBOXES @type int, @length float, @width float, @height float, @weight float
AS
-- Insert Wight boxes
DECLARE @idWeight int;
set nocount on
INSERT INTO WEIGHTBOXES (LB_WEIGHT, KG_WEIGHT)
VALUES(@weight, (@weight/2.2))

set @idWeight=(SELECT MAX(ID_WEIGHT) FROM WEIGHTBOXES);

-- insrt Boxes
INSERT INTO BOXES(ID_BTYPE, ID_WEIGHT, HEIGHT_BOX, WIDTH_BOX, LENGTH_BOX, DATE_BOX)
VALUES(@type, @idWeight, @height, @width ,@length, GETDATE());

select @idWeight as'ok'

GO

CREATE PROCEDURE ASP_ITEMS_RECIPE @idSpecie int, @idColor int, @idProcess int, @type int, 
@idCuts int, @idGrade int, @idVariety int,@quantity int,  @indexItemRecipe int, @indexRecipe int
AS
SELECT (SELECT NAME_SPECIE FROM SPECIES WHERE ID_SPECIE=@idSpecie)AS'SPECIE',
	   (SELECT NAME_COLOR FROM COLORS WHERE ID_COLOR=@idColor)AS'COLOR',
	   (SELECT TYPE_PROCESS FROM PROCESS WHERE ID_PROCESS=@idProcess)AS'PROCESS',
	   (SELECT NAME_ITYPES FROM ITEMS_TYPES WHERE ID_ITYPES=@type)AS'TYPE',
	   (SELECT NAME_CUT FROM CUTS WHERE ID_CUT=@idCuts)AS'CUTS',
	   (SELECT NAME_VARIETY FROM VARIETIES WHERE ID_VARIETY=@idVariety)AS'VARIETY',
	   (SELECT NAME_GRADE FROM GRADES WHERE ID_GRADE=@idGrade)AS'GRADE',
	   @quantity AS 'QUANTITY', @indexItemRecipe as 'INDEXITEMRECIPE', @indexRecipe as 'INDEXRECIPE'


go

CREATE PROCEDURE ASP_HEADER_PRODUCTS @idProd int
AS
select ID_PRODUCT,CODE_PRODUCT, NAME_PRODUCT, ONLINENAME_PRODUCT,IMAGE_PRODUCT, DESCRIPTION_PRODUCT, UPC_PRODUCT 
from PRODUCTS 
where ID_PRODUCT=@idProd
go

go
CREATE PROCEDURE ASP_MATERIALS_PRODUCTS @idProduct int
AS
select P.ID_PRODUCT, MI.ID_MATERIAL, MI.NAME_MATERIALS, MAPR.QUANTITY_PRODMAT 
from MATERIALS_ITEMS MI, PRODUCTS P, MATERIALS_PRODUCTS MAPR
WHERE MAPR.ID_PRODUCT=P.ID_PRODUCT
AND MAPR.ID_MATERIAL=MI.ID_MATERIAL
AND P.ID_PRODUCT=@idProduct

go

CREATE PROCEDURE ASP_RECIPE_PRODUCTS @idProduct int
AS
SELECT PRODUCT_RECIPIES.ID_PRODUCT, RECIPES.ID_RECIPE, RECIPES.ID_PTYPE, PRESENTATIONES.NAME_PTYPE, PRODUCT_RECIPIES.PACK 
FROM PRODUCT_RECIPIES, RECIPES, PRESENTATIONES
WHERE PRODUCT_RECIPIES.ID_RECIPE=RECIPES.ID_RECIPE
AND RECIPES.ID_PTYPE =PRESENTATIONES.ID_PTYPE
AND PRODUCT_RECIPIES.ID_PRODUCT=@idProduct
AND RECIPES.STATUS_RECIPE=1


GO
CREATE PROCEDURE ASP_RECIPES_ITEMS @idProduct int, @idRecipe int
AS
SELECT RECIPES.ID_RECIPE, ITEMS.ID_ITEM, ITEMS.ID_SPECIE, ID_COLOR, ID_PROCESS, ID_ITYPES, ID_CUT, ID_GRADE, ID_VARIETY, ITEMS_RECIPES.QUANTITY_RECIPEITEM
FROM PRODUCT_RECIPIES, RECIPES, ITEMS_RECIPES, PRESENTATIONES, ITEMS
WHERE PRODUCT_RECIPIES.ID_RECIPE=RECIPES.ID_RECIPE
AND RECIPES.ID_RECIPE=ITEMS_RECIPES.ID_RECIPE
AND RECIPES.ID_PTYPE=PRESENTATIONES.ID_PTYPE
AND ITEMS_RECIPES.ID_ITEM=ITEMS.ID_ITEM
AND PRODUCT_RECIPIES.ID_PRODUCT=@idProduct
AND RECIPES.ID_RECIPE=@idRecipe

GO
CREATE PROCEDURE ASP_RECIPE_MATERIALS @idRecipe int
AS
SELECT RECIPE_ITEMS.ID_RECIPE, MATERIALS_ITEMS.ID_MATERIAL,MATERIALS_ITEMS.NAME_MATERIALS, RECIPE_ITEMS.QUANTITY_RECIPEMAT
FROM RECIPE_ITEMS, MATERIALS_ITEMS
WHERE RECIPE_ITEMS.ID_MATERIAL=MATERIALS_ITEMS.ID_MATERIAL
AND RECIPE_ITEMS.ID_RECIPE=@idRecipe
GO

CREATE PROCEDURE SP_UPDATE_PRODUCTS @IdProd int
as
DECLARE @IdRecipe int
SET NOCOUNT ON 
--MATERIALS PRODUCTS
	DELETE FROM MATERIALS_PRODUCTS WHERE ID_PRODUCT=@IdProd;

--RECIPE ITEMS
	DELETE FROM RECIPE_ITEMS WHERE ID_RECIPE=(SELECT ID_RECIPE FROM PRODUCT_RECIPIES WHERE ID_PRODUCT=@IdProd)

--ITEMS RECIPE
	DELETE FROM ITEMS_RECIPES WHERE ID_RECIPE=(SELECT ID_RECIPE FROM PRODUCT_RECIPIES WHERE ID_PRODUCT=@IdProd)

--PRODUCT RECIPES	
	DELETE FROM PRODUCT_RECIPIES WHERE ID_RECIPE IN (SELECT ID_RECIPE FROM PRODUCT_RECIPIES WHERE ID_PRODUCT=@IdProd);

SELECT @IdRecipe AS 'OK'
go

CREATE VIEW VW_REP_BOXES 
AS
SELECT BT.TYPEBOXE_BTYPE, B.ID_BOX, B.LENGTH_BOX, B.WIDTH_BOX, B.HEIGHT_BOX, W.LB_WEIGHT, W.KG_WEIGHT
FROM BOXES B, WEIGHTBOXES W, BOX_TYPES BT
WHERE B.ID_BTYPE=BT.ID_BTYPE
AND B.ID_WEIGHT=W.ID_WEIGHT

GO

CREATE VIEW VW_BOXES
AS
SELECT B.ID_BOX, BT.TYPEBOXE_BTYPE, CONCAT(B.HEIGHT_BOX ,' X ', B.WIDTH_BOX, ' X ',B.LENGTH_BOX)AS 'DATA', WB.KG_WEIGHT
FROM BOXES B, BOX_TYPES BT, WEIGHTBOXES WB
WHERE B.ID_BTYPE=BT.ID_BTYPE
and b.ID_WEIGHT=wb.ID_WEIGHT

go

CREATE VIEW VW_REP_PRODUCTS
AS
SELECT P.ID_PRODUCT,CODE_PRODUCT, P.NAME_PRODUCT, P.ONLINENAME_PRODUCT, P.UPC_PRODUCT, P.IMAGE_PRODUCT, BT.TYPEBOXE_BTYPE, P.STATUS_PRODUCT
FROM PRODUCTS P, BOXES B, BOX_TYPES BT
WHERE B.ID_BOX=P.ID_BOX
AND B.ID_BTYPE=BT.ID_BTYPE
AND P.STATUS_PRODUCT>-1
GO
