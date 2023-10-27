<?php

require_once('C:/xampp/htdocs/Atividade Saude/classes/class_conteudo_html.php');
require_once('../classes/class_conexao_banco.php');

class PaginaPacientes {

   private $sBody;

   public function __construct() {
      
      $this->setConteudoPacientes(self::getDados());
      echo $this->getPaginaPacientes();
   }

   private function getPaginaPacientes() {
      $oConteudoHtml = new ConteudoPrincipal();

      $sHtml = " 
      	<!DOCTYPE html>
         <html lang='pt-br'>
         <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Monitoração de Clientes</title>
            {$oConteudoHtml->getLinkCssPrincipal()}
            <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
            </head>
            <body>
            {$oConteudoHtml->getConteudoHeader()}
            <div id='divroot'>
               {$this->getConteudoPacientes()}
            </div>
            {$oConteudoHtml->getConteudoFooter()}
            <script src='../scripts/AtendimentoPaciente.js'></script>
            <script>
               $(() => {
                  atendimentoCliente = new AtendimentoCliente();
               })
            </script>
         </body>
         </html>
      ";

      return $sHtml;
   }

   private function getConteudoPacientes() {
      return $this->sBody;
   }

   private function setConteudoPacientes($aDados) {
      foreach($aDados as $oDado) {
         $aHtml[] = self::getCardsClientes($oDado);
      }

      $this->sBody = implode('', $aHtml);
   }
      
   private static function getCardsClientes($oDado) {
      $sSexo = $oDado->iSexo == 1 ? 'Masculino' : 'Feminino';

      $sHtml = "
         <div class='card'>
            <div class='infos-cliente'>
               <table>
                  <tr>
                     <td class='td-label'>
                        <label class='label' for='nome'>Nome:&nbsp;</label>
                     </td>
                     <td>
                        <input type='text' id='nome' disabled='' value='".$oDado->sNome."'>
                     </td>
                  </tr>
                  <tr>
                     <td class='td-label'>
                        <label class='label' for='cpf'>CPF:&nbsp;</label>
                     </td>
                     <td>
                        <input type='text' id='cpf' disabled='' value='".$oDado->sCpf."'>
                     </td>
                  </tr>
                  <tr>
                     <td class='td-label'>
                        <label class='label' for='sexo'>Sexo:&nbsp;</label>
                     </td>
                     <td>
                        <input type='text' id='sexo' disabled='' value='".$sSexo."'>
                     </td>
                  </tr>
               </table>
            </div>   
            <div class='button_atender_atendido' id='botoes-{$oDado->iId}'>
               <input class='button-page' type='button' value='Atender' id='botaoAtender-{$oDado->iId}' onClick='atendimentoCliente.atenderCliente({$oDado->iId})'>
               <input class='button-page' type='button' value='Encerrar' id='botaoAtendido-{$oDado->iId}' style='display: none;' onClick='atendimentoCliente.encerrarAtendimento({$oDado->iId})'>
            </div>
            <div class='infos-cliente'>
               <table id='table-atendimento-{$oDado->iId}' style='display: none;'>
                  <tr>
                     <td class='td-label'>
                        <label class='label' id='frequenciaCardiaca'>Frequência Cardíaca:&nbsp;</label>
                     </td>
                     <td>
                        <input type='text' disabled='' id='dadoFrequenciaCardiaca-{$oDado->iId}'>
                     </td>
                  </tr>    
                  <tr>
                     <td class='td-label'>
                        <label class='label' id='oxigenio'>Saturação de Oxigênio:&nbsp;</label>
                     </td>
                     <td>
                        <input type='text' disabled='' id='dadoOxigenio-{$oDado->iId}'>
                     </td>
                  </tr>
                  <tr>
                     <td class='td-label'>
                        <label class='label' id='temperatura'>Temperatura:&nbsp;</label>
                     </td>
                     <td>
                        <input type='text' disabled='' id='dadoTemperatura-{$oDado->iId}'>
                     </td>
                  </tr>
               </table>
            <div>   
         </div>
      ";

      return $sHtml;
   }

   private static function getDados() {
      $oConexao = new mysqli('localhost', 'root', '', 'pacientes');
      $sSelect  = self::getSelect();
      $rQuery   = $oConexao->query($sSelect);

      while($oDados = $rQuery->fetch_object()) {
         $aDados[] = (object) [
            'sNome' => $oDados->Nome,
            'iSexo' => $oDados->sexo,
            'sCpf'  => $oDados->cpf,
            'iId'   => $oDados->id
         ];
      };

      return $aDados;
   }

   private static function getSelect() {
      return "
         SELECT Nome,
                sexo,
                cpf,
                id
         FROM pacientes      
      ";
   }
}

$oPagina = new PaginaPacientes();