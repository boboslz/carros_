<?php
namespace App\Model;

use App\Model\ClassConexao;

class ClassCadastro extends ClassConexao{

    private $Db;

     #Cadastrará os clientes no sistema
    protected function cadastroClientes($Id, $Chassi , $Marca , $Modelo , $Ano , $Placa)
    {
        $Id=0;
        $this->Db=$this->conexaoDB()->prepare("insert into teste values(:id , :chassi , :marca , :modelo , :ano , :placa)");
        $this->Db->bindParam(":id",$Id,\PDO::PARAM_INT);
        $this->Db->bindParam(":chassi",$Chassi,\PDO::PARAM_STR);
        $this->Db->bindParam(":marca",$Marca,\PDO::PARAM_STR);
        $this->Db->bindParam(":modelo",$Modelo,\PDO::PARAM_STR);
        $this->Db->bindParam(":ano",$Ano,\PDO::PARAM_INT);
        $this->Db->bindParam(":placa",$Placa,\PDO::PARAM_STR);
        $this->Db->execute();
    }


    #Acesso ao banco de dados com seleção
    protected function selecionaClientes ($Chassi , $Marca , $Modelo , $Ano , $Placa)
    {
        $Chassi='%'.$Chassi.'%';
       // $id='%'.$id.'%';
        $Marca='%'.$Marca.'%';
        $Modelo='%'.$Modelo.'%';
        $Ano='%'.$Ano.'%';
        $Placa='%'.$Placa.'%';
        $BFetch=$this->Db=$this->conexaoDB()->prepare("select * from teste where Chassi like :chassi and Marca like :marca and Modelo like :modelo and Ano like :ano and Placa like :placa");
       $BFetch->bindParam(":id",$Id,\PDO::PARAM_INT);
        $BFetch->bindParam(":chassi",$Chassi,\PDO::PARAM_STR);
        $BFetch->bindParam(":marca",$Marca,\PDO::PARAM_STR);
        $BFetch->bindParam(":modelo",$Modelo,\PDO::PARAM_STR);
        $BFetch->bindParam(":ano",$Ano,\PDO::PARAM_STR);
        $BFetch->bindParam(":placa",$Placa,\PDO::PARAM_STR);
        $BFetch->execute();

        $I=0;
        while($Fetch=$BFetch->fetch(\PDO::FETCH_ASSOC)){
            $Array[$I]=['Id'=>$Fetch['Id'], 'Chassi'=>$Fetch['Chassi'],'Marca'=>$Fetch['Marca'],'Modelo'=>$Fetch['Modelo'],'Ano'=>$Fetch['Ano'],'Placa'=>$Fetch['Placa']];
            $I++;
        }
        return $Array;
    }
    #Deletar direto no banco
    protected function deletarClientes($Id)
    {
        $BFetch=$this->Db=$this->conexaoDB()->prepare("delete from teste where Id=:id");
        $BFetch->bindParam(":id",$Id,\PDO::PARAM_INT);
        $BFetch->execute();
    }
}