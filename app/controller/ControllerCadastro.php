<?php
namespace App\Controller;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;
use App\Model\ClassCadastro;

class ControllerCadastro extends ClassCadastro{

    protected $Chassi;
    protected $Marca;
    protected $Modelo;
    protected $Ano;
    protected $Placa;
    protected $id;

//use \Src\Traits\TraitUrlParser;
    public function __construct()
    {
  //      if(count($this->parseUrl())==1)
        {
            $Render=new ClassRender();
            $Render->setTitle("Cadastro");
            $Render->setDescription("Faça seu cadastro.");
            $Render->setKeywords("cadastro de clientes, cadastro");
            $Render->setDir("cadastro");
            $Render->renderLayout();
        }
    }

    #Receber variáveis
    private function recVariaveis()
    {
        if(isset($_POST['Id'])){ $this->Id=$_POST['id']; }
        if(isset($_POST['Chassi'])){ $this->Chassi=filter_input(INPUT_POST, 'Chassi', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['Marca'])){ $this->Marca=filter_input(INPUT_POST, 'Marca', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['Modelo'])){ $this->Modelo=filter_input(INPUT_POST, 'Modelo', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['Ano'])){ $this->Ano=filter_input(INPUT_POST, 'Ano', FILTER_SANITIZE_SPECIAL_CHARS); }
        if(isset($_POST['Placa'])){ $this->Placa=filter_input(INPUT_POST, 'Placa', FILTER_SANITIZE_SPECIAL_CHARS); }
   
    }

    #Chamar o método de cadastro da ClassCadastro
    public function cadastrar()
    {
        $this->recVariaveis();

          
   /* `Id` int(11) NOT NULL,
  `Chassi` varchar(17) NOT NULL,
  `Marca` varchar(30) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Ano` int(4) NOT NULL,
  `Placa` varchar(7) NOT NULL
    */

        $this->cadastroClientes($this-> id,$this->Chassi, $this->Marca,$this->Modelo,$this->Ano,$this->Placa);
        echo "Cadastro efetuado com sucesso!";
    }

    #Selecionar e exibir os dados do banco de dados
    public function seleciona()
    {
        $this->recVariaveis();
        $B=$this->selecionaClientes($this-> id,$this->Chassi, $this->Marca,$this->Modelo,$this->Ano,$this->Placa);
        echo "
        <form name='FormDeletar' id='FormDeletar' action='".DIRPAGE."cadastro/deletar' method='post'>
        <table border='1'>
            <tr>
                <td>Deletar</td>
                <td>Chassi</td>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Ano</td>
                <td>Placa</td>
            </tr>
            ";
            foreach($B as $C){
            echo "
            <tr>
            <td><input type='checkbox' id='Id' name='Id[]' value='$C[Id]'></td>
                <td>$C[Chassi]</td>
                <td>$C[Marca]</td>
                <td>$C[Modelo]</td>
                <td>$C[Ano]</td>
                <td>$C[Placa]</td>
            </tr>
            ";
            }
            echo "
        </table> 
        </form>
         ";
    }

    public function deletar()
    {
        $this->recVariaveis();
        foreach($this->Id as $IdDeletar)
        {
            $this->deletarClientes($IdDeletar);
        }
    }

}