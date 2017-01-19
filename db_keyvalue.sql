array (
'create table olog_keyvalue_keyvalue (id int not null auto_increment primary key, created_at_ts int not null default 0) engine InnoDB default charset utf8 /* rand3803 */;',
'alter table olog_keyvalue_keyvalue add column name varchar(255)  not null    /* rand722865 */;',
'alter table olog_keyvalue_keyvalue add column value varchar(255)   default ""  /* rand427276 */;',
'alter table olog_keyvalue_keyvalue add unique key UK_name_722823 (name)  /* rand586465 */;',
'alter table olog_keyvalue_keyvalue CHANGE COLUMN `value` `value` text /* rand32w984122123232791 */',
'insert into olog_auth_permission (title) values ("PERMISSION_KEYVALUE_MANAGE") /* rand26524034571q1 */;',
)