/*
    API drag & drop:

    Existen dos partes principales en esta API, el objeto a arrastrar y la zona donde vamos a dejarlo

    Para controlar estas acciones tenemos varios eventos de cada una de las partes
        Objeto a arrastrar:
            dragstart: Se dispara al comenzar a arrastrar
            drag: Se dispara mientras arrastramos
            dragend: Se dispara cuando soltamos el objeto

        Zona de destino:
            dragenter: Se dispara cuando el objeto entra en la zona de destino
            dragover: Se dispara cuando el objeto se mueve sobre la zona de destino
            dragleave: Se dispara cuando el objeto sale de la zona de destino
            drop: Se dispara cuando soltamos el objeto en la zona de destino
*/

// Guardamos en variales los elementos que vamos a usar

const fileInput = document.getElementById('form-input_file');
const form = document.getElementById('form');
const smile = document.getElementById('smile')
const dropZone = document.getElementById('drop-zone')

    smile.addEventListener('dragend', () => {
        console.log('Drag End')
    })
    
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault() // Cambia el icono cuando pasa por la zona drop
        console.log('Drag Over')
    })
    
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault() // Para no abrir archivo
        console.log('Drop')
    })
    
    dropZone.addEventListener('dragleave', (e) => {
        console.log('Drag Leave')
    })




// CONDICIÓN PARA COMPROBAR LA EXISTENCIA DE VARIABLES

// Esto sustituye al funcionamiento del botón tradicional

dropZone.addEventListener('click', () => fileInput.click());

// Este evento nos controla cuando hemos selecionado algo

    fileInput.addEventListener('change', (e) => {
// Con esto podemos ver los elementos que hemos seleccionado
        fileInput.files;
    });

// Animamos el paso por encima de la zona

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('drop-zone_active')
    });

// Desaninamos la salida del paso por encima de la zona
    dropZone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropZone.classList.remove('drop-zone_active')
    });

// Aquí recogemos los elementos seleccionados
// También le pasamos los elementos seleccionados al botón tradicional
// para que el funcionamiento sea el mismo

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('drop-zone_active')
        
// Con esta instrucción le pasamos los valores

        fileInput.files = e.dataTransfer.files;
        
// Con esto podemos ver los elementos que hemos seleccionado
        console.log(fileInput.files);
    });
    
// No dejamos subir los archivos si no hay archivo
    form.addEventListener('submit', (e) => {
        if (fileInput.files.length == 0) {
            e.preventDefault();
        }
    });