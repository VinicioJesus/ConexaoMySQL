#comentário em linha
/*
comentario em bloco
*/
#cria um database
create database dbcontatos;

#é obrigatório escolher o database que será utilizado
use dbcontatos;


create table tblcontatos (
	idcontato int not null auto_increment primary key,
    nome varchar(80) not null,
    telefone varchar(18),
    celular varchar(19) not null,
    email varchar(320) not null,
    obs text    
);

show tables;


insert into tblcontatos (nome, telefone, celular, email, obs)
	values ('José da Silva', '(011)4772-4700', '(011)97878-0666',
    'jose@gmail.com', 'testando o mysql');

select * from tblcontatos;








