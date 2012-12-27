

select * from Users

select * from Roles

select * from Applications

select * from UsersInRoles

select * from Memberships

--insert into Roles (RoleId, ApplicationId, RoleName)
--values ('0f8fad5b-d9cb-469f-a165-70867728950e', 'af9d0ad1-cb43-4bf7-9919-b6dd1401aa61', 'Administrator')

--insert into UsersInRoles (UserId, RoleId)
--values ('00f08e8d-1e10-4034-9bba-bdf24f0d1611', '0f8fad5b-d9cb-469f-a165-70867728950e')

select * 
from Applications a
inner join Users u on a.ApplicationId = u.ApplicationId
inner join Roles r on a.ApplicationId = r.ApplicationId
inner join UsersInRoles ur on u.UserId = ur.UserId and r.RoleId = ur.RoleId
inner join Memberships m on ur.UserId = m.UserId


