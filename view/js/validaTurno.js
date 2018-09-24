// document.getElementById('botao_listar').hidden = true
document.getElementById('div_governador').hidden = true
document.getElementById('div_presidente').hidden = true

function seleciona_div(param) {
    console.log(param)
    if (param === 'governador') {
        document.getElementById('div_governador').hidden = false
        document.getElementById('div_presidente').hidden = true

    }else{
        document.getElementById('div_governador').hidden = true
        document.getElementById('div_presidente').hidden = false   
    }
}