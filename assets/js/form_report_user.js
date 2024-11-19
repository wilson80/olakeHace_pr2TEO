
 // Mostrar la ventana modal al hacer clic en el botón "reportar"
 document.querySelectorAll('.reportUser-button').forEach(function(btn) {
    btn.addEventListener('click', function() {
        
        // Obtener el ID de la publicación
        currentPublicationId = this.getAttribute('data-idu'); // Guardar el ID de la publicación
        // Obtener el título
        currentTittle = this.getAttribute('data-tittleu'); // Guardar el título de la publicación
        
        // Colocar el título en el modal
        document.getElementById('titulo-publicacionu').textContent = "Reportando a: " + currentTittle;

        // Establecer el ID en el campo oculto del formulario
        document.getElementById('publicacionu-id').value = currentPublicationId;
        
        // Mostrar el modal
        document.getElementById('modale_user').style.display = 'flex';
    });
});


// Función para cerrar el modal cuando se hace clic en "Cancelar"
document.getElementById('cancelarUser-btn').addEventListener('click', function() {
    document.getElementById('modale_user').style.display = 'none'; // Ocultar modal
});



// Validar y cerrar la ventana modal al hacer clic en "Enviar"
document.getElementById('enviarUser-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevenir el envío del formulario

    // Verificar si hay un radio button seleccionado
    const selectedReason = document.querySelector('input[name="razonu"]:checked');

    // Verificar el valor del input de "Otro" si la opción "Otro" está seleccionada
    const otherReasonInput = document.getElementById('otra-razonu');
    const otherReasonText = otherReasonInput.value.trim();

    // Si no se seleccionó una razón, alerta
    if (!selectedReason && otherReasonText === "") {
        alert('Por favor selecciona una razón o especifica otra.');
        return;
    }

    // Si la opción seleccionada es "Otro", asegurarse de que se haya especificado
    if (selectedReason && selectedReason.value === "Otro" && otherReasonText === "") {
        alert('Por favor especifica la razón en el campo "Otro".');
        return;
    }

    // Ahora establecer el valor de la razón
    const razonu = selectedReason ? selectedReason.value : otherReasonText;

    // Agregar el valor de la razón al formulario
    const razonInput = document.createElement('input');
    razonInput.type = 'hidden';
    razonInput.name = 'razonu';
    razonInput.value = razonu;
    document.getElementById('reportu-form').appendChild(razonInput);

    // Cerrar el modal primero
    document.getElementById('modale_user').style.display = 'none';


    // Mostrar mensaje de confirmación después de cerrar el modal
    const confirmationMessage = document.createElement('div');
    confirmationMessage.textContent = 'El reporte se ha enviado correctamente.';
    confirmationMessage.style.cssText = `
    background-color: #28a745; /* Verde claro */
    color: white;
    padding: 15px;
    border-radius: 10px;
    margin-top: 300px;
    text-align: center;
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    width: auto;
    max-width: 400px;
    z-index: 1000;
    font-family: 'Arial', sans-serif;
    font-size: 30px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease-out;
`;


    // Agregar el mensaje al cuerpo del documento (fuera del modal)
    document.body.appendChild(confirmationMessage);

    // Esperar unos segundos para mostrar el mensaje antes de enviar el formulario
    setTimeout(function() {
        // Enviar el formulario
        document.getElementById('reportu-form').submit();

        // Eliminar el mensaje de confirmación después de 2 segundos
        confirmationMessage.remove();
    }, 2000); // Tiempo para mostrar el mensaje de confirmación


});