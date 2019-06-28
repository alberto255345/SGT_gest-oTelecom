<?php
error_reporting(E_ERROR | E_PARSE);
if( file_exists("../db/ip.php") && is_readable("../db/ip.php") && include("../db/ip.php")) {
    include("../db/link.php");
    echo '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>';
    include("../db/nav.php");
}else {
  echo "erro include";
}

$sql = "Select u.nome, u.setor, u.telefone, u.email, l.data from user as u left join last_login as l on u.cod = l.cod_user where u.cod = '" . $_SESSION['usuario_log'] . "';";
        $que = $mysqli->query($sql) or die($mysqli->error);
        $dado = $que->fetch_assoc();

?>

<div id="separa" style="align-items: center; margin: 0 10%; text-align: right;">


<div style="display: flex; align-items: center; margin-left: 20%; margin-right: 20%;">
<div>
    <table>
        <tr>
            <td><input class="small blue button" type="file" name="file" id="file"></td>
        </tr>
        <tr>
            <td><span id="upload_image"><img src="/sgt/img/<?PHP echo $dado3['avatar'];?>" alt="Avatar" class="avatar"></span></td>
        </tr>
    </table>
</div>
<div class="vl"></div>
<div>
    <table>
        <tr>
            <td>Nome:</td><td><input type="text" name="nomeid" value="<?php echo $dado[nome]; ?>"></td>
        </tr>
        <tr>
            <td>Setor:</td><td><input type="text" name="setorid" value="<?php echo $dado[setor]; ?>"></td>
        </tr>
        <tr>
            <td>Telefone:</td><td><input type="text" class="telefone" name="telefoneid" value="<?php echo $dado[telefone]; ?>"></td>
        </tr>
        <tr>
            <td>E-Mail:</td><td><input type="text" name="mailid" value="<?php echo $dado[email]; ?>"></td>
        </tr>
        <tr>
            <td>Ultimo Login:</td><td><?php echo $dado[data]; ?></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td>Nova Senha:</td>
            <td><input type="text" name="senhaid"></td>
        </tr>
    </table>
</div>

</div>
<button class="small blue button">Salvar</button>
</div>

<script type="application/javascript">
            function destino(item) {
            window.location.href = item;
        }


        $(document).ready(function () {

          $(document).on('change','#file', function(){

            var property = document.getElementById("file").files[0];
            var image_name = property.name;
            var image_extension = image_name.split(".").pop().toLowerCase();
            if(jQuery.inArray(image_extension, ['gif','png','jpg','jpeg']) == -1){
            	alert("Formato Invalido!");
            }
            var image_size = property.size;
            if(image_size > 2000000){
            	alert("Imagem superior a dois megabytes");
            }else{
            	var form_data = new FormData();
            	form_data.append("file",property);
            	$.ajax({
            		url:"upload.php",
            		method:"POST",
            		data:form_data,
            		contentType:false,
            		cache:false,
            		processData:false,
            		beforeSend:function(){
            			$('#upload_image').html("<label class='text-success'>Imagem Carregando...</label>");
            		},
                success:function(data){
                  $('#upload_image').html(data);
                }
            	})
            }

          });

        });

        </script>
</body>
</html>
