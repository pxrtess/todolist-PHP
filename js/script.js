function apagarItem(id){
    document.getElementById("item"+id).style.display = "none";
    location.reload();
}

function cadastrar(){
    document.getElementById('formCadastro').style.display = 'block';
    document.getElementById('formLogin').style.display = 'none';
    document.getElementById('btnLogar').style.display = 'block';
    document.getElementById('btnCadastrar').style.display = 'none';
}
function logar(){
    document.getElementById('formCadastro').style.display = 'none';
    document.getElementById('btnLogar').style.display = 'none';
    document.getElementById('formLogin').style.display = 'block';
    document.getElementById('btnCadastrar').style.display = 'block';
}