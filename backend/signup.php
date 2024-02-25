<?php
    session_start();

    include_once "config.php";

    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    // $image = mysqli_real_escape_string($connection, $_POST['image']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        //Verificando se o e-mail do usuário é válido 
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            //Verificando se o e-mail já existe no banco de dados
            $sql = mysqli_query($connection, "SELECT email FROM users WHERE email = '{$email}'");

            if(mysqli_num_rows($sql) > 0){
                echo "$email - Este e-mail já existe em nossa base!";
            } else {
                //Verificando se o usuário fez upload de um arquivo ou não
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name']; 
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpeg', 'jpg'];

                    if(in_array($img_ext, $extensions) === true) {
                        $time = time();

                        $new_img_name = $time.$img_name;
                       
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){

                            $random_id = rand(time(), 10000000);
                            $status = "Active Now";

                            //inserindo os dados do usuário na tabela 
                            $insert_query = mysqli_query($connection, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                        VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                            if($insert_query){
                                $select_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
                                
                                if(mysqli_num_rows($select_query) > 0){
                                    $result = mysqli_fetch_assoc($select_query);
                                    $_SESSION['unique_id'] = $result['unique_id'];
                                    echo "success";
                                } else {
                                    echo "Este e-mail não existe!";
                                }

                            } else {
                                echo "Aconteceu algo errado.";
                            }

                        } else {
                            echo "Selecione uma imagem válida! - JPG, JPEG ou PNG.";
                        }
                    
                    } else {
                        echo "Selecione uma imagem válida! - JPG, JPEG ou PNG.";
                    }


                } else {
                    echo "Selecione uma avatar.";
                }
            }

        }else{ 
            echo "$email - Não é um e-mail válido!";
        }

    }else{
        echo "Necessário preencher todos os campos!";
    }
?>