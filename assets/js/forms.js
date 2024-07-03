// ----------------- Formulario de Login -----------------
const formLogin = document.getElementById("formLogin");

// ----------------- Formulario de Empleados -----------------
const formEmpleados = document.getElementById("formEmpleados") || null;

const newMunicipioFromEmpleados = ()=>{
    const municipioSelect = document.getElementById('municipio');
    const modalTrigger = document.getElementById('modalTrigger');
    const newMunicipioInput = document.getElementById("new_municipio_input");
    const newMuniSpan = document.getElementById("new_municipio_span");

    // Agregar un evento 'change' al elemento <select>
    municipioSelect.addEventListener('change', function() {
        // Verificar si la opción seleccionada tiene el valor "new_municipio"
        if (municipioSelect.value === 'new_municipio') {
            // Imprimir un mensaje en la consola
            // console.log('Se seleccionó "Agregar Nuevo Municipio"');

            // Activar el modal de Bootstrap
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();

            // Mostrar el botón del trigger modal
            modalTrigger.classList.remove("d-none");
            newMuniSpan.classList.remove("d-none");
        } else {
            // Agregar la clase 'd-none' al botón del trigger modal
            newMuniSpan.classList.add("d-none");
            modalTrigger.classList.add("d-none");
            newMunicipioInput.value="";
            newMuniSpan.textContent = newMunicipioInput.value;

        }
    });

    document.getElementById('cuitInput').addEventListener('input', function() {
        const cuit = this.value;
        if (cuit.length === 11) {
            // Extraer los dígitos correspondientes al DNI (del tercer al décimo dígito)
            const dni = cuit.substring(2, 10);
            document.getElementById('dniInput').value = dni;
        } else {
            // Limpiar el campo DNI si el CUIT no tiene 11 dígitos
            document.getElementById('dniInput').value = '';
        }
    });

    // Agregar un evento 'input' al elemento input
    newMunicipioInput.addEventListener('input', function() {
        // Actualizar el contenido del span con el valor del input
        newMuniSpan.textContent = `"${newMunicipioInput.value}"`;
    });
}

if(formEmpleados){
    // Ejecutar funcion para agregar municipios desde empleados
    newMunicipioFromEmpleados();
}

// Funcion para mostrar la contraseña en el password
const btnMostrarPassword = ()=>{

    const inputPassword = document.getElementById("password");
    const btnMostrar = document.getElementById("btnMostrar");

    btnMostrar.addEventListener('click', ()=>{
        if (inputPassword.type === "password") {
            inputPassword.type = "text";
            btnMostrar.querySelector("path").setAttribute("d", "M4 12C4 12 5.6 7 12 7M12 7C18.4 7 20 12 20 12M12 7V4M18 5L16 7.5M6 5L8 7.5M15 13C15 14.6569 13.6569 16 12 16C10.3431 16 9 14.6569 9 13C9 11.3431 10.3431 10 12 10C13.6569 10 15 11.3431 15 13Z");
        } else {
            inputPassword.type = "password";
            btnMostrar.querySelector("path").setAttribute("d", "M4 10C4 10 5.6 15 12 15M12 15C18.4 15 20 10 20 10M12 15V18M18 17L16 14.5M6 17L8 14.5");
        }
    })
}

if(formLogin){
    btnMostrarPassword();
    
}
// document.addEventListener('DOMContentLoaded', (event) => {

//     const table = document.getElementById('myTable') || null;

//     if(table){
//         const tableBody = document.getElementById('table-body');
//         const rows = tableBody.querySelectorAll('tr');
//         let total = 0;
    
//         rows.forEach(row => {
//             const cantidadRegistros = parseInt(row.children[1].textContent, 10);
//             total += cantidadRegistros;
//         });
    
//         const totalRow = document.createElement('tr');
//         const totalCell1 = document.createElement('td');
//         const btnCell = document.createElement("button");
//         btnCell.classList.add("btn","btn-dark");
//         totalCell1.classList.add("btn-filtro");
//         const totalCell2 = document.createElement('td');
    
//         btnCell.innerText = 'Todos';
//         totalCell1.appendChild(btnCell);
//         totalCell2.textContent = total;
    
//         totalRow.appendChild(totalCell1);
//         totalRow.appendChild(totalCell2);
    
//         tableBody.insertBefore(totalRow, tableBody.firstChild);

//         const btnFiltro = document.querySelectorAll(".btn-filtro") || null;

//         btnFiltro.forEach(btn => {

//             btn.style.cursor = "pointer";
//             btn.addEventListener("click", () => {
//                 console.log(btn.innerText);
        
//                 // Iterar sobre todas las filas de la tabla, excepto la fila de encabezado
//                 for (let i = 1; i < table.rows.length; i++) {
//                     const row = table.rows[i];
//                     const especialidad = row.cells[0].textContent.trim(); // Obtener el contenido de la celda "Especialidad"
//                     row.style.display = '';
//                     // Ocultar la fila si la especialidad es "Nefrologia"
//                     if( btn.innerText === "Todos"){
//                         row.style.display = '';

//                     }else if (especialidad != btn.innerText) {
//                         row.style.display = 'none';
//                     }
                    
//                 }
//             })
//         })
//     }

// });

document.addEventListener('DOMContentLoaded', (event) => {
    const table = document.getElementById('myTable') || null;
    const filterButton = document.getElementById('filterBtn') || null; // Botón "Filtrar" del modal
    const clearButton = document.getElementById('clearFiltro') || null; // Botón "Limpiar" del modal
    const selectEspecialidad = document.getElementById('filterEspecialidad') || null;
    const selectSituacionRevista = document.getElementById('filterSituRevista') || null;

    if (table && filterButton) {
        filterButton.addEventListener('click', () => {
            const especialidadFiltro = selectEspecialidad.value !== '0' ? selectEspecialidad.options[selectEspecialidad.selectedIndex].text.split(' (')[0] : '';
            const situacionRevistaFiltro = selectSituacionRevista.value !== '0' ? selectSituacionRevista.options[selectSituacionRevista.selectedIndex].text.split(' (')[0] : '';

            const tableBody = table.querySelector('tbody');
            const rows = tableBody.querySelectorAll('tr');

            rows.forEach(row => {
                const especialidad = row.children[0].textContent.trim();
                const situacionRevista = row.children[4].textContent.trim();

                if ((especialidadFiltro === '' || especialidad === especialidadFiltro) &&
                    (situacionRevistaFiltro === '' || situacionRevista === situacionRevistaFiltro)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        clearButton.addEventListener('click', () => {
            const tableBody = table.querySelector('tbody');
            const rows = tableBody.querySelectorAll('tr');

            rows.forEach(row => {
                row.style.display = '';
            });

            // Resetear los selectores a la opción por defecto
            selectEspecialidad.value = '0';
            selectSituacionRevista.value = '0';
        });
    }
});
