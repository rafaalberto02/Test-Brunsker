function preencherCep(value) {
  
    if (validaCep(value)) {
        (async () => {
            const response = await fetch(`https://viacep.com.br/ws/${value}/json/`).then(response => response.json());
            preencherFormulario(response);
        })();
    } else {
        limpaFormulario();
        alert("Cep inválido!");
    }
}

function validaCep(value) {
    let cep = value.replace(/\D/g, '');

    if (cep != "") {
        if (/^[0-9]{8}$/.test(cep)) {
            return true;
        }
    }
    return false;
}

function limpaFormulario() {
    document.getElementById('logradouro').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function preencherFormulario(endereco) {
    if (endereco.logradouro !== undefined) {
        document.getElementById('logradouro').value = (endereco.logradouro);
        document.getElementById('bairro').value = (endereco.bairro);
        document.getElementById('cidade').value = (endereco.localidade);
        document.getElementById('uf').value = (endereco.uf);
    } else {
        limpaFormulario();
        alert("Cep não encontrado!");
    }
}