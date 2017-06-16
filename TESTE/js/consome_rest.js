/******************************************
* Java Srcipt para Consumo de API REST    *
* autor: Wellinton da Silva Alencar       *
* data : 16/06/2017                       *
* Realiza: Listagem; Inserção; Alteração  *
* Exclusão                                *
********************************************/

/*Listar Usuários*/
function getListaUsers(){
    
    var formData = {
        token: "wellteste"
    };  

    $.ajax({
        // Caso queira em local HOST
        //url        : 'http://localhost:8090/TESTE/apiRestTESTE/api.php?action=listar',
        url         : 'http://wellingtonweb.com.br/apiRestTESTE/api.php?action=listar',
        type        : "GET",
        data        : formData,
        crossDomain : true  
        
    }).done(function(data) {
        
        var newuser = '<tr><td colspan="3" class="alignText"><b>CADASTRAR</b></td></tr>'+
        '<tr><td>AUTOMATIC</td>'+
        '<td width="70%"><input class="form-control" name="usernew" id="usernew" value=""></td>'+
        '<td><div class="row">'+
        '<div class="col-md-8">'+
        '<div class="btnFloat"><button type="button" title="Cadastrar"   class="btn btn-info btn-circle" onclick="postUser();">'+
        '<i class="fa fa-user-plus"></i></button></div>'+
        '</div></div></td></tr>';
        
        var lista = '';
        
        if (data.length > 0){   
          
            $.each(data, function(i, obj){
             
            lista += '<tr><td>'+obj.id+'</td>'+
            ' <td width="70%"><input class="form-control" name="user_'+obj.id+'" id="user_'+obj.id+'" value="'+obj.name+'"></td>'+
            '<td><div class="row">'+
            '<div class="col-md-8">'+
            '<div class="btnFloat"><button type="button" title="Atualizar" class="btn btn-success btn-circle"'+
            'onclick="putUser(\'user_'+obj.id+'\');" >'+
            '<i class="fa fa-check"></i></button></div>'+
            '<div class="btnFloat"><button type="button" title="Deletar"   class="btn btn-danger btn-circle"'+
            'onclick="deleteUser(\'user_'+obj.id+'\');">'+
            '<i class="fa fa-times"></i></button></div>'+
            '</div></div></td></tr>';
                                    
            })

            lista += newuser;

        } else {

            lista = '<tr><td colspan="3" style="text-align: center;color: red;"> Nenhum Registro Encontrado!</td></tr>'+newuser;
        }

       $('#listauser').html(""); 
       $('#listauser').html(lista); 

    }).fail(function(error) {
        console.log(error);
    }); 
}

/*Inclusão de Usuário*/
function postUser(){
    var name = document.getElementById('usernew').value;
    if(name == ""){
        alert('Nome não pode Estar Vazio');
        return false;
    }
    var formData = {
        token: "wellteste",
        name : name
    };  

    $.ajax({
        // Caso Queira em LOCALHOST
        //url       : 'http://localhost:8090/TESTE/apiRestTESTE/api.php?action=inclusao',
        url         : 'http://wellingtonweb.com.br/apiRestTESTE/api.php?action=inclusao',
        type        : "POST",
        data        : formData,
        crossDomain : true  
        
    }).done(function(data) {
        if(data[0] == 'ok') {
            getListaUsers();
        } else {

            alert('Não foi possível realizar o Cadastro!(erro post)');
            console.log(data[0]);
        }
       
    }).fail(function(error) {
        alert('Não foi possível realizar o Cadastro!(fail)');
        console.log(error);
    }); 

}

/*Editar Usuário*/
function putUser(id){
    
    var name  = document.getElementById(id).value;
    var id    = id.split("_");
        id    = id[1];
    
    if(name == ""){
        alert('Nome não pode Estar Vazio');
        return false;
    }
    var formData = {
        token: "wellteste",
        name : name,
        id   : id,
    };  

    $.ajax({
        // Caso Queira em LOCALHOST
        //url       : 'http://localhost:8090/TESTE/apiRestTESTE/api.php?action=alteracao',
        url         : 'http://wellingtonweb.com.br/apiRestTESTE/api.php?action=alteracao',
        type        : "POST",
        data        : formData,
        crossDomain : true  
        
    }).done(function(data) {
        if(data[0] == 'ok') {
            alert('Atualizado com Sucesso!');
            getListaUsers();
        } else {

            alert('Não foi possível Atualizar o Cadastro!(erro post)');
            console.log(data[0]);
        }
       
    }).fail(function(error) {
        alert('Não foi possível Atualizar o Cadastro!(fail)');
        console.log(error);
    });
    
}


/*Deletar Usuário*/
function deleteUser(id){
    
    if (confirm("Tem Certeza que Deseja Deletar o Registro?")) {
        
        id    = id.split("_");
        id    = id[1];
    
        var formData = {
            token: "wellteste",
            id   : id
        };  

        $.ajax({
            // Caso Queira em LOCAL HOST
            //url       : 'http://localhost:8090/TESTE/apiRestTESTE/api.php?action=exclusao',
            url         : 'http://wellingtonweb.com.br/apiRestTESTE/api.php?action=exclusao',
            type        : "POST",
            data        : formData,
            crossDomain : true  
            
        }).done(function(data) {
            if(data[0] == 'ok') {
                getListaUsers();
            } else {

                alert('Não foi possível Excluir o Cadastro!(erro post)');
                console.log(data[0]);
            }
           
        }).fail(function(error) {
            alert('Não foi possível Excluir o Cadastro!(fail)');
            console.log(error);
        });
    } else {
        return false;
    }
}

getListaUsers(); 