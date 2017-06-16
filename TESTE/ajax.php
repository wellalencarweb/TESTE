<?php session_start(); 

include_once "../class/class.conexao.php";

function listCategoria($id)
{

	$seletor = '<label>Sub Categoria</label>
		        <select name="id_subcategory" class="form-control">';
	$html ="";
	
    $con = new Conexao();
    
    $con->ExecutaQuery("SELECT * FROM cad_subcategory WHERE cad_subcategory.id_category ='$id' AND (cad_subcategory.del != '*' OR cad_subcategory.del IS NULL )");
   
    $totalLinhas = $con->TotalRegistro();
    
    if($totalLinhas > 0){
		//Resultado dos dados
		while($dados = $con->RetornaDados()){
			$html .= "<option value='".$dados['id']."'>".$dados['description']."</option>";
		}
		//Retornando Resposta
		return $seletor.$html."</select>";
    } else{
        //Retornando Resposta
        return $seletor."<option value='0'>NO SUB</option></select>";
    }
    
    $con->__destruct();
}

function AddItem($id)
{

	$seletor = '<label>Sub Categoria</label>
		        <select name="id_subcategory" class="form-control">';
	$html ="";
	
    $con = new Conexao();
	$sql = "SELECT cad_category.description AS category,cad_subcategory.description AS subcategory, cad_product.*
			FROM cad_product
			INNER JOIN cad_category ON cad_category.id = cad_product.id_category
			LEFT  JOIN cad_subcategory ON cad_subcategory.id = cad_product.id_subcategory
			WHERE (cad_product.del != '*' OR cad_product.del IS NULL ) AND  cad_product.id ='$id'";
    
    $con->ExecutaQuery($sql);

   
    $totalLinhas = $con->TotalRegistro();
    
    if($totalLinhas > 0){
		//Resultado dos dados
		while($dados = $con->RetornaDados()){
			$html .= "<option value='".$dados['id']."'>".$dados['description']."</option>";
		}
		//Retornando Resposta
		return $seletor.$html."</select>";
    } else{
        //Retornando Resposta
        return $seletor."<option value='0'>NO SUB</option></select>";
    }
   
    $con->__destruct();
}

function buscaCli($id)
{

    $con = new Conexao();
    
    $sql = "SELECT * FROM cad_customer WHERE cad_customer.id = '".$id."'";
    
    $con->ExecutaQuery($sql);
    
    $dados = $con->RetornaDados(); 
	
	$array =  [
				"id_cli"    => $dados['id'],
				"nome"      => $dados['nome'],
				"cpf"       => $dados['cpf'],
				"fone"      => $dados['fone'],
				"cel"       => $dados['cel'],
				"email"     => $dados['email'],
				"end"       => $dados['end'],
				"num"       => $dados['num'],
				"cidade"    => $dados['cidade'],
				"bairro"    => $dados['bairro'],
				"uf"        => $dados['uf'],
				];

     $con->__destruct();
    
    //Retorno do conteudo
    return $array;    
}

function changeStatus($id,$status)
{
    
    $con = new Conexao();
    
    //Status Indefinido (erro no indice dos status)
    $color = "white";
    $title = "indefinido";

    $sql_banco = "UPDATE request SET 
                  status = '$status'
                  WHERE request.id = '".$id."'";
    
    $con->ExecutaQuery($sql_banco);

    $con->__destruct();

    if ($status == 2) {

        atualizaEstoque($id);
    }
    
    // Tratando demais status
    switch ($status) {

        case 1: $color = 'blue';        $title = 'Aprovado';        break;
        case 2: $color = 'orange';      $title = 'Andamento';       break;
        case 3: $color = 'limegreen';   $title = 'Finalizado';      break;
        case 4: $color = 'red';         $title = 'Cancelado';       break;
       
    }

    return $color.'|'.$title;

}

function atualizaEstoque($id)
{
    $con = new Conexao();
    //Atualização do Estoque (Desconto)

    $sql = "SELECT 
            item_request.*
            FROM item_request
            WHERE item_request.id_request = $id";

    

    $con->ExecutaQuery($sql);

    while($dados = $con->RetornaDados()) {

        $sql_estoque = "SELECT 
                        cad_product.amount
                        FROM cad_product
                        WHERE cad_product.id = '".$dados['id_product']."'";
       
        $con2       = new Conexao();
        
        $con2->ExecutaQuery($sql_estoque);

        $estoque    = $con2->RetornaDados();

        
        $amount     =  $estoque['amount'] - $dados['unit'];

        $sql_baixa  = "UPDATE cad_product SET amount = '".$amount."' WHERE cad_product.id = '".$dados['id_product']."'";

        $con2->ExecutaQuery($sql_baixa);


    }

    $con->__destruct();
    $con2->__destruct();
        
}


/** 
 * INICIO TUDO AQUI
 * */
//Validando POST
if(!empty($_POST['funcao'])){
    //Selecionando Função
    switch($_POST['funcao']){
        case "listCategoria":  echo listCategoria($_POST['val1']); break;
		case "AddItem":        echo AddItem($_POST['val1']);       break;
		case "buscaCli":       echo json_encode(buscaCli($_POST['val1']));       break;
        case "changeStatus": echo json_encode(changeStatus($_POST['id'],$_POST['status'])); break;
    }
} else{
    //Erro de entrada!
    echo "<script type='text/javascript'>window.location = './../404.php' </script>";
}
?>