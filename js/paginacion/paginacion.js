$(document).ready(function () {
    /*Le aplicamos la clase active a la pagina actual para cambiarle el estilo*/
        var pagina = parseInt($(".pagina").parent("div").attr('data-pagina'))+1;
        var li = $(".pagina");

        for (var i = 0; i < li.length; i++)
        {
            if (parseInt(li[i].textContent) === pagina)
            {
               var enlace = document.createElement('a');
               enlace.textContent = li[i].textContent;
               li[i].setAttribute('class','active');
               li[i].textContent = "";
               li[i].appendChild(enlace);
            }
        }
});

