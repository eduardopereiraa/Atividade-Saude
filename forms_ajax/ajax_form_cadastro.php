<?php

require_once('../classes/class_conexao_banco.php');

switch($_REQUEST['req']) {

   case 'inserirCadastro': {
      $oDados        = getObjetoDados();
      $oConexao      = new ConexaoBanco('localhost', 'root', '', 'pacientes');
      $sInsert       = getInsert($oDados);
      $bValidaQuery  = mysqli_query($oConexao->oConexao, $sInsert);
      $oRetorno      = new StdClass();

      if($bValidaQuery) {
         $oRetorno->mensagem = 'Registro incluído com sucesso.';
      }   
      else {
         $oRetorno->mensagem = 'Houve uma falha no registro.';
      }   

      echo json_encode($oRetorno);
   }
}

function getObjetoDados() {
   return getChave();
}

function getChave() {
   return json_decode($_REQUEST['chave']);
}

function getInsert($oDados) {
   return "
      INSERT INTO pacientes (
                  Nome,
                  DataNascimento,
                  sexo,
                  cpf,
                  cns,
                  endereco)
           VALUES (
                  '{$oDados->sNome}',
                  '{$oDados->sDataNascimento}',
                  {$oDados->iSexo},
                  '{$oDados->sCpf}',
                  '{$oDados->sCns}',
                  '{$oDados->sEndereco}'
                  )
   ";
}