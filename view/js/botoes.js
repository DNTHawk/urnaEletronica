let botao = ''
let listaNumeros = []
let numeroCandidatoPresidente = ''

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
      if (listaNumeros.length === 2) {
        document.getElementById('dig1').innerHTML = listaNumeros[0]
        document.getElementById('dig2').innerHTML = listaNumeros[1]
        document.getElementById('dig3').innerHTML = ''
        document.getElementById('dig4').innerHTML = ''
        document.getElementById('dig5').innerHTML = ''
      }
      if (listaNumeros.length === 3) {
        document.getElementById('dig1').innerHTML = listaNumeros[0]
        document.getElementById('dig2').innerHTML = listaNumeros[1]
        document.getElementById('dig3').innerHTML = listaNumeros[2]
        document.getElementById('dig4').innerHTML = ''
        document.getElementById('dig5').innerHTML = ''        
      }
      if (listaNumeros.length === 4) {
        document.getElementById('dig1').innerHTML = listaNumeros[0]
        document.getElementById('dig2').innerHTML = listaNumeros[1]
        document.getElementById('dig3').innerHTML = listaNumeros[2]
        document.getElementById('dig4').innerHTML = listaNumeros[3]
        document.getElementById('dig5').innerHTML = ''
      }
      if (listaNumeros.length === 5) {
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

const play = () => {
  audio.play()
}

const corrige = () => {
  listaNumeros = []
  document.getElementById('dig1').innerHTML = ''
  document.getElementById('dig2').innerHTML = ''
  numeroCandidatoPresidente = ''
}

const branco = () => {
  listaNumeros = []
  numeroCandidatoPresidente = 'BRANCO'
  audio.play()
  console.log(numeroCandidatoPresidente)
}