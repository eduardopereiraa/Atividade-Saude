class AtendimentoCliente {

   static oCampos;
   static eDisparaIntervalo;

   constructor() {
      this.processaDadosOnLoad();
   }

   processaDadosOnLoad() {

   }

   atenderCliente(iId) {
      $(`#table-atendimento-${iId}`).css('display', '');
      $(`#botaoAtender-${iId}`).css('display', 'none');
      $(`#botaoAtendido-${iId}`).css('display', '');
      
      this.eDisparaIntervalo = setInterval(() => {
         let iRandomFrequenciaCardiaca  = Math.floor(Math.random() * (100 - 60) ) + 60;
         let iRandomSaturacaoOxigenio   = Math.floor(Math.random() * (100 - 95)) + 95;
         let iRandomTemperaturaCorporal = Math.floor(Math.random() * (38 - 35)) + 35;
      
         $(`#dadoFrequenciaCardiaca-${iId}`).val(iRandomFrequenciaCardiaca + ' Bpm');
         $(`#dadoOxigenio-${iId}`).val(iRandomSaturacaoOxigenio + '%');
         $(`#dadoTemperatura-${iId}`).val(iRandomTemperaturaCorporal + 'ºC');
      }, 1000);
   }

   encerrarAtendimento(iId) {
      clearInterval(this.eDisparaIntervalo);
      $(`#botaoAtendido-${iId}`).attr('disabled', '');
      $(`#botoes-${iId}`).css('margin-left', '70px');
      $(`#botaoAtendido-${iId}`).val('Paciente Atentido');
   }

}
