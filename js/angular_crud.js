
var app = angular.module('portal', []);

//CONTROLERS


app.controller('crud', function($scope) {
    //RESPONSAVEL PELAS DIVS DINAMICAS COM NG-SHOW
    $scope.Noticia = true;
    $scope.NovaNoticia = false;
    $scope.EditaNoticia = false;
    $scope.ListaUsuarios = false;
    $scope.NovoUsuario = false;
    $scope.EditaUsuario = false;


    $scope.showNoticia = function() {
        $scope.Noticia = true;
        $scope.NovaNoticia = false;
        $scope.EditaNoticia = false;
        $scope.ListaUsuarios = false;
        $scope.NovoUsuario = false;
         $scope.EditaUsuario = false;

    }
    $scope.showNovaNoticia = function(){
        $scope.NovaNoticia = true;
        $scope.Noticia = false;
        $scope.EditaNoticia = false;
        $scope.ListaUsuarios = false;
        $scope.NovoUsuario = false;
        $scope.EditaUsuario = false;


    }
    $scope.showEditaNoticia = function(id,titulo,chamada,texto,
        //Editar noticia com passagem de parametros para utilizar em outro controller
        autor){
        $scope.id=id;
        $scope.titulo=titulo;
        $scope.chamada=chamada;
        $scope.autor=autor;
        $scope.texto=texto;

        $scope.NovaNoticia = false;
        $scope.Noticia = false;
        $scope.NovoUsuario = false;
        $scope.EditaNoticia = true;
         $scope.EditaUsuario = false;

    }
    $scope.showListaUsuarios = function(){
        $scope.NovaNoticia = false;
        $scope.Noticia = false;
        $scope.EditaNoticia = false;
        $scope.ListaUsuarios = true;
        $scope.NovoUsuario = false;
        $scope.EditaUsuario = false;

    }
    $scope.showNovoUsuario = function(){
        $scope.NovaNoticia = false;
        $scope.Noticia = false;
        $scope.EditaNoticia = false;
        $scope.ListaUsuarios = false;
        $scope.NovoUsuario = true;
        $scope.EditaUsuario = false;

    }


    $scope.showEditaUsuario = function(id,nome,email,
        login,senha,cargo){
        $scope.iduser=id;
        $scope.nome=nome;
        $scope.email=email;
        $scope.cargo=cargo;
        $scope.senha=senha;
        $scope.login=login;

        $scope.NovaNoticia = false;
        $scope.Noticia = false;
        $scope.ListaUsuarios = false;
        $scope.NovoUsuario = false;
        $scope.EditaNoticia = false;
        $scope.EditaUsuario = true;

    }
});

//controlers crud
app.controller('exibeNoticias',  function($scope,$http){
    //recebe uma requisicao
    $http.get("model/Noticias/listaNoticias.php").
    then(function(response){
        $scope.mydata=response.data.dados})
    //variavel recebe os dados em json vindo do json_encode do php


});
app.controller('exibeUsuarios',  function($scope,$http){
    //mesma funcionalidade que a superior
    $http.get("model/Usuarios/listaUsuario.php").
    then(function(response){
        $scope.usuarios=response.data.dados})
    

});
app.controller('deleteUsuario',function($scope,$http,$window){
    $scope.deleteUser=function(id,index){
    //recebe pelo click, o id do usuario
    //prepara a url e envia aa partir do get, em seguida redireciona
    $http.get("model/Usuarios/deleteUsuario.php?id="+id,
        {'id':$scope.id}).then(function(){
             $window.location.href='administracao.php';
          });
            
        }

       
    });



app.controller('delete',function($scope,$http,$window){
    //recebe pelo click, o id da noticia
    //prepara a url e envia aa partir do get, em seguida redireciona
    $scope.delete=function(id,index){
    $http.get("model/Noticias/deletaNoticias.php?id="+id,
        {'id':$scope.id}).then(function(){
             $window.location.href='administracao.php';
          });
            
        }

       
    });


app.controller('atualiza',function($scope,$http,$window){
    //atualiza noticia
    //recebe parametros do click em edita
    //constroi a url
    //executa o get passando passando os parametros para o php editaNoticias
    //redireciona em seguida;
    $scope.atualiza = function(ide,titulo,chamada,autor,texto,$index){
       $http.get("model/Noticias/editaNoticias.php?ide="+ide+"&titulo="+titulo+"&chamada="+chamada+"&autor="+autor+"&texto="+texto
       ).then(function(){
            $window.location.href='administracao.php';
        });}




    });


app.controller('atualizaUser',function($scope,$http,$window){
    // mesma funcionalidade que a superior
    $scope.atualizaUser = function(ide,nome,email,login,senha,cargo,$index){
       $http.get("model/Usuarios/editaUsuario.php?id="+ide+"&nome="+nome+"&email="+
        email+"&login="+login+"&senha="+senha+"&cargo="+cargo)
       .then(function(){
            
        });
       $window.location.href='administracao.php';
            
        }


    });
app.controller('vermaisNoticias',function($scope){
    //controler responsavel pela pagian principal 
    //tem como funcao exibir o texto de cada noticia ao clicar em ver mais 
   $scope.noticias = true;
    $scope.vermais=false;
    $scope.showmais = function(txt,titulo){
        $scope.noticias = false;
        $scope.vermais=true;
        $scope.txt= txt
        $scope.titulo = titulo

    }

    });