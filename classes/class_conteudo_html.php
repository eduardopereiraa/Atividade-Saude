<?php

class ConteudoPrincipal {
   
   # Atributos
   public $sHeader;
   public $sBody;
   public $sFooter;
   public $sLinkScript;
   public $sLinkCss;

   public function __construct() {
      $this->setConteudoHeader();
      $this->setConteudoBody();
      $this->setConteudoFooter();
      $this->setLinkCssPrincipal();
   }

   #Getters/Setters
   
   public function getLinkCssPrincipal() {
      return $this->sLinkCss;
   }

   public function getConteudoHeader() {
      return $this->sHeader;  
   }

   public function getConteudoBody() {
      return $this->sBody;  
   }

   public function getConteudoFooter() {
      return $this->sFooter;  
   }

   public function setConteudoHeader() {
      $this->sHeader = "
         <header>
            <nav class='navbar navbar-expand-lg navbar-light bg-light' style='width: 100%; height: 55px; background: whitesmoke;'>
               <div style='display: inline-flex; align-items: center; width: 100%; height: 55px; justify-content: space-around;'>
                  <a class='navbar-brand' href='index.php'>
                     <img id='logo-nav' src='../images/logo_oficial.png' alt='teste' style='width: 100px; height: 50px;'>
                  </a>
                  <h1 id='titulo-logo'>Saúde AE</h1>
                  <div>
                     <a class='navbar-brand' href='cadastro.php' style='border-style: solid; border-radius: 10px; padding: 6px;'>Cadastrar Paciente</a>
                     <a class='navbar-brand' href='pacientes.php'  style='border-style: solid; border-radius: 10px; padding: 6px;'>Pacientes</a>
                  </div>
               </div>
            </nav>
         </header>
      "; 
   }

   public function setConteudoBody() {
      $this->sBody = '
         <div>
            <img src="../images/fundo.png" alt="fundo" style="width: 100%; height: 100%;">
         </div>
      ';
   }

   public function setConteudoFooter() {
      $this->sFooter = '
         <footer style="background: whitesmoke; width: 100%;   position: fixed; bottom:0; left:0;">
            <div style="display: flex; align-items: center; justify-content: space-evenly;">
               <div>
                  <h4>Contatos</h4>
                  <a href="mailto:eduardohsp13@unidavi.edu.br">eduardo@saudeae.com.br</a><br>
                  <a href="mailto:eduardohsp13@unidavi.edu.br">andre@saudeae.com.br</a><br>
                  <a href="tel:+4735252525">(47) 3525-2525</a>
               </div>
               <div>
                  <h4>Redes</h4>
                  <a href="https://www.instagram.com/yodasaltitante/?hl=pt-br">yodasaltitante</a><br>
                  <a href="https://www.instagram.com/andre.will07/?hl=pt-br">andre.will07</a><br>
                  <a href="https://github.com/eduardopereiraa">eduardopereiraa</a><br>
                  <a href="https://github.com/WillAndre07">WillAndre07</a><br>
               </div>
            </div>
            <div style="text-align: center;">
               <h5>₢Copyrite 2023 Saúde AE</h5>
            </div>
         </footer>
      ';
   }

   public function setLinkCssPrincipal() {
      $this->sLinkCss = "
         <link rel='stylesheet' href='../estilos/style_principal.css'>;     
      ";
   }
}
