use vacina;
/*tabela vacina */
create table vacinas(
	nome varchar(50) not null unique,
	qt_vacinas bigint,
	qt_dosagem bigint not null,
	codigo int not null primary key auto_increment
)

/*tabela administrador*/
create table adm (
	usuario varchar(50) primary key,
	senha varchar(30),
	tipo_funcionario int 
) 

/*tabela pessoa */
create table pessoa (
	cart_sus varchar(20) primary key,
	cpf varchar(20) unique not null,
	rg varchar(20) unique not null,
	nome varchar(50) not null,
	rua varchar(30),
	numero varchar(10),
	bairro varchar(20),
	cidade varchar(20),
	telefone varchar(20),
	data_nasc date not null,
	prontuario varchar(20)
)


/*tabela imagens do portal*/
create table arquivo(
	codigo int primary key auto_increment,
	arquivo varchar(40)

)

/*tabela conteudo do portal */
create table conteudo(
	titulo varchar(50),
	conteudo text,
	design int,
	codigo int primary key auto_increment
)
/*tabela vacinação*/
create table vacinacao(
	cart_sus int,
	codvacina int,
	data_vacina date,
	foreign key (cart_sus) references pessoa(cart_sus),
	foreign key (codvacina) references vacinas(codigo),

)
/*tabela estoque */
create table estoque(
	qtd_ampola int,
    ml_ampola int not null,
    codvacina int,
    foreign key (codvacina) references vacina (codigo)
    

);