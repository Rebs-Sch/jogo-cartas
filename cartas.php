<?php 

class Carta {
    private string $nome;
    private string $descricao;
    private int $numero;
    private $dicas = array();
    
    public function __construct($n, $d, $num, $di1, $di2, $di3){
        $this->nome = $n;
        $this->descricao = $d;
        $this->numero = $num;
        array_push($this->dicas, $di1, $di2, $di3);
    }
    
    public function __toString(){
        return "\n".$this->numero." - ".$this->nome;
    }

    public function getNumero(): int{
        return $this->numero;
    }
    
    public function getDescricao(){
        return  $this->descricao;
    }

    public function getDicas($qtd){
        if ($qtd == 3){
            echo $this->dicas[0]."\n\n";
            return 10;

        }else if($qtd ==  2){
            echo $this->dicas[1]."\n\n";
            return 10;
        
        }else if($qtd == 1){
            echo  $this->dicas[2]."\n\n";
            return 10;
        
        }else{
            echo "\nVocê não possui mais dicas.\n";
        }
    }
}

//Declaração das cartas e suas dicas
$cartas = array(
    new Carta("Arataki Itto", "Na mitologia japonesa, é um ser equivalente a um demônio.", 1,
              "Gosta de besouros.", "Possui uma alergia a feijões.", "De personalidade um tanto infantil, não consegue aceitar derrotas"), 
    new Carta("Baizhu", "É um farmacêutico famoso de sua região.", 2,
              "Seus remédios, apesar de eficazes, são descritos como muito amargos.", "Sofre de uma doença crônica desconhecida.","Leva uma cobra enrolada em seu pescoço, seu animal de estimação."),
    new Carta("Chongyun", "Portador de um espírito yang extremamente puro.", 3,
              "Detesta comidas picantes.", "Vulnerável a temperaturas moderadamente altas.", "É um ótimo exorcista, necessitando apenas sua presença para que maus espíritos se afastem."),
    new Carta("Diluc", "É dono de uma famosa taverna na região.", 4,
              "Deixou seu posto como cavaleiro após ser ordebado a omitir um incidente terrível.", "Em busca de proteger as pessoas de sua cidade, tornou-se o \"cavaleiro da noite escura\".", "Apesar de ser dono e chefiar um vinhedo, não tem uma boa visão do álcool."),
    new Carta("Freminet", "Gosta de mergulhar, o fazendo sempre que estressado ou sobrecarregado.", 5,
              "Comparado a seus dois irmãos, tem uma personalidade fortemente tímida.", "Apesar de não mais precisar de um, ainda mantém seu capacete de mergulho para se isolar de barulhos.", "Tem um pinguim mecânico como animal de estimação."),
    new Carta("Furina", "É uma grande celebridade em seu meio, atriz nata.", 6,
              "Adora sobremesas doces.", "Faz os tribunais de sua nação parecem palco de novelas", "É, até certo ponto, considerada deusa do elemento Hydro."),
    new Carta("Kamisato Ayato", "Apesar de seu alto escalão, toda a cidade parece desconhecer ele e suas pretenções, ainda que devotem grande confiança.", 7,
              "Gosta de chá de bolhas", "Mesmo jovem, foi capaz de tomar e lidar contra toda a decadência de sua família.", "É líder do maior clã de sua nação."),
    new Carta("Lyney", "Sua presença é recorrente nas óperas de sua nação.", 8,
              "Tem uma grande associação com gatos.", "Faz performances na companhia de sua irmã gêmea.","É um mágico bastante conhecido."),
    new Carta("Mualani", "É uma guia túristica bastante carismática.", 9,
              "Tem um ótimo olho para a arte.", "Administra um pequeno negócio de maneira despreocupada, largando seus produtos soltos para que qualquer um pegue, desde que deixe dinheiro no balcão.", "Ama esportes praticados na água, principalmente o surf."),
    new Carta("Neuvillette", "É o juíz e autoriedade máxima de sua nação.", 10,
              "Seja lá o quão estranho isso venha a soar, ele é somelier de água.", "Tende a ser descrito como mais forte, e poderoso, do que todos", "Detentor primordial do elemento hydro."),
    new Carta("Tighnari", "É um patrulheiro florestal experiente.", 11,
              "Sustenta um vasto conhecimento em botânica.","Apesar da aparência amena, é um tanto severo com aqueles que desafiam sua paciência.","Tem orelhas grandes, parecendo um animal vulpe."),
    new Carta("Wriothesley", "Comanda a fortaleza para onde são mandados os criminosos de sua nação.", 12,
              "É um que adora chás.", "Tem uma estreita relação com o juíz, autoriedade máxima, de sua nação.", "Mantém o controle das coisas ao lado de sua grande amiga enfermeira."),
    new Carta("Xingqiu", "Filho dos líderes de uma grande guilda de comerciantes.", 13,
              "Um de seus maiores passatempos é enganar seu melhor amigo.","Ainda que soe muito bem educado, possui uma personalidade travessa devidamente oculta.","Adora ler romances de artes marciais."),
    new Carta("Zhongli", "Mantido como informação sigilosa, é o deus do elemento Geo.", 14,
              "Consultor da funerária a qual trabalha.","Dado como o mais culto nos assuntos de seu país.","Tem um péssimo controle financeiro, sempre dependendo que os outros paguem a sua conta."));
//fim da declaração de cartas e suas dicas.

$pontuacaoGeral = array();

do{
    echo"\n+----------------------+\n|         MENU         |\n|----------------------|\n| 1 - Jogar            |\n| 2 - Pontuação geral  |\n| 3 - Regras           |\n| 0 - Sair             |\n+----------------------+\n";
    //Menu todo feio assim, mas no terminal fica legalzinho.
    
    $escolha = readline();
    
    switch($escolha){
        default:
        echo "\nOpção inválida, tente novamente.";
        
        //jogo
        case 1:
            $cartaSorteada = $cartas[array_rand($array)];
            $pontuacaoPartida = 0;
            $qtdDicas = 3;
            $chances = 5;

            echo "\nNo baralho, há estas cartas:";
            foreach ($cartas as $c) {
                echo $c;
            }
        
            echo "\nDescrição: ".$cartaSorteada->getDescricao()."\n\nBaseado na descrição prévida do personagem, qual é a sua carta?\n";
            
            for ($i=0; $i < 5; $i++){ 
                $palpite = readline("Digite seu número, ou \"dica\" para receber uma dica: ");
                
                if ($palpite == "dica"){
                    $pontuacaoPartida -= $cartaSorteada->getDicas($qtdDicas);
                    $qtdDicas--;
                    $i--;

                }else if  ($palpite == $cartaSorteada->getNumero()){
                    $pontuacaoPartida += 100;

                    echo "\n\nEbaaa, você acertou!\nSua pontuação final é de:".$pontuacaoPartida;
                    array_push($pontuacaoGeral, $pontuacaoPartida);

                    break;
                }else{
                    $chances--;
                    echo "\nPalpite incorreto. Chances restantes: ".$chances."\n";
                    $pontuacaoPartida -= 5;
                }

            }

            if ($chances == 0) {
                echo "\nInfelizmente, parece que você não foi capaz de adivinhar e gastou todas as suas tentativas...\nMas não fique triste, se quiser, poderá jogar novamente!\n";
            }

            break;
        
        case 2:
            if (count($pontuacaoGeral)>0){
                echo "\nSua pontuação geral é: ";
                $recorde = $pontuacaoGeral[0];
    
                foreach ($pontuacaoGeral as $i => $pontuacao) {
                    echo "\nPartida". $i++.": ".$pontuacao;
    
                    if($recorde < $pontuacao){
                        $recorde = $pontuacao;
                    }
                }
                
                echo"\n\nE sua maior pontuação foi: ".$recorde;
            }else{
                echo "\nVocê ainda não jogou, ou não ganhou, nenhuma partida, logo não há pontuação. Experimente jogar pelo menos uma vez!\n";
            }

            break;

        case 3:    
            echo "\nCom o auxílio da descrição inicial, você terá 5 chances de adivinhar a carta sorteada pelo algoritmo. Quanto menor o número de tentativas, mais pontos você recebe.\nPode-se solicitar dicas, mas elas, da mesma maneira, tendem a diminuir o número de pontos que receberá no final.\n";

            break;
        case 0:
            die;
    }

}while($escolha != 0);
