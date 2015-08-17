SISDEPEN-FORMS INSTALAÇÃO
===============
Para utilizar o SISDEPEN-FORMS, siga os passos a seguir.

No Ubuntu, instale os seguintes pacotes. Procure os pacotes correspondentes a sua distribuição.

	$ sudo apt-get install nginx php5-xdebug php5-curl php5-fpm php5-mongo mongodb nodejs nodejs-legacy npm

Em seguida, instale o bower

	$ sudo npm install -g bower

Algumas distribuições não instalam o bower no /usr/bin/bower, como os scripts referencia o programa nesse lugar, faça um link simbólico:

	$ sudo ln -s /usr/local/bin/bower /usr/bin/bower

Em seguida, vamos baixar as dependências de projeto e montar os objetos de negócio

	$ composer install

	$ php app/console d:m:s:c --index

	$ php app/console d:m:f:l --append

Com o esse comandos, a aplicação está pronta. Agora é preciso configurar o servidor Web. A sugestão é o uso do nginx para executar esse trabalho. Existe um arquivo de exemplo em docs/nginx/vhost-sammui_full.conf. Copie-o para a pasta /etc/nginx/sites-avaiable e ative-o no nginx.

Reinicie o nginx e a aplicação deverá estar funcionando normalmente.

Para limpar o cache e renovar a aplicação
======
    $ rm -rf app/cache/* && php app/console d:m:s:d && php app/console d:m:s:c --index &&  php app/console d:m:f:l --append

Para rodar os teses, adicionar --env=test depois de cada app/console

Para rodar os testes do projeto
======
    ./bin/phpunit -c app
