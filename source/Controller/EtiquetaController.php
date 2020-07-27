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

    public function edit(array $data): void
    {
        $memorando = (new Memorando())->findById($data["id"]);
        $subelemento = (new Subelemento())->find()->fetch(false);
        $favorecido = (new Favorecido())->find()->fetch(false);
        $conta = (new Conta())->find()->fetch(false);
        $referente = (new Referente())->find()->fetch(false);

        $memorando->valor = formataMoeda($memorando->valor);
        $memorando->dataMemorando = formataData($memorando->dataMemorando);

        $xTextoEtiqueta = array('7.5','118.1','7.5','118.1','7.5','118.1');
        $yTextoEtiqueta = array('23','23','109','109','195','195');
        $xRetangulo = array('2.5','113.1','2.5','113.1','2.5','113.1');
        $yRetangulo = array('16','16','102','102','188','188');


        $this->pdf->SetFont('Arial','',10);
        for ($i = 1; $i <= 5; $i++){
            $this->pdf->Text($xTextoEtiqueta[$i],$yTextoEtiqueta[$i],"Processo N°: {$memorando->numeroProcesso}");
            $this->pdf->Text($xTextoEtiqueta[$i],$yTextoEtiqueta[$i]+5,"Data: {$memorando->dataMemorando}");
            $this->pdf->Text($xTextoEtiqueta[$i],$yTextoEtiqueta[$i]+10,"Setor: Tesouraria");
            $this->pdf->Text($xTextoEtiqueta[$i],$yTextoEtiqueta[$i]+15,"Referente: {$referente->referente}");
            $this->pdf->Text($xTextoEtiqueta[$i],$yTextoEtiqueta[$i]+20,"Favorecido: {$favorecido->favorecido}");
            $this->pdf->Text($xTextoEtiqueta[$i],$yTextoEtiqueta[$i]+25,"Valor: {$memorando->valor} ");
            $this->pdf->Text($xTextoEtiqueta[$i],$yTextoEtiqueta[$i]+30,"Conta: {$conta->conta}");
        }
        $this->pdf->SetFont('Arial','',8);
        for ($i = 1; $i <= 5; $i++){
            $this->pdf->Text($xTextoEtiqueta[$i]+1,$yTextoEtiqueta[$i]+36,"Código N°:");
            $this->pdf->Text($xTextoEtiqueta[$i]+1,$yTextoEtiqueta[$i]+43,"Lançamento N°:");
            $this->pdf->Text($xTextoEtiqueta[$i]+1,$yTextoEtiqueta[$i]+50,"Empenho N°:");
            $this->pdf->Text($xTextoEtiqueta[$i]+1,$yTextoEtiqueta[$i]+57,"Liquidação N°:");
            $this->pdf->Text($xTextoEtiqueta[$i]+1,$yTextoEtiqueta[$i]+64,"Pagamento N°:");
            $this->pdf->Text($xTextoEtiqueta[$i]+1,$yTextoEtiqueta[$i]+71,"Visto:");

            $this->pdf->Rect($xRetangulo[$i]+5,$yRetangulo[$i]+39,60,7,'D');
            $this->pdf->Rect($xRetangulo[$i]+5,$yRetangulo[$i]+46,60,7,'D');
            $this->pdf->Rect($xRetangulo[$i]+5,$yRetangulo[$i]+53,60,7,'D');
            $this->pdf->Rect($xRetangulo[$i]+5,$yRetangulo[$i]+60,60,7,'D');
            $this->pdf->Rect($xRetangulo[$i]+5,$yRetangulo[$i]+67,60,7,'D');
            $this->pdf->Rect($xRetangulo[$i]+5,$yRetangulo[$i]+74,60,7,'D');
        }

        for ($i = 0; $i <= 5; $i++){
            $this->pdf->Rect($xRetangulo[$i],$yRetangulo[$i],101,81,'D');
        }

        $this->pdf->Output();
    }


}