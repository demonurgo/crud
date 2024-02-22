<?php

switch ($_REQUEST["acao"]) {
    case "cadastrar":
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data-nasc"];

        $sql = "INSERT INTO usuarios (nome,email,senha,data_nasc) VALUES ('{$nome}','{$email}','{$senha}', '{$data_nasc}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastro inserido com sucesso');</script>";

            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Erro no cadastro');</script>";

            print "<script>location.href='?page=novo';</script>";
        }

        break;

    case "editar":
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data-nasc"];

        $sql = "UPDATE usuarios
                SET nome='{$nome}', email='{$email}', senha='{$senha}', data_nasc='{$data_nasc}'
                WHERE id=". $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastro editado com sucesso');</script>";

            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Erro no edição');</script>";

            print "<script>location.href='?page=novo';</script>";
        }

        break;

    case "excluir":
        
        $sql = "DELETE FROM usuarios WHERE id=". $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastro excluido com sucesso');</script>";

            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Erro no exclusão');</script>";

            print "<script>location.href='?page=novo';</script>";
        }

        break;
}
