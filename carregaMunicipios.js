async function carregaMunicipiosRS() {
           
    const resposta = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados/RS/municipios');
    const municipios = await resposta.json();
    
    const datalist = document.getElementById('lista-municipios');
    municipios.forEach(municipio => {
        const option = document.createElement('option');
        option.value = municipio.nome;
        datalist.appendChild(option);
    });
   
}

carregaMunicipiosRS();