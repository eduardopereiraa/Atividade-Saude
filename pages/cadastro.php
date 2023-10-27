<?php

require_once('C:/xampp/htdocs/Atividade Saude/classes/class_conteudo_html.php');

class PaginaCadastro {

   private $sBody;

   public function __construct() {
      $this->setConteudoCadastro();
      echo $this->getPaginaCadastro();
   }

   private function getPaginaCadastro() {
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
            {$this->getConteudoCadastro()}
            {$oConteudoHtml->getConteudoFooter()}
         </body>
         </html>
      ";

      return $sHtml;
   }

   private function getConteudoCadastro() {
      return $this->sBody;
   }

   private function setConteudoCadastro() {
      $this->sBody = '
      <div style="padding: 25px; flex: 1 0 auto;" id="div-root">
         <div id="div-fieldset" style="padding-bottom: 29%; color: whitesmoke;">
            <fieldset id="form-fieldset">
               <legend>&nbsp;Cadastro novo Paciente&nbsp;</legend>
               <table id="table-fieldset">
                  <tr>
                     <td class="label">
                        <label for="nome">Nome:</label>
                        </td>
                        <td>
                           <input type="text" name="nome" id="nome" maxlength="60">
                        </td>
                        <td class="label">
                           <label for="sexo">Sexo:</label>
                        </td>
                        <td>   
                           <select name="sexo" id="sexo">
                           <option value="0" selected>Selecione</option>
                           <option value="1">Masculino</option>
                           <option value="2">Feminio</option>
                           <option value="3">Outro</option>
                        </select>
                        </td>
                  </tr>   
                  <tr>
                     <td class="label">
                        <label for="cpf">CPF:</label>
                     </td>
                     <td>
                        <input type="text" name="cpf" id="cpf" maxlength="11">
                     </td>
                     <td class="label">
                        <label for="cns">CNS:</label>
                     </td>
                     <td>
                        <input type="text" name="cns" id="cns" maxlength="15">
                     </td>
                     </tr>
                  <tr>
                     <td class="label">
                        <label for="endereco">Endereço:</label>
                     </td>
                     <td>
                        <input type="text" name="endereco" id="endereco" maxlength="100">
                     </td>
                     <td class="label">
                        <label for="dataNascimento">Data de Nascimento:</label>
                     </td>   
                     <td>
                        <input type="date" name="dataNascimento" id="dataNascimento">
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <input type="button" value="Enviar" id="button-enviar" onclick="cadastroCliente.inserirCadastro()">
                     </td>
                  </tr>
               </table>   
            </fieldset>
         </div>
      </div>
      <script src="../scripts/cadastroCliente.js"></script>
      <script>
         $(() => {
            cadastroCliente = new CadastroCliente();
         })
      </script>
      ';
   }
}

$oPagina = new PaginaCadastro();