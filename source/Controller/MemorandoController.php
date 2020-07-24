<?php


namespace Source\Controller;

use Source\Models\Subelemento;
use Source\Models\Favorecido;
use Source\Models\Conta;
use Source\Models\Referente;
use Source\Models\Memorando;
use WGenial\NumeroPorExtenso\NumeroPorExtenso;

use Source\Support\Word;

class MemorandoController extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);
    }
    
    public function formNew(): void
    {          
        $subelemento = (new Subelemento())->find()->order("subelemento ASC")->fetch(true);
        $favorecido = (new Favorecido())->find()->order("favorecido ASC")->fetch(true);
        $conta = (new Conta())->find()->order("conta ASC")->fetch(true);
        $referente = (new Referente())->find()->order("referente ASC")->fetch(true);

        $proximoNumero = (new Memorando())->proximoNumero('2020');
  
        echo $this->view->render("newMemorando",[
            "title" => "Novo Memo | ". SITE,
            "subelemento" => $subelemento,
            "favorecido" => $favorecido,
            "conta" => $conta,
            "referente" => $referente,
            "proximoNumero" => $proximoNumero
        ]);
    }

    public function formEdit(array $data): void
    {          
        $memorando = (new Memorando())->findById($data["id"]);

        $subelemento = (new Subelemento())->find()->fetch(true);
        $favorecido = (new Favorecido())->find()->fetch(true);
        $conta = (new Conta())->find()->fetch(true);
        $referente = (new Referente())->find()->fetch(true);
  
        echo $this->view->render("editMemorando",[
            "title" => "Novo Memo | ". SITE,
            "subelemento" => $subelemento,
            "favorecido" => $favorecido,
            "conta" => $conta,
            "referente" => $referente,
            "memorando" => $memorando,
        ]);
    }
    
    public function store(): void
    {        
        $numeroMemorando = filter_input(INPUT_POST, "memorando", FILTER_SANITIZE_STRIPPED);
        $dataMemorando = filter_input(INPUT_POST, "dataMemorando");
        $valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_STRIPPED);
        $valorExtenso = (new NumeroPorExtenso())->converter($valor);
        $nDoc = filter_input(INPUT_POST, "nDoc", FILTER_SANITIZE_STRIPPED);
        $subelemento = filter_input(INPUT_POST, "subelemento", FILTER_SANITIZE_NUMBER_INT);
        $favorecido = filter_input(INPUT_POST, "favorecido", FILTER_SANITIZE_NUMBER_INT);
        $conta = filter_input(INPUT_POST, "conta", FILTER_SANITIZE_NUMBER_INT);
        $referente = filter_input(INPUT_POST, "referente", FILTER_SANITIZE_NUMBER_INT);
        $referenteComplemento = filter_input(INPUT_POST, "referenteComplemento", FILTER_SANITIZE_STRIPPED);
        $competencia = filter_input(INPUT_POST, "competencia", FILTER_SANITIZE_STRIPPED);
        $referenteComplemento .= ($competencia !== "") ? " " . $competencia : "";

        $referenteTexto = $referente;
        if($referenteTexto !== ""){
           $referenteTexto = (new Referente())->findById($referenteTexto)->referente;
           $referenteTexto .= $referenteComplemento;           
        } else {
           $referenteTexto .= $referenteComplemento; 
        }      


        $nomeArquivo = zeroEsquerda($numeroMemorando,4) . " - ". $referenteTexto;
        $nomeArquivo .= " - ". date("d-m-Y",strtotime($dataMemorando));
        $nomeArquivo = str_replace("/", "|", $nomeArquivo);

        $memo = new Memorando();
        $memo->numero = $numeroMemorando;
        $memo->dataMemorando = $dataMemorando;
        $memo->anoMemorando = date("Y",strtotime($dataMemorando));
        $memo->valor = $valor;
        $memo->nDoc = $nDoc;
        $memo->nomeArquivo = $nomeArquivo;
        $memo->id_conta = $conta;
        $memo->id_favorecido = $favorecido;
        $memo->id_referente = $referente;
        $memo->referenteComplemento = $referenteComplemento;
        $memo->id_subelemento = $subelemento;
        $memo->save();

        //print_r($memo);
                      
       $this->router->redirect("home");
    }

    public function update(array $data): void
    {          
        $numeroMemorando = filter_input(INPUT_POST, "memorando", FILTER_SANITIZE_STRIPPED);
        $dataMemorando = filter_input(INPUT_POST, "dataMemorando");
        $valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_STRIPPED);
        $valorExtenso = (new NumeroPorExtenso())->converter($valor);
        $nDoc = filter_input(INPUT_POST, "nDoc", FILTER_SANITIZE_STRIPPED);
        $subelemento = filter_input(INPUT_POST, "subelemento", FILTER_SANITIZE_NUMBER_INT);
        $favorecido = filter_input(INPUT_POST, "favorecido", FILTER_SANITIZE_NUMBER_INT);
        $conta = filter_input(INPUT_POST, "conta", FILTER_SANITIZE_NUMBER_INT);
        $referente = filter_input(INPUT_POST, "referente", FILTER_SANITIZE_NUMBER_INT);
        $referenteComplemento = filter_input(INPUT_POST, "referenteComplemento", FILTER_SANITIZE_STRIPPED);
        $competencia = filter_input(INPUT_POST, "competencia", FILTER_SANITIZE_STRIPPED);
        $referenteComplemento .= ($competencia !== "") ? " " . $competencia : "";
          
        $referenteTexto = $referente;
        if($referenteTexto !== ""){
           $referenteTexto = (new Referente())->findById($referenteTexto)->referente;
           $referenteTexto .= $referenteComplemento;           
        } else {
           $referenteTexto .= $referenteComplemento; 
        }


        $nomeArquivo = zeroEsquerda($numeroMemorando,4) . " - ". $referenteTexto;
        $nomeArquivo .= " - ". date("d-m-Y",strtotime($dataMemorando));
        $nomeArquivo = str_replace("/", "|", $nomeArquivo);

        $memo = (new Memorando())->findById($data["id"]);
        $memo->numero = $numeroMemorando;
        $memo->dataMemorando = $dataMemorando;
        $memo->anoMemorando = date("Y",strtotime($dataMemorando));
        $memo->valor = $valor;
        $memo->nDoc = $nDoc;
        $memo->nomeArquivo = $nomeArquivo;
        $memo->id_conta = $conta;
        $memo->id_favorecido = $favorecido;
        $memo->id_referente = $referente;
        $memo->referenteComplemento = $referenteComplemento;
        $memo->id_subelemento = $subelemento;
        $memo->save();
       
        $this->router->redirect("home");
    }

    public function delete(array $data): void
    {          
        $memorando = (new Memorando())->findById($data["id"]);

        $documento = new Word();
        $nomeArquivo = $memorando->nomeArquivo;
        $documento->delet($nomeArquivo);   

        $memorando->destroy();
        
        $this->router->redirect("home");  
    }

    public function geraDocumento(array $data): void
    {          
        $memo = (new Memorando())->findById($data["id"]);  

        $referente = "";

        if($memo->id_referente !== ""){
           $referente = (new Referente())->findById($memo->id_referente)->referente;
        }     

        $subelemento = (new Subelemento())->findById($memo->id_subelemento)->subelemento;
        $favorecido = (new Favorecido())->findById($memo->id_favorecido)->favorecido;
        $conta = (new Conta())->findById($memo->id_conta)->conta;
        $valorExtenso = (new NumeroPorExtenso())->converter($memo->valor);
        $dados= [
            'memorando' => zeroEsquerda($memo->numero,4),
            'dataMemorando' => formataDataParaDocumento($memo->dataMemorando),
            'valor' => formataMoeda($memo->valor),
            'valorExtenso' => $valorExtenso,
            'referente' => $referente,
            'referenteComplemento' => (isset($memo->referenteComplemento)) ? "{$memo->referenteComplemento}." : ".",
            'subelemento' => $subelemento,
            'favorecido' => $favorecido,
            'nDoc' => $memo->nDoc,
            'conta' => $conta,
        ];

        $nomeArquivo = $memo->nomeArquivo;

        $documento = new Word();
        $documento->setModelo("memorandoEconomico");        
        $documento->getDocumentoFromModel($dados,$nomeArquivo);        
        $documento->dowload($nomeArquivo);        
    }


    
}?>


 