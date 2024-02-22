<h1>Listar Usuário</h1>

<?php
$sql = 'SELECT * 
            FROM usuarios';

$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {

    print "<table class= 'table table-hover table-striped table-bordered'>";

    print "<tr>";


    print "<th>ID</th>";
    print "<th>NOME</th>";
    print "<th>EMAIL</th>";
    print "<th>DATA DE NASCIMENTO</th>";
    print "<th colspan=2>AÇÕES</th>";


    print "</tr>";
    while ($row = $res->fetch_object()) {

        print "<tr>";


        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->nome . "</td>";
        print "<td>" . $row->email . "</td>";
        print "<td>" . $row->data_nasc . "</td>";
        print "<td>
                    <button onclick=\"location.href= '?page=editar&id=" . $row->id . "';\" class='btn btn-success'> Editar</button>
               </td>
               
               <td>
                    <button onclick=\"if(confirm('Tem certeza que deseja excluir o usuário?')){

                        location.href= '?page=salvar&acao=excluir&id=" . $row->id . "'; 
                        
                    }else{false;}\" class='btn btn-danger'> Excluir</button>
               </td>";



        print "</tr>";
    };

    print "</table>";
} else {

    print "<p class='alert alert-danger'> Não existem usuários</p>";
}
