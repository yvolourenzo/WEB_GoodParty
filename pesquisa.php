<?php
     
 try { 

      $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
 
     $campo = $_POST['campo'];
     
     $query = "select * from tb_produto where nm_produto  like '%".$campo."%' ";
     $resultado = mysqli_query($conecta, $query);
    $registro = array(
       'produto'=>array()
    );  
    $i = 0;
    while($linha = mysqli_fetch_assoc($resultado)){
      $registro['produto'][$i] = array(
        'codigo' => $linha['cd_produto'],
        'produto' => $linha['nm_produto'],
        'descricao' => $linha['descri'],
        'quantidade' => $linha['tipo_quantidade'],
        'valor' => $linha['valor'],
        'foto' => $linha['url_img']
      );
      $i++;
    }
    
    //Passando vetor em forma de json
    echo json_encode($registro);
 
    } catch (Exception $e ) {
        echo "Erro ao buscar: ".$e;
    }

?>