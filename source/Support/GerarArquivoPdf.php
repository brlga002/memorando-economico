<?php


namespace Source\Support;


use Fpdf\Fpdf;

class GerarArquivoPdf extends FPDF
{

    protected $cabecario;
    protected $angle = 0;

    function Header(){
        if (isset($this->imagemHeader["file"])){
            if (!file_exists($this->imagemHeader["file"])){
                $this->SetY(10);
                $this->SetFont('times','',12);
                $this->Cell('180',10,'Não existe a imagem: '.$this->imagemHeader["file"],1,1,'C');
            }else {
                $this->Image($this->imagemHeader["file"],$this->imagemHeader["x"],$this->imagemHeader["y"],$this->imagemHeader["w"],$this->imagemHeader["h"]);
            }
        }
    }

    function Footer(){
        if (isset($this->imagemFooter["file"])){
            if (!file_exists($this->imagemFooter["file"])){
                $this->SetY(275);
                $this->SetFont('times','',12);
                $this->Cell('180',10,'Não existe a imagem: '.$this->imagemFooter["file"],1,1,'C');
            }else {
                $this->Image($this->imagemFooter["file"],$this->imagemFooter["x"],$this->imagemFooter["y"],$this->imagemFooter["w"],$this->imagemFooter["h"]);
            }
        }
    }

    function Rotate($angle,$x=-1,$y=-1)
    {
        if($x==-1)
            $x=$this->x;
        if($y==-1)
            $y=$this->y;
        if($this->angle!=0)
            $this->_out('Q');
        $this->angle=$angle;
        if($angle!=0)
        {
            $angle*=M_PI/180;
            $c=cos($angle);
            $s=sin($angle);
            $cx=$x*$this->k;
            $cy=($this->h-$y)*$this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
        }
    }

    function _endpage()
    {
        if($this->angle!=0)
        {
            $this->angle=0;
            $this->_out('Q');
        }
        parent::_endpage();
    }

    function RotatedText($x,$y,$txt,$angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle,$x,$y);
        $this->Text($x,$y,$txt);
        $this->Rotate(0);
    }

    function RotatedImage($file,$x,$y,$w,$h,$angle)
    {
        //Image rotated around its upper-left corner
        $this->Rotate($angle,$x,$y);
        $this->Image($file,$x,$y,$w,$h);
        $this->Rotate(0);
    }

    function Text($x, $y, $txt)
    {
        // Output a string
        $txt = utf8_decode($txt);
        if(!isset($this->CurrentFont))
            $this->Error('No font has been set');
        $s = sprintf('BT %.2F %.2F Td (%s) Tj ET',$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        if($this->underline && $txt!='')
            $s .= ' '.$this->_dounderline($x,$y,$txt);
        if($this->ColorFlag)
            $s = 'q '.$this->TextColor.' '.$s.' Q';
        $this->_out($s);
    }


    function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $txt = utf8_decode($txt);
        $k=$this->k;
        if($this->y+$h>$this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak())
        {
            $x=$this->x;
            $ws=$this->ws;
            if($ws>0)
            {
                $this->ws=0;
                $this->_out('0 Tw');
            }
            $this->AddPage($this->CurOrientation);
            $this->x=$x;
            if($ws>0)
            {
                $this->ws=$ws;
                $this->_out(sprintf('%.3F Tw',$ws*$k));
            }
        }
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $s='';
        if($fill || $border==1)
        {
            if($fill)
                $op=($border==1) ? 'B' : 'f';
            else
                $op='S';
            $s=sprintf('%.2F %.2F %.2F %.2F re %s ',$this->x*$k,($this->h-$this->y)*$k,$w*$k,-$h*$k,$op);
        }
        if(is_string($border))
        {
            $x=$this->x;
            $y=$this->y;
            if(is_int(strpos($border,'L')))
                $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,$x*$k,($this->h-($y+$h))*$k);
            if(is_int(strpos($border,'T')))
                $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-$y)*$k);
            if(is_int(strpos($border,'R')))
                $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',($x+$w)*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
            if(is_int(strpos($border,'B')))
                $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-($y+$h))*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        }
        if($txt!='')
        {
            if($align=='R')
                $dx=$w-$this->cMargin-$this->GetStringWidth($txt);
            elseif($align=='C')
                $dx=($w-$this->GetStringWidth($txt))/2;
            elseif($align=='FJ')
            {
                //Set word spacing
                $wmax=($w-2*$this->cMargin);
                if (substr_count($txt,' ')==0){
                    $this->ws=($wmax-$this->GetStringWidth($txt));
                }else{
                    $this->ws=($wmax-$this->GetStringWidth($txt))/substr_count($txt,' ');
                }

                $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                $dx=$this->cMargin;
            }
            else
                $dx=$this->cMargin;
            $txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));
            if($this->ColorFlag)
                $s.='q '.$this->TextColor.' ';
            $s.=sprintf('BT %.2F %.2F Td (%s) Tj ET',($this->x+$dx)*$k,($this->h-($this->y+.5*$h+.3*$this->FontSize))*$k,$txt);
            if($this->underline)
                $s.=' '.$this->_dounderline($this->x+$dx,$this->y+.5*$h+.3*$this->FontSize,$txt);
            if($this->ColorFlag)
                $s.=' Q';
            if($link)
            {
                if($align=='FJ')
                    $wlink=$wmax;
                else
                    $wlink=$this->GetStringWidth($txt);
                $this->Link($this->x+$dx,$this->y+.5*$h-.5*$this->FontSize,$wlink,$this->FontSize,$link);
            }
        }
        if($s)
            $this->_out($s);
        if($align=='FJ')
        {
            //Remove word spacing
            $this->_out('0 Tw');
            $this->ws=0;
        }
        $this->lasth=$h;
        if($ln>0)
        {
            $this->y+=$h;
            if($ln==1)
                $this->x=$this->lMargin;
        }
        else
            $this->x+=$w;
    }//cell
}