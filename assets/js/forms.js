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
    const exportPDFButton = document.getElementById('exportPDF');
    if (exportPDFButton) {
        exportPDFButton.addEventListener('click', () => {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({
                orientation: 'landscape', // Cambiar la orientación a paisaje
            });
            doc.autoTable({
                html: '#myTable',
                startY: 20,
                theme: 'striped',
                headStyles: { fontSize: 10 }, // Tamaño de fuente para encabezados
                bodyStyles: { fontSize: 8 },  // Tamaño de fuente para el cuerpo
                margin: { top: 10, right: 10, bottom: 10, left: 10 },
            });
            doc.save('clinica_informe.pdf');
        });
    }

    const exportExcelButton = document.getElementById('exportExcel');
    if (exportExcelButton) {
        exportExcelButton.addEventListener('click', () => {
            const wb = XLSX.utils.table_to_book(document.getElementById('myTable'), { sheet: "Sheet1" });
            XLSX.writeFile(wb, 'clinica_informe.xlsx');
        });
    }
});
