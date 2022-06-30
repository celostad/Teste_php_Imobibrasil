# Teste de seleção PHP Imobibrasil

## Tecnologias:

	- MySql 8.0.19
	- PHP 7.4.1
	- PhpMyadmin  5.0.1
	- Apache/2.4.38 (Debian)

## Instalação com docker:

1) Entrar na pasta do projeto

2) Executar o comando abaixo (Com o Docker iniciado):

	"docker-compose up -d"

3) 	Acessar o Phpmyadmin
	- endereço: http://localhost:5000/
	- criar o BD "sistimob" - utf8_general_ci
 
3) Realizar o upload do SQL:
	
  - Arquivo sql da pasta "html\database\sistimob.sql"
 
 4) Acessar o teste em:
 
  - http://localhost:8080/


## Instalação com LAMP:  
  
  - Copiar o conteúdo da pasta "html" e colar na pasta "www" ou "htdocs" do seu ambiente servidor PHP
  
  - Alterar os dados contidos no arquivo de conexao em "includes\connection.php"
  

OBS: Teste do Sistema online em: http://celostad.eu5.org/