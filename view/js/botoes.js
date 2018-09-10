let botao = ''
let listaNumeros = []
let numeroCandidatoPresidente = ''
let candidato = 'Deputado Estadual'

document.getElementById('deputadoEstadual').hidden = false
document.getElementById('deputadoFederal').hidden = true
document.getElementById('senador').hidden = true
document.getElementById('governador').hidden = true
document.getElementById('presidente').hidden = true

const limpaCampos = () => {
  listaNumeros = []
  document.getElementById('dig1').innerHTML = ''
  document.getElementById('dig2').innerHTML = ''
  document.getElementById('dig3').innerHTML = ''
  document.getElementById('dig4').innerHTML = ''
  document.getElementById('dig5').innerHTML = ''
}

const pressionaBotao = (id) => {
  if (listaNumeros.length < 5) {

    botao = document.getElementById(id).innerText
    listaNumeros.push(botao)

    console.log(listaNumeros)

    for (let i in listaNumeros) {
      if (listaNumeros.length === 1) {
        document.getElementById('dig1').innerHTML = listaNumeros[0]
        document.getElementById('dig2').innerHTML = ''
        document.getElementById('dig3').innerHTML = ''
        document.getElementById('dig4').innerHTML = ''
        document.getElementById('dig5').innerHTML = ''
      }
      else if (listaNumeros.length === 2) {
        document.getElementById('dig1').innerHTML = listaNumeros[0]
        document.getElementById('dig2').innerHTML = listaNumeros[1]
        document.getElementById('dig3').innerHTML = ''
        document.getElementById('dig4').innerHTML = ''
        document.getElementById('dig5').innerHTML = ''
      }
      else if (listaNumeros.length === 3) {
        document.getElementById('dig1').innerHTML = listaNumeros[0]
        document.getElementById('dig2').innerHTML = listaNumeros[1]
        document.getElementById('dig3').innerHTML = listaNumeros[2]
        document.getElementById('dig4').innerHTML = ''
        document.getElementById('dig5').innerHTML = ''
      }
      else if (listaNumeros.length === 4) {
        document.getElementById('dig1').innerHTML = listaNumeros[0]
        document.getElementById('dig2').innerHTML = listaNumeros[1]
        document.getElementById('dig3').innerHTML = listaNumeros[2]
        document.getElementById('dig4').innerHTML = listaNumeros[3]
        document.getElementById('dig5').innerHTML = ''
      }
      else if (listaNumeros.length === 5) {
        document.getElementById('dig1').innerHTML = listaNumeros[0]
        document.getElementById('dig2').innerHTML = listaNumeros[1]
        document.getElementById('dig3').innerHTML = listaNumeros[2]
        document.getElementById('dig4').innerHTML = listaNumeros[3]
        document.getElementById('dig5').innerHTML = listaNumeros[4]
      }
    }
  }
  numeroCandidatoPresidente = listaNumeros.join().replace(',', '')
}

const confirma = () => {
  audio.play()
  switch (candidato) {
    case 'Deputado Estadual':
      candidato = 'Deputado Federal'
      break
    case 'Deputado Federal':
      candidato = 'Senador'
      break
    case 'Senador':
      candidato = 'Governador'
      break
    case 'Governador':
      candidato = 'Presidente'
      break
  }
  manipulaTelas()
}

const manipulaTelas = () => {
  if (candidato === 'Deputado Federal') {
    document.getElementById('deputadoEstadual').hidden = true
    document.getElementById('deputadoFederal').hidden = false
  } else if (candidato === 'Senador') {
    document.getElementById('deputadoFederal').hidden = true
    document.getElementById('senador').hidden = false
  } else if (candidato === 'Governador') {
    document.getElementById('senador').hidden = true
    document.getElementById('governador').hidden = false
  } else {
    document.getElementById('governador').hidden = true
    document.getElementById('presidente').hidden = false
  }
}

const corrige = () => {
  limpaCampos()
  numeroCandidatoPresidente = ''
}

const branco = () => {
  limpaCampos()
  numeroCandidatoPresidente = 'BRANCO'
  audio.play()
}