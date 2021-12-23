<form name="FormCadastro" id="FormCadastro" action="<?php echo DIRPAGE.'cadastro/cadastrar'; ?>" method="post">
Nome: <input type="text" name="Chassi" id="Chassi"><br>
    Sexo:
    <select name="Marca" id="Marca">
        <option value="">Selecione</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
    </select><br>
    Cidade: <input type="text" name="Modelo" id="Modelo"><br>
    Ano: <input type="text" name="Ano" id="Ano"><br>
    Placa: <input type="text" name="Placa" id="Placa"><br>
    <input type="submit" value="Cadastrar">
</form>

<hr>
<h1> Encontrar um carro </h1>
<form name="FormSelect" id="FormSelect" action="<?php echo DIRPAGE.'cadastro/seleciona'; ?>" method="post">
Nome: <input type="text" name="Chassi" id="Chassi"><br>
    Sexo:
    <select name="Marca" id="Marca">
        <option value="">Selecione</option>
        <option value="Aston Martin">Aston Martin</option>
        <option value="Audi">Audi</option>
        <option value="BMW">BMW</option>
        <option value="Chevrolet">Chevrolet</option>
        <option value="Toyota">Toyota</option>
    </select><br>
    Cidade: <input type="text" name="Modelo" id="Modelo"><br>
    Ano: <input type="text" name="Ano" id="Ano"><br>
    Placa: <input type="text" name="Placa" id="Placa"><br>
    <input type="submit" value="Pesquisar">
</form>

<!-- Será responsável por receber a tabela de pesquisa-->
<div class="Resultado" style="width: 100%; height: 300px; background: pink;"></div>

