# teste-promobit
teste pratico promobit

## INSTRUÇÕES PARA RODAR (TODOS OS COMANDOS PELO SHELL)
 - Na pasta raiz do repo, rodar:
 ```
    docker-compose build | docker-compose up -d
 ```
 para configurar e iniciar os containers (acessar por localhost:8088).

 - Para instalar as dependências do framework front-end (inertia.js) e compilar as páginas, rode dentro da pasta src:
 ```
   composer install

   npm install

   npm run watch
 ```

 - Para rodas as migrações (habilitar o banco de dados), rode o seguinte comando (dentro da pasta /src):
 ```
    docker-compose exec php php /var/www/html/artisan migrate
 ```

 - OBS: Se você estiver utilizando um gerenciador de bancos (HeidiSQL, PHPMyAdmin, Beekeper, etc.), utilize o host
 "host.docker.internal" ao acessar em vez do localhost para acessar o banco.

 - Comando SQL para extrair relevância (quantidade de tags atrelada a cada produto): 
 ```
   SELECT p.name as product_name, count(tag_id) as relevance FROM product_tag pt 
   LEFT JOIN product p ON p.id = pt.product_id GROUP BY pt.product_id ORDER BY relevance DESC
 ```