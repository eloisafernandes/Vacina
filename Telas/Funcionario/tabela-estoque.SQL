use vacina;

create table estoque(
	qtd_ampola int,
    ml_ampola int not null,
    validade int not null,
    codvacina int,
    foreign key (codvacina) references vacina (codigo)
    

);
