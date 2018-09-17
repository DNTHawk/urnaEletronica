// document.getElementById('botao_listar').hidden = true
document.getElementById('div_depultado_estadual').hidden = true
document.getElementById('div_depultado_federal').hidden = true
document.getElementById('div_senador').hidden = true
document.getElementById('div_governador').hidden = true
document.getElementById('div_presidente').hidden = true


function seleciona_div(param) {
    console.log(param)
    if (param === 'depultado_estadual') {
        document.getElementById('div_depultado_estadual').hidden = false
        document.getElementById('div_depultado_federal').hidden = true
        document.getElementById('div_senador').hidden = true
        document.getElementById('div_governador').hidden = true
        document.getElementById('div_presidente').hidden = true

    } else if (param === 'depultado_federal') {
        document.getElementById('div_depultado_estadual').hidden = true
        document.getElementById('div_depultado_federal').hidden = false
        document.getElementById('div_senador').hidden = true
        document.getElementById('div_governador').hidden = true
        document.getElementById('div_presidente').hidden = true

    } else if (param === 'senador') {
        document.getElementById('div_depultado_estadual').hidden = true
        document.getElementById('div_depultado_federal').hidden = true
        document.getElementById('div_senador').hidden = false
        document.getElementById('div_governador').hidden = true
        document.getElementById('div_presidente').hidden = true

    } else if (param === 'governador') {
        document.getElementById('div_depultado_estadual').hidden = true
        document.getElementById('div_depultado_federal').hidden = true
        document.getElementById('div_senador').hidden = true
        document.getElementById('div_governador').hidden = false
        document.getElementById('div_presidente').hidden = true

    }else{
        document.getElementById('div_depultado_estadual').hidden = true
        document.getElementById('div_depultado_federal').hidden = true
        document.getElementById('div_senador').hidden = true
        document.getElementById('div_governador').hidden = true
        document.getElementById('div_presidente').hidden = false   
    }
}