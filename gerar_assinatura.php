<?php
// --- CONFIGURAÇÕES E BANCO DE DADOS ---

// O "Banco de Dados" com os endereços. Use \n para quebrar a linha.
$enderecos = [
    'uno' => "Av. Pontes Vieira, 2340\nUNO | Medical & Office\nSala 915 - Dionísio Torres, Fortaleza-CE",
    'co'  => "R. Dragão do Mar, 230\nCentro, Fortaleza - CE, 60060-390",
    'metalurgica' => "Rua Professor Vicente Silveira, 91\nParreão, Fortaleza - CE, 60410-322"
];

// Caminho para a imagem base e para o arquivo da fonte.
// CERTIFIQUE-SE QUE ESSES ARQUIVOS ESTÃO NA MESMA PASTA!
$imagemBase = 'IMAGEM_BASE.png';
$arquivoFonte = 'Agrandir-Narrow.otf'; // Coloque o nome exato do seu arquivo de fonte.

// --- PROCESSAMENTO DOS DADOS ---

// Pega os dados enviados pelo formulário
$nome = strtoupper($_POST['nome']); // Deixa o nome em maiúsculo, como no exemplo
$cargo = strtoupper($_POST['cargo']); // Deixa o cargo em maiúsculo
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$keyEscritorio = $_POST['escritorio'];

// Pega o endereço correspondente no "banco de dados"
$endereco = $enderecos[$keyEscritorio];

// --- GERAÇÃO DA IMAGEM ---

// Define que o arquivo gerado será uma imagem PNG
header('Content-Type: image/png');

// Carrega a imagem base
$img = imagecreatefrompng($imagemBase);

// Define as cores que serão usadas (Branco e Azul Escuro da Urbmidia)
$branco = imagecolorallocate($img, 255, 255, 255);
$azulEscuro = imagecolorallocate($img, 0, 32, 96); // Cor estimada a partir do exemplo

// Coordenadas e tamanhos (eixo X, eixo Y)
// Estes valores podem precisar de pequenos ajustes para o alinhamento perfeito.

// Escreve o NOME
imagettftext($img, 30, 0, 40, 80, $branco, $arquivoFonte, $nome);

// Escreve o CARGO
imagettftext($img, 15, 0, 42, 115, $branco, $arquivoFonte, $cargo);

// Escreve o TELEFONE
imagettftext($img, 15, 0, 580, 80, $branco, $arquivoFonte, $telefone);

// Escreve o E-MAIL
imagettftext($img, 15, 0, 580, 115, $branco, $arquivoFonte, $email);

// Escreve o ENDEREÇO
imagettftext($img, 13, 0, 580, 240, $azulEscuro, $arquivoFonte, $endereco);


// Gera a imagem PNG final e a exibe no navegador
imagepng($img);

// Libera a memória usada pela imagem
imagedestroy($img);
?>