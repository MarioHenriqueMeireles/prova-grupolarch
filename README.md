# Prova de Seleção GrupoLarch

## Desafio

### Requisitos 


1. Um projeto PHP usando programação orientada a objetos

2. Com um framework MVC (Symfony, Laravel ou outro)

3. CRUD para armazenar clientes, dados:
    • Código
    • Nome
    • Endereço
    • Telefone
    • Status (ativo, excluído, inativo)
    • Data de nascimento

4. Danco de dados PostgreSQL

5. Listagem de clientes ordenados por nome

6. Exportaçao da listagem corrente, na ordem de exibiçao, feita em formato XLS, pormeio de uma requisição RESTFull.


## Apresentação 

O framework usado foi o Laraveln versão 6 e PostgresSQL 10.

O desafio foi cumprido, levando-se em conta a modelagem dos objetos. Exemplo: o endereço foi modelado e implementado como um objeto separado cliente.

Para o reúso e melhor organização, usou-se os Patterns Repository e Service Layer, ainda que de modo rudimentar.

As operações de criação e atualização foram validadas nas requisições.

A exportaçao da listagem foi feita com sucesso, como descrita, sendo a chamada realizada em JavasScript, como pode ser visto no arquivo "resouces/js/app.js", e em rota de "API" no Laravel ("routes/api.php"). 
Porém, o pdrão RESTFull não foi implementado em decorrencia do tempo.


## Instalação

1. Faça o download ou, se tiver instalado o Git, execute *git clone https://github.com/MarioHenriqueMeireles/prova-grupolarch.git*;
2. Acesse a pasta raiz e execute composer update, para instalar as dependencias;
3. Configure as variáveis do banco de no arquivo .env


DB_CONNECTION=pgsql  
DB_HOST=127.0.0.1  
DB_PORT=5432  
DB_DATABASE=laravel  
DB_USERNAME=<username>  
DB_PASSWORD=<password>  

4. Execute o comando *php artisan migrate --seed* (cria o banco de dados e popula).
5. Execute o comando *php artisan serve* e acesse no browser o endereço: *http://localhost:8000/*
