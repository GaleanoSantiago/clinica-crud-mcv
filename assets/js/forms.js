
const formEmpleados = document.getElementById("formEmpleados") || null;

const newMunicipioFromEmpleados = ()=>{
    const municipioSelect = document.getElementById('municipio');
    const modalTrigger = document.getElementById('modalTrigger');
    const newMunicipioInput = document.getElementById("new_municipio_input");

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
        } else {
            // Agregar la clase 'd-none' al botón del trigger modal
            modalTrigger.classList.add("d-none");
            newMunicipioInput.value="";
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
}

if(formEmpleados){
    // Ejecutar funcion para agregar municipios desde empleados
    newMunicipioFromEmpleados();
}