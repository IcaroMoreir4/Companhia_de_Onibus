document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('passagemForm');
    const passagemInfo = document.getElementById('passagemInfo');
    const passageiroNome = document.getElementById('passageiroNome');
    const dataViagem = document.getElementById('dataViagem');
    const idOnibus = document.getElementById('idOnibus');
    const idPassagem = document.getElementById('idPassagem');
  
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const nome = form.nome.value;
        const cpf = form.cpf.value;
        const telefone = form.telefone.value;
        const data = form.data.value;
    
        const idPassagemGerado = Math.floor(Math.random() * 1000) + 1;
        const dataViagemSelecionada = new Date(data); 
    
        passageiroNome.textContent = nome;
        dataViagem.textContent = dataViagemSelecionada.toLocaleDateString('pt-BR');
        idOnibus.textContent = '123';
        idPassagem.textContent = idPassagemGerado;
    
        passagemInfo.style.display = 'block';
        form.reset();
    });    
  });
  