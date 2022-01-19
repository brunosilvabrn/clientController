# clientController
### Sistema web para gerenciamento de clientes.
Sistema feito com o framework PHALCON PHP.

### 🔧 Instalação
### Necessário ter o ***Phalcon PHP*** instalado
[tutorial de instalação - Phalcon PHP](https://docs.phalcon.io/4.0/pt-br/installation)

<hr>

Importar as tabelas do banco de dados **sistema_clientes.sql** para o Mysql.

Defina os parâmentros de acesso ao banco de dados.<br> E defina a url base do Projeto.
<br>
No arquivo app/config/**config.php**

```
'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'sistema_clientes', // nome do banco 
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'baseUri'        => '/sistemaClientes/', // url base do projeto
    ]
```

## 

⌨️ Feito por [Bruno Lopes Silva](https://github.com/brunosilvabrn) 
