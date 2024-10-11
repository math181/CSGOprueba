
const skins = [
    { nombre: "AK-47 | Común", probabilidad: 50, imagen: "/CSGO 2/ImgArma/AK47.png" },
    { nombre: "M4A1-S | Rara", probabilidad: 30, imagen: "/CSGO 2/ImgArma/M4.jpegAWP.webp" },
    { nombre: "AWP | Épica", probabilidad: 15, imagen: "/CSGO 2/ImgArma/AWP.webp" },
    { nombre: "Karambit | Legendaria", probabilidad: 5, imagen: "/CSGO 2/ImgArma/karambit.jpg" }
];

function abrirCaja() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "aperturaCaja.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            const resultado = JSON.parse(xhr.responseText); 
            mostrarResultado(resultado);
        }
    };

    
    xhr.send("id_caja=1");
}


function mostrarResultado(data) {
    const resultadoDiv = document.getElementById("resultado");


    if (data.error) {
        resultadoDiv.innerHTML = `<p>Error: ${data.error}</p>`;
    } else {
        
        resultadoDiv.innerHTML = `
            <h2>Resultado:</h2>
            <img src="${data.imagen}" alt="${data.nombre}" />
            <p>Skin: ${data.nombre}</p>
            <p>Rareza: ${data.rareza}</p>
        `;
    }
}