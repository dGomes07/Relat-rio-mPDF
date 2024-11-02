<?php
require_once '/vendor/autoload.php';

$produtos = [
    [
        'nome' => 'Livro de Programação',
        'categoria' => 'Livros',
        'preco' => 89.90,
        'descricao' => 'Livro triste sobre desenvolvimento web com exemplos práticos.'
    ],
    [
        'nome' => 'Mouse Gamer',
        'categoria' => 'Eletrônicos',
        'preco' => 120.00,
        'descricao' => 'Mouse com alta precisão e com iluminação RGB.'
    ],
    [
        'nome' => 'Fone Bluetooth',
        'categoria' => 'Acessórios',
        'preco' => 150.00,
        'descricao' => 'Fone de ouvido sem fio com cancelamento de ruído. Alta qualidade'
    ],
    [
        'nome' => 'Camiseta Geek',
        'categoria' => 'Vestuário',
        'preco' => 49.90,
        'descricao' => 'Camiseta com estampa de programação pra mostrar a todos o quanto você sofre'
    ]
];


$mpdf = new \Mpdf\Mpdf();


$dataHora = date('d/m/Y H:i:s');
$mpdf->WriteHTML("<h1>Relatório de Produtos</h1>");
$mpdf->WriteHTML("<p>Gerado em $dataHora</p>");


$mpdf->WriteHTML("
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
    <table>
        <tr>
            <th>Nome </th>
            <th>Categoria </th>
            <th>Preço (R$) </th>
            <th>Descrição </th>
        </tr>
");


foreach ($produtos as $produto) {
    $mpdf->WriteHTML("
        <tr>
            <td>{$produto['nome']}</td>
            <td>{$produto['categoria']}</td>
            <td>{$produto['preco']}</td>
            <td>{$produto['descricao']}</td>
        </tr>
    ");
}

$mpdf->WriteHTML("</table>");


$mpdf->Output("relatorio_produtos.pdf", "I");
?>