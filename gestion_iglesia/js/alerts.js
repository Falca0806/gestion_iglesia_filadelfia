
        function cerrarAlerta() {
            var alerta = document.getElementById("alerta");
            alerta.style.display = "none"; // Oculta la alerta

            // Redirigir a index.php?vista=usuarios
            window.location.href = 'index.php?vista=usuarios';
        }