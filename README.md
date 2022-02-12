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
   npm install

   npm run dev
 ```

 - Para rodas as migrações (habilitar o banco de dados), rode o seguinte comando:
 ```
    docker-compose exec php php /var/www/html/artisan migrate
 ```
