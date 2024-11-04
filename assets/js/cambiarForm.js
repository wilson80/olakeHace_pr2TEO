function mostrarFormulario(idFormulario) {
    // Obtener todos los formularios
    var formularios = document.querySelectorAll('.formulario');
    
    // Recorrer cada formulario y ocultarlo
    formularios.forEach(function(form) {
        form.style.display = 'none';
    });

    // Mostrar el formulario seleccionado
    document.getElementById(idFormulario).style.display = 'block';
    
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // Desplazamiento suave
    });
}