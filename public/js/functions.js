window.addEventListener('load',
    function () {
        fetch("https://restcountries.eu/rest/v2/all")
            .then(function (response) {
                return response.json();
            }).then(function (paises) {
                let pais = document.getElementById("pais");
                paises.forEach(element => {
                    let option = document.createElement('option');
                    option.setAttribute('value', element.name);
                    option.innerHTML = element.name;
                    if (element.name == "Argentina") {
                        option.selected = 'selected';
                    }
                    pais.appendChild(option);
                });
            })
    }, false);

function inscribirse(id, name, speaker, dateString) {
    const days = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    let input = document.getElementById('activityInput');
    input.value = id;
    let title = document.getElementById('title');
    title.innerHTML = `${speaker}: "${name}"`;
    let date = new Date(dateString);
    let dateP = document.getElementById('date');
    dateP.innerHTML = `${days[date.getDay()]} ${date.getDate()} de ${months[date.getMonth()]} ${date.getFullYear()} ${date.getHours()} hs (Argentina) por el canal de YouTube del Festival`;
}