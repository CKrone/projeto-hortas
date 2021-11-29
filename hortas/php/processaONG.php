<?php
session_start();
include_once("conexao.php");


$cod_ong = filter_input(INPUT_GET, 'cod_ong', FILTER_SANITIZE_NUMBER_INT);
//Lista de variáveis.
$cnpj = filter_input (INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
$razaoSocial = filter_input (INPUT_POST, 'razaoSocial', FILTER_SANITIZE_STRING);
$telefone = filter_input (INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senhaConfirma = filter_input (INPUT_POST, 'senhaConfirma', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);


$sql = "SELECT email from ong where email = '$email'";
$conecta = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($conecta);

$sqlprodutor = "SELECT email from produtor where email = '$email'";
$connecta2 = mysqli_query($conn, $sqlprodutor);
$row2 = mysqli_fetch_assoc($connecta2);

/**
 * Valida CNPJ
 *
 * @author Luiz Otávio Miranda <contato@todoespacoonline.com/w>
 * @param string $cnpj 
 * @return bool true para CNPJ correto
 *
 */
function valida_cnpj ( $cnpj ) {
    // Deixa o CNPJ com apenas números
    $cnpj = preg_replace( '/[^0-9]/', '', $cnpj );
    
    // Garante que o CNPJ é uma string
    $cnpj = (string)$cnpj;
    
    // O valor original
    $cnpj_original = $cnpj;
    
    // Captura os primeiros 12 números do CNPJ
    $primeiros_numeros_cnpj = substr( $cnpj, 0, 12 );
    
    /**
     * Multiplicação do CNPJ
     *
     * @param string $cnpj Os digitos do CNPJ
     * @param int $posicoes A posição que vai iniciar a regressão
     * @return int O
     *
     */
    if ( ! function_exists('multiplica_cnpj') ) {
        function multiplica_cnpj( $cnpj, $posicao = 5 ) {
            // Variável para o cálculo
            $calculo = 0;
            
            // Laço para percorrer os item do cnpj
            for ( $i = 0; $i < strlen( $cnpj ); $i++ ) {
                // Cálculo mais posição do CNPJ * a posição
                $calculo = $calculo + ( $cnpj[$i] * $posicao );
                
                // Decrementa a posição a cada volta do laço
                $posicao--;
                
                // Se a posição for menor que 2, ela se torna 9
                if ( $posicao < 2 ) {
                    $posicao = 9;
                }
            }
            // Retorna o cálculo
            return $calculo;
        }
    }
    
    // Faz o primeiro cálculo
    $primeiro_calculo = multiplica_cnpj( $primeiros_numeros_cnpj );
    
    // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
    // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
    $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 :  11 - ( $primeiro_calculo % 11 );
    
    // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
    // Agora temos 13 números aqui
    $primeiros_numeros_cnpj .= $primeiro_digito;
 
    // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
    $segundo_calculo = multiplica_cnpj( $primeiros_numeros_cnpj, 6 );
    $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 :  11 - ( $segundo_calculo % 11 );
    
    // Concatena o segundo dígito ao CNPJ
    $cnpj = $primeiros_numeros_cnpj . $segundo_digito;
    
    // Verifica se o CNPJ gerado é idêntico ao enviado
    if ( $cnpj === $cnpj_original ) {
        return true;
    }
}
if (valida_cnpj($cnpj) == false){
	$_SESSION['msg'] = "<p style='color: red;'>CNPJ Inválido!!!</p>";
	header("Location: cadastroONG.php");
}
if($row != 0){	
	$_SESSION['msg'] = "<p style='color: red;'>Usuário já existente!!!</p>";
	header("Location: cadastroONG.php");
}else if ($row2 != 0){
	$_SESSION['msg'] = "<p style='color: red;'>Usuário já existente!!!</p>";
	header("Location: cadastroONG.php");
}
else if ($row == 0 && $row2 == 0 && valida_cnpj($cnpj) == true) {

//Variáveis para inserção dos dados no banco.
$result_ONG = "INSERT INTO ong (cnpj, razaoSocial, telefone, email, celular, senha) VALUES ('$cnpj', '$razaoSocial', '$telefone', '$email', '$celular', md5('$senha'))";

//Conexão das variáveis com o banco de dados.
mysqli_query($conn, $result_ONG);

$cod_ong = mysqli_insert_id($conn);

$result_endereco = "INSERT INTO endereco (rua, bairro, cidade, numero, cep, cod_ong) VALUES ('$rua', '$bairro', '$cidade', '$numero', '$cep', '$cod_ong')";

//Conexão das variáveis com o banco de dados.
mysqli_query($conn, $result_endereco);

//Após o cadastro, o usuário é redirecionado para página inicial.
header("Location: loginong.php");

}