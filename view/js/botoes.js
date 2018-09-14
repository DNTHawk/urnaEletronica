let botao = ''
let listaNumeros = []
let numeroCandidatoPresidente = ''
let candidato = 'Deputado Estadual'
let arrayCandidatos = []
let imagem = ''
let imagemVice = ''

document.getElementById('deputadoEstadual').hidden = false
document.getElementById('deputadoFederal').hidden = true
document.getElementById('senador').hidden = true
document.getElementById('governador').hidden = true
document.getElementById('presidente').hidden = true
document.getElementById('fim').hidden = true

const listaCandidato = (listaCandidatos) => {
  arrayCandidatos = listaCandidatos
}

const limpaCampos = () => {
  document.getElementById('dig1').innerHTML = ''
  document.getElementById('dig2').innerHTML = ''
  document.getElementById('dig3').innerHTML = ''
  document.getElementById('dig4').innerHTML = ''
  document.getElementById('dig5').innerHTML = ''
  document.getElementById('df1').innerHTML = ''
  document.getElementById('df2').innerHTML = ''
  document.getElementById('df3').innerHTML = ''
  document.getElementById('df4').innerHTML = ''
  document.getElementById('s1').innerHTML = ''
  document.getElementById('s2').innerHTML = ''
  document.getElementById('s3').innerHTML = ''
  document.getElementById('g1').innerHTML = ''
  document.getElementById('g2').innerHTML = ''
  document.getElementById('p1').innerHTML = ''
  document.getElementById('p2').innerHTML = ''
  listaNumeros = []
  imagem = ''
  document.getElementById('fotoDE').src = ''
  document.getElementById('nomeDE').innerHTML = ''
  document.getElementById('partidoDE').innerHTML = ''
  document.getElementById('fotoDF').src = ''
  document.getElementById('nomeDF').innerHTML = ''
  document.getElementById('partidoDF').innerHTML = ''
  document.getElementById('fotoSe').src = ''
  document.getElementById('nomeSe').innerHTML = ''
  document.getElementById('partidoSe').innerHTML = ''
  document.getElementById('fotoGov').src = ''
  document.getElementById('fotoVicGov').src = ''
  document.getElementById('nomeGov').innerHTML = ''
  document.getElementById('nomeVicGov').innerHTML = ''
  document.getElementById('partidoGov').innerHTML = ''
  document.getElementById('fotoPre').src = ''
  document.getElementById('fotoVicPre').src = ''
  document.getElementById('nomePre').innerHTML = ''
  document.getElementById('nomeVicPre').innerHTML = ''
  document.getElementById('partidoPre').innerHTML = ''
}

const pressionaBotao = (id) => {
  console.log(arrayCandidatos)
  if (candidato === 'Deputado Estadual') {
    if (listaNumeros.length < 5) {

      botao = document.getElementById(id).innerText
      listaNumeros.push(botao)

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
      if (listaNumeros.length === 5) {
        let text = listaNumeros.join().replace(/,/g, '')
        console.log(text)
        for (let i in arrayCandidatos) {
          if (text === arrayCandidatos[i].numero) {
            imagem = arrayCandidatos[i].fotoCandidato
            document.getElementById('fotoDE').src = imagem
            document.getElementById('nomeDE').innerHTML = arrayCandidatos[i].nomeCandidato
            document.getElementById('partidoDE').innerHTML = arrayCandidatos[i].descricao
          }
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
      if (listaNumeros.length === 4) {
        let text = listaNumeros.join().replace(/,/g, '')
        console.log(text)
        for (let i in arrayCandidatos) {
          if (text === arrayCandidatos[i].numero) {
            imagem = arrayCandidatos[i].fotoCandidato
            document.getElementById('fotoDF').src = imagem
            document.getElementById('nomeDF').innerHTML = arrayCandidatos[i].nomeCandidato
            document.getElementById('partidoDF').innerHTML = arrayCandidatos[i].descricao
          }
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
      if (listaNumeros.length === 3) {
        let text = listaNumeros.join().replace(/,/g, '')
        console.log(text)
        for (let i in arrayCandidatos) {
          if (text === arrayCandidatos[i].numero) {
            imagem = arrayCandidatos[i].fotoCandidato
            document.getElementById('fotoSe').src = imagem
            document.getElementById('nomeSe').innerHTML = arrayCandidatos[i].nomeCandidato
            document.getElementById('partidoSe').innerHTML = arrayCandidatos[i].descricao
          }
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
      if (listaNumeros.length === 2) {
        let text = listaNumeros.join().replace(/,/g, '')
        console.log(text)
        for (let i in arrayCandidatos) {
          if (text === arrayCandidatos[i].numero && arrayCandidatos[i].tipoCandidato === '4') {
            imagem = arrayCandidatos[i].fotoCandidato
            imagemVice = arrayCandidatos[i].fotoVice
            document.getElementById('fotoGov').src = imagem
            document.getElementById('fotoVicGov').src = imagemVice
            document.getElementById('nomeGov').innerHTML = arrayCandidatos[i].nomeCandidato
            document.getElementById('nomeVicGov').innerHTML = arrayCandidatos[i].nomeVice
            document.getElementById('partidoGov').innerHTML = arrayCandidatos[i].descricao
          }
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
      if (listaNumeros.length === 2) {
        let text = listaNumeros.join().replace(/,/g, '')
        console.log(text)
        for (let i in arrayCandidatos) {
          if (text === arrayCandidatos[i].numero && arrayCandidatos[i].tipoCandidato === '5') {
            imagem = arrayCandidatos[i].fotoCandidato
            imagemVice = arrayCandidatos[i].fotoVice
            document.getElementById('fotoPre').src = imagem
            document.getElementById('fotoVicPre').src = imagemVice
            document.getElementById('nomePre').innerHTML = arrayCandidatos[i].nomeCandidato
            document.getElementById('nomeVicPre').innerHTML = arrayCandidatos[i].nomeVice
            document.getElementById('partidoPre').innerHTML = arrayCandidatos[i].descricao
          }
        }
      }
    }
  }
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