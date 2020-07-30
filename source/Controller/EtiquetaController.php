<?php


namespace Source\Controller;

use Source\Models\Conta;
use Source\Models\Favorecido;
use Source\Models\Memorando;
use Source\Models\Referente;
use Source\Models\Subelemento;
use Source\Support\GerarArquivoPdf;

class EtiquetaController extends Controller
{

    protected $pdf;

    public function __construct($router)
    {
        parent::__construct($router);
        $this->pdf = new GerarArquivoPdf();
        $this->pdf->SetTitle('titulo',false);
        $this->pdf->SetCreator("Sistema PDF",false);
        $this->pdf->SetAuthor('Sistema PDF',false);
        $this->pdf->SetSubject("Sistema PDF",false);
        $this->pdf->AddPage('P',array('216','279.4'));
    }

    public function show(array $data): void
    {
        $posisaoEtiqueta = $data["id0"];
        unset($data["id0"]);

        foreach ($data as $key => $id){
            $memorando = (new Memorando())->findById($id);
            //$subelemento = (new Subelemento())->findById($memorando->id_subelemento);
            $favorecido = (new Favorecido())->findById($memorando->id_favorecido);
            $conta = (new Conta())->find()->findById($memorando->id_conta);
            $referente = (new Referente())->findById($memorando->id_referente);
            $memorando->valor = formataMoeda($memorando->valor);
            $memorando->dataMemorando = formataData($memorando->dataMemorando);

            $this->getEtiqueta($memorando, $referente, $favorecido, $conta, $posisaoEtiqueta);
            $posisaoEtiqueta++;
        }

        $this->pdf->Output();
    }

    protected function getEtiqueta($memorando, $referente, $favorecido, $conta, $posisaoEtiqueta = 0): void
    {
        $xTextoEtiqueta = array('7.5','118.1','7.5','118.1','7.5','118.1');
        $yTextoEtiqueta = array('23','23','109','109','195','195');
        $xRetangulo = array('2.5','113.1','2.5','113.1','2.5','113.1');
        $yRetangulo = array('16','16','102','102','188','188');

        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta],$yTextoEtiqueta[$posisaoEtiqueta],"Processo N°: {$memorando->numeroProcesso}");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta],$yTextoEtiqueta[$posisaoEtiqueta]+5,"Data: {$memorando->dataMemorando}");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta],$yTextoEtiqueta[$posisaoEtiqueta]+10,"Setor: Tesouraria");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta],$yTextoEtiqueta[$posisaoEtiqueta]+15,"Referente: {$referente->referente}");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta],$yTextoEtiqueta[$posisaoEtiqueta]+20,"Favorecido: {$favorecido->favorecido}");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta],$yTextoEtiqueta[$posisaoEtiqueta]+25,"Valor: {$memorando->valor} ");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta],$yTextoEtiqueta[$posisaoEtiqueta]+30,"Conta: {$conta->conta}");

        $this->pdf->SetFont('Arial','',8);
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta]+1,$yTextoEtiqueta[$posisaoEtiqueta]+36,"Código N°:");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta]+1,$yTextoEtiqueta[$posisaoEtiqueta]+43,"Lançamento N°:");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta]+1,$yTextoEtiqueta[$posisaoEtiqueta]+50,"Empenho N°:");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta]+1,$yTextoEtiqueta[$posisaoEtiqueta]+57,"Liquidação N°:");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta]+1,$yTextoEtiqueta[$posisaoEtiqueta]+64,"Pagamento N°:");
        $this->pdf->Text($xTextoEtiqueta[$posisaoEtiqueta]+1,$yTextoEtiqueta[$posisaoEtiqueta]+71,"Visto:");

        $this->pdf->Rect($xRetangulo[$posisaoEtiqueta]+5,$yRetangulo[$posisaoEtiqueta]+39,60,7,'D');
        $this->pdf->Rect($xRetangulo[$posisaoEtiqueta]+5,$yRetangulo[$posisaoEtiqueta]+46,60,7,'D');
        $this->pdf->Rect($xRetangulo[$posisaoEtiqueta]+5,$yRetangulo[$posisaoEtiqueta]+53,60,7,'D');
        $this->pdf->Rect($xRetangulo[$posisaoEtiqueta]+5,$yRetangulo[$posisaoEtiqueta]+60,60,7,'D');
        $this->pdf->Rect($xRetangulo[$posisaoEtiqueta]+5,$yRetangulo[$posisaoEtiqueta]+67,60,7,'D');
        $this->pdf->Rect($xRetangulo[$posisaoEtiqueta]+5,$yRetangulo[$posisaoEtiqueta]+74,60,7,'D');

        //$this->pdf->Rect($xRetangulo[$posisaoEtiqueta],$yRetangulo[$posisaoEtiqueta],101,81,'D');
    }


}