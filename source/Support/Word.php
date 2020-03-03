<?php


namespace Source\Support;

use PhpOffice\PhpWord\TemplateProcessor;

class Word
{

	protected $modelo;

	public function setModelo($nameModel)
	{
		$this->modelo = dirname(__DIR__,2) . "/modelWord/{$nameModel}.docx";
		if(!file_exists($this->modelo)) {
			die("Não existe o modelo {$this->modelo}");
		}
	}

	public function getDocumentoFromModel(array $arrayData = array(),string $nomeArquivo)
	{
		$templateProcessor = new TemplateProcessor($this->modelo);

		foreach ($arrayData as $key => $value) {
			$templateProcessor->setValue($key, $value);			
		}

		$templateProcessor->saveAs(dirname(__DIR__,2). "/tmp/{$nomeArquivo}.docx");
	}

	public function dowload(string $nomeArquivo)
	{
		$nomeArquivo_verifica = dirname(__DIR__,2). "/tmp/{$nomeArquivo}.docx";		
		if(file_exists($nomeArquivo_verifica)){ 
			header('Location:'. url("tmp/{$nomeArquivo}.docx",'_blank'));
			exit;
		} else {
			die("Não existe o arquivo {$nomeArquivo_verifica}");
		}
	}

	public function delet(string $nomeArquivo)
	{
		$nomeArquivo_verifica = dirname(__DIR__,2). "/tmp/{$nomeArquivo}.docx";		
		if(file_exists($nomeArquivo_verifica)){ 
			unlink($nomeArquivo_verifica);
		} 
	}
}