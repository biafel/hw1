create database test_data;

use test_data;

CREATE TABLE users (
	id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null
) ;

create table canzone (
   id  integer primary key auto_increment,
   titolo varchar (255) not null,
   cantante varchar(255) not null,
   album varchar(255) not null,
   anno int ,
   durata int,
   url text not null
); 

create table ultimi_ascolti(
 id_canzone int,
 id_user int,
 index new_id(id_canzone),
 foreign key (id_canzone)
 references canzone(id) on update cascade,
 index new_id2(id_user),
 foreign key (id_user)
 references users (id) on update cascade
 
 );
 
select * from users;
 
 create table favorites(
  id_user int auto_increment,
  img varchar(255),
  url varchar(255),
  index new_id2(id_user),
  foreign key (id_user)
  references users (id) on update cascade,
  primary key(id_user, img)
);

insert into canzone values ('1','Bailando','io','Bailar','2010','20','https://media.ilsoftware.it/images/500x500/img_24553.jpg');

insert into ultimi_ascolti values ('1','1');
select * from ultimi_ascolti;

select * from canzone where titolo = 'Bailando';

select * from favorites;

delete from favorites;

select * from canzone;

delete from favorites where id_user=1;

