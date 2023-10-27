class CadastroCliente {

   static oCampos;

   constructor() {
      this.processaDadosOnLoad();
   }

   processaDadosOnLoad() {
      this.mapearCampos();
   }

   mapearCampos() {
      this.oCampos = {
         oNome           : $('#nome'),
         oSexo           : $('#sexo'),
         oCpf            : $('#cpf'),
         oCns            : $('#cns'),
         oEndereco       : $('#endereco'),
         oDataNascimento : $('#dataNascimento')
      };
   }

   async inserirCadastro() {
      const oDados = this.getObjetoDados();
      const aMensagens = this.getArrayMensagens(oDados);

      if (aMensagens.length) {
         return window.alert(aMensagens);
      }

      const xRetornoJSON = await this.cadastrarCliente(oDados);
      const oRetorno     = JSON.parse(xRetornoJSON);

      return window.alert(oRetorno.mensagem);
   }

   getObjetoDados() {
      return {
         sNome           : this.oCampos.oNome.val(),
         iSexo           : Number(this.oCampos.oSexo.val()),
         sCpf            : this.oCampos.oCpf.val(),
         sCns            : this.oCampos.oCns.val(),
         sEndereco       : this.oCampos.oEndereco.val(),
         sDataNascimento : this.oCampos.oDataNascimento.val()
      };
   }

   getArrayMensagens(oDados) {
      const aMensagens = [];

      if (!oDados.sNome) {
         aMensagens.push('O campo Nome é obrigatório.');
      }
      else if (!oDados.iSexo) {
         aMensagens.push('O campo Sexo é obrigatório.');
      }
      else if (!oDados.sCpf) {
         aMensagens.push('O campo CPF é obrigatório.');
      }
      else if (!oDados.sCns) {
         aMensagens.push('O campo CNS é obrigatório.');
      }
      else if (!oDados.sEndereco) {
         aMensagens.push('O campo Endereço é obrigatório.');
      }
      else if (!oDados.sDataNascimento) {
         aMensagens.push('O campo Data de Nascimento é obrigatório.');
      }

      return aMensagens;
   }

   cadastrarCliente(oDados) {
      const oUrl = new URL(location.href);
      const sUrl = oUrl.origin + '/Atividade%20Saude/forms_ajax/ajax_form_cadastro.php';

      oDados = $.extend({
         loading: true
      }, oDados);

      const oPromise = $.ajax({
         url: sUrl,
         type: 'POST',
         datatype: 'JSON',
         data: {
            req: 'inserirCadastro',
            chave: JSON.stringify(oDados)
         },
         complete: () => {
            if(oDados.loading) {
               loading: false;
            }
         }
      }, oDados);
      
      return oPromise;
   }
}
