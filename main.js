function verificaSenha(){
    var senha1 = document.getElementById('senha1').value;
    var senha2 = document.getElementById('senha2').value;
    var validacaoSenha = '';
    
    if(senha1 === senha2){
        validacaoSenha = 'ok';
    }else{
        alert("Os campos senha e Confirmação senha Não Coicidem")
    }
}
