create database id7218638_logistica;

use id7218638_logistica;

create table produto_pdo(
id int auto_increment not null,
nome varchar(30) not null,
codigo int unique not null,
datachegada varchar(30) ,
datavalidade varchar(30) ,
lote varchar(30) not null,
quantidade int not null,
estoque int not null,
id_user int,
constraint prod_pk primary key(id),
constraint prod_fk foreign key(id_user)
references usuario(id) 

);

create table usuario(
id int auto_increment,
nome varchar(30),
senha varchar(30),
constraint user_pk primary key(id) 
);

create table saida(
id int auto_increment unique key,
quantidade int,
constraint saida_pk primary key(id)
);




create table compoe(
id_comp int auto_increment not null,

id_produto int not null,

id_componente int not null,

constraint comp_pk primary key(id_comp)



);


alter table compoe add constraint produto_fk foreign key(id_produto) references produto_pdo(id);

alter table compoe add constraint componente_fk foreign key(id_componente) references produto_pdo(id);




