let botao = ''
let listaNumeros = []
let numeroCandidatoPresidente = ''
let candidato = 'Deputado Estadual'

document.getElementById('deputadoEstadual').hidden = false
document.getElementById('deputadoFederal').hidden = true
document.getElementById('senador').hidden = true
document.getElementById('governador').hidden = true
document.getElementById('presidente').hidden = true
document.getElementById('fim').hidden = true

const limpaCampos = () => {
  listaNumeros = []
  document.getElementById('dig1').innerHTML = ''
  document.getElementById('dig2').innerHTML = ''
  document.getElementById('dig3').innerHTML = ''
  document.getElementById('dig4').innerHTML = ''
  document.getElementById('dig5').innerHTML = ''
}

const pressionaBotao = (id) => {
  if (candidato === 'Deputado Estadual') {
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
  } else if (candidato === 'Deputado Federal') {
    if (listaNumeros.length < 4) {
      botao = document.getElementById(id).innerText
      listaNumeros.push(botao)

      console.log(listaNumeros)

      for (let i in listaNumeros) {
        if (listaNumeros.length === 1) {
          document.getElementById('df1').innerHTML = listaNumeros[0]
          document.getElementById('df2').innerHTML = ''
          document.getElementById('df3').innerHTML = ''
          document.getElementById('df4').innerHTML = ''
        }
        else if (listaNumeros.length === 2) {
          document.getElementById('df1').innerHTML = listaNumeros[0]
          document.getElementById('df2').innerHTML = listaNumeros[1]
          document.getElementById('df3').innerHTML = ''
          document.getElementById('df4').innerHTML = ''
        }
        else if (listaNumeros.length === 3) {
          document.getElementById('df1').innerHTML = listaNumeros[0]
          document.getElementById('df2').innerHTML = listaNumeros[1]
          document.getElementById('df3').innerHTML = listaNumeros[2]
          document.getElementById('df4').innerHTML = ''
        }
        else if (listaNumeros.length === 4) {
          document.getElementById('df1').innerHTML = listaNumeros[0]
          document.getElementById('df2').innerHTML = listaNumeros[1]
          document.getElementById('df3').innerHTML = listaNumeros[2]
          document.getElementById('df4').innerHTML = listaNumeros[3]
        }
      }
    }
  } else if (candidato === 'Senador') {
    if (listaNumeros.length < 3) {

      botao = document.getElementById(id).innerText
      listaNumeros.push(botao)

      console.log(listaNumeros)

      for (let i in listaNumeros) {
        if (listaNumeros.length === 1) {
          document.getElementById('s1').innerHTML = listaNumeros[0]
          document.getElementById('s2').innerHTML = ''
          document.getElementById('s3').innerHTML = ''
        }
        else if (listaNumeros.length === 2) {
          document.getElementById('s1').innerHTML = listaNumeros[0]
          document.getElementById('s2').innerHTML = listaNumeros[1]
          document.getElementById('s3').innerHTML = ''
        }
        else if (listaNumeros.length === 3) {
          document.getElementById('s1').innerHTML = listaNumeros[0]
          document.getElementById('s2').innerHTML = listaNumeros[1]
          document.getElementById('s3').innerHTML = listaNumeros[2]
        }
      }
    }
  } else if (candidato === 'Governador') {
    if (listaNumeros.length < 2) {

      botao = document.getElementById(id).innerText
      listaNumeros.push(botao)

      console.log(listaNumeros)

      for (let i in listaNumeros) {
        if (listaNumeros.length === 1) {
          document.getElementById('g1').innerHTML = listaNumeros[0]
          document.getElementById('g2').innerHTML = ''
        }
        else if (listaNumeros.length === 2) {
          document.getElementById('g1').innerHTML = listaNumeros[0]
          document.getElementById('g2').innerHTML = listaNumeros[1]
        }
      }
    }
  } else if (candidato === 'Presidente') {
    if (listaNumeros.length < 2) {

      botao = document.getElementById(id).innerText
      listaNumeros.push(botao)

      console.log(listaNumeros)

      for (let i in listaNumeros) {
        if (listaNumeros.length === 1) {
          document.getElementById('p1').innerHTML = listaNumeros[0]
          document.getElementById('p2').innerHTML = ''
        }
        else if (listaNumeros.length === 2) {
          document.getElementById('p1').innerHTML = listaNumeros[0]
          document.getElementById('p2').innerHTML = listaNumeros[1]
        }
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
    case 'Presidente':
      candidato = ''
  }
  manipulaTelas()
  limpaCampos()
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
  } else if (candidato === 'Presidente') {
    document.getElementById('governador').hidden = true
    document.getElementById('presidente').hidden = false
  } else {
    document.getElementById('presidente').hidden = true
    document.getElementById('fim').hidden = false
  }
}

const corrige = () => {
  limpaCampos()
  numeroCandidatoPresidente = ''
}

const branco = () => {
  confirma()
  limpaCampos()
  numeroCandidatoPresidente = 'BRANCO'
}