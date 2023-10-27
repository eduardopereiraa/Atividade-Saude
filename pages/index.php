<?php

require_once('../classes/class_conteudo_html.php');

class PaginaPrincipal {

   public function __construct() {
      echo $this->getHtmlPrincipal('Monitoração de Clientes');
   }

   private function getHtmlPrincipal($sTitulo) {
      $oConteudoHtml = new ConteudoPrincipal();

   	$sHtml = " 
      	<!DOCTYPE html>
         <html lang='pt-br'>
         <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>{$sTitulo}</title>
            {$oConteudoHtml->getLinkCssPrincipal()}
         </head>
         <body>
            {$oConteudoHtml->getConteudoHeader()}
            {$oConteudoHtml->getConteudoBody()}
            {$oConteudoHtml->getConteudoFooter()}
         </body>
         </html>
      ";

      return $sHtml;
   }

}

$oPagina = new PaginaPrincipal();