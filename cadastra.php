<?php
    try {
        $conecta = mysqli_connect("localhost","id10375079_goodpartybd","AAAAAA","id10375079_goodparty");
                                //servidor , usuario banco, senha, nome do banco
          
                          
        $nomeUsuario = $_POST['nomeUsuario'];
        $senha = $_POST['senha'];
        $email2 = $_POST['email'];
        $telefone = $_POST['telefone'];
        $complemento = $_POST['complemento'];
        $cpf = $_POST['cpf'];
        $cnpj = $_POST['cnpj'];
        $sg_estado = $_POST['estado'];
        $endereco = $_POST['endereco'];
        $opcao = $_POST['opcao'];
        if($_FILES['foto']['name'] != ''){
            $test = explode('.', $_FILES['foto']['name']);
            $extensao = end($test);
            if($extensao == "jpg" || $extensao == "jpeg" || $extensao == "png"){
                $nome = rand(100,9999).'.'.$extensao;
                $local = 'foto/'.$nome;
                move_uploaded_file($_FILES['foto']['tmp_name'], $local);
            }
        } 
     
             $query = "insert into tb_usuario (nm_usuario,telefone,email,senha,sg_estado,endereco,cpf,cnpj,complemento,url,nivel) values ('$nomeUsuario','$telefone','$email2',md5('$senha'),'$sg_estado','$endereco','$cpf','$cnpj','$complemento','$local','$opcao')";
  
        echo "$opcao";
     
        mysqli_query($conecta,$query) or die(mysqli_error($conecta));
        
    } catch (Exception $e ) {
        echo "Erro ao cadastrar: ".$e;
    }
