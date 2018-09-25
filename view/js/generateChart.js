let listaVotosPresidentes = []
let listaVotosGorvernadores = []
let listaVotosSenadores = []
let listaVotosDeputadosFederais = []
let listaVotosDeputadosEstaduais = []

const recebeLista = (lista) => {
  lista.forEach(candidato => {
    switch (candidato.tipoCandidato) {
      case '5':
        listaVotosPresidentes.push(candidato)
        break
      case '4':
        listaVotosGorvernadores.push(candidato)
        break
      case '3':
        listaVotosSenadores.push(candidato)
        break
      case '2':
        listaVotosDeputadosFederais.push(candidato)
        break
      case '1':
        listaVotosDeputadosEstaduais.push(candidato)
        break
    }
  })
}