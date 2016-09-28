create procedure asp_loginUsers @username varchar(50), @passuser varchar(50)
as
select u.name_users
from users u, user_passwords up
where u.id_users=up.id_users
and up.status_pass='enable';