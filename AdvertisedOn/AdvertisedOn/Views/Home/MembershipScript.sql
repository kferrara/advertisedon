
select * from Users

select * from Roles

select * from Applications

select * from UsersInRoles

insert into Roles (RoleId, ApplicationId, RoleName)
values ('0f8fad5b-d9cb-469f-a165-70867728950e', 'af9d0ad1-cb43-4bf7-9919-b6dd1401aa61', 'Administrator')

insert into UsersInRoles (UserId, RoleId)
values ('00f08e8d-1e10-4034-9bba-bdf24f0d1611', '0f8fad5b-d9cb-469f-a165-70867728950e')



