if (document.getElementById('deputadoEstadual')) {

  let botao = ''
  let listaNumeros = []
  let numeroCandidatoPresidente = ''

  const pressionaBotao = (id) => {
    if (listaNumeros.length < 2) {

      botao = document.getElementById(id).innerText
      listaNumeros.push(botao)

      for (let i in listaNumeros) {
        if (listaNumeros.length === 1) {
          document.getElementById('dig1').innerHTML = listaNumeros[0]
          document.getElementById('dig2').innerHTML = ''
        }
        if (listaNumeros.length === 2) {
          document.getElementById('dig1').innerHTML = listaNumeros[0]
          document.getElementById('dig2').innerHTML = listaNumeros[1]
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

}