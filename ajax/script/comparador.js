$(document).ready(function () {
    var paginaActual = 0;
    var numeroDePoductos = 0;

    function cargarPagina(pagina, categoria) {
        paginaActual = pagina;
        $.ajax({
            url: "ajax/ajaxCategoria.php?pagina=" + pagina + "&categoria=" + categoria,
            type: "get",
            success: function (result) {
                destruirProductos();
                construirProductos(result, categoria, null);
            },
            error: function (result) {
                //alert('error' + result);
            }
        });
    }

    /* Botón Comparar*/

    $(document).on('click', ".comparar", function (event) {
        event.preventDefault();
        $.ajax({
            url: "ajax/ajaxComparar.php",
            //type: "get",
            success: function (result) {
                destruirProductos();
                construirComparativa(result);
            },
            error: function (result) {
                //   alert('error');
            }
        });
    });


    /* Botón carrito*/
    $(".cart span").on('click', function (pagina) {
        // $("#dd").on('click', function (pagina) {
        $.ajax({
            url: "ajax/ajaxVerCarrito.php?pagina=" + pagina,
            //type: "get",
            success: function (result) {
                if (result.r === 0)
                {
                    /*window.location = '/Proyecto/index.php';*/
                    $('.wrapper-dropdown-2').toggleClass('active');
                    function noProductos() {
                        $('.wrapper-dropdown-2').toggleClass('active');
                    }
                    setTimeout(noProductos, 2000);
                }
                else
                {
                    destruirProductos();
                    construirCarrito(result);
                }
            },
            error: function (result) {
                //   alert('Carrito vacio');
            }
        });
    });

    /*Sumar, Restar y Eliminar del carrito*/

    $(document).on('click', ".gestionCarro", function (event) {
        event.preventDefault();
        var operacion = $(this).attr('id');
        var idProducto = $(this).parent('.add-cart').attr('id');
        var cantidadProductos = $('#cantidadProductos')[0];
        var cantidadAEliminar = $(this).attr('data-cantidad');

        $.ajax({
            url: "ajax/ajaxCarrito" + operacion + ".php?idProducto=" + idProducto,
            type: "get",
            success: function (result) {
                if (result.r === 0)
                {
                    window.location = '/Proyecto/index.php';
                    return;
                }

                if (operacion === "Add")
                {
                    cantidadProductos.textContent = parseFloat(cantidadProductos.textContent) + 1;
                }

                if (operacion === "Restar" && parseFloat(cantidadProductos.textContent) > 0)
                {
                    cantidadProductos.textContent = parseFloat(cantidadProductos.textContent) - 1;
                }

                if (operacion === "Eliminar")
                {
                    cantidadProductos.textContent = parseFloat(cantidadProductos.textContent) - cantidadAEliminar;
                }

                destruirProductos();
                construirCarrito(result);
            },
            error: function (result) {
                //  alert('error' + result);
            }
        });
    });

    /*añadir al carrito*/
    $(document).on('click', ".añadirCarro", function (event) {
        event.preventDefault();
        var idProducto = $(this).attr('id');
        var cantidadProductos = $('#cantidadProductos')[0];

        $.ajax({
            url: "ajax/ajaxCarritoAdd.php?idProducto=" + idProducto,
            type: "get",
            success: function (result) {
                cantidadProductos.textContent = parseFloat(cantidadProductos.textContent) + 1;
            },
            error: function (result) {
                // alert('error' + result);
            }
        });
    });

    /*Buscar producto click en el botón*/
    $("#buscar").on('click', function () {
        var nombre = $("#textoBuscar").val();

        if (nombre !== "Buscar")
        {
            $.ajax({
                url: "ajax/ajaxObtenerProducto.php?nombre=" + nombre,
                type: "get",
                success: function (result) {
                    destruirProductos();
                    construirProductos(result, null, nombre);
                },
                error: function (result) {
                    //   alert('error' + result);
                }
            });
        }
    });

    /*Buscar producto al pulsar enter*/
    $("#textoBuscar").on('keypress', function (event) {

        if (event.keyCode === 13)
        {
            var nombre = $("#textoBuscar").val();

            if (nombre !== "Buscar")
            {
                $.ajax({
                    url: "ajax/ajaxObtenerProducto.php?nombre=" + nombre,
                    type: "get",
                    success: function (result) {
                        destruirProductos();
                        construirProductos(result, null, nombre);
                    },
                    error: function (result) {
                        //   alert('error' + result);
                    }
                });
            }
        }
    });

    /*Ver cada categoria*/
    $(".categoria").on('click', function (event) {
        event.preventDefault();
        $(".search_box").css('visibility', 'visible');
        var categoria = $(this).attr('id');
        cargarPagina(0, categoria);
    });

    /*Paginacion*/
    $(document).on('click', ".enlace", function () {
        var datahref = $(this).attr('data-href');
        var datacategoria = $(this).attr('data-categoria');
        cargarPagina(datahref, datacategoria);
    });

    function destruirProductos() {
        var divProductos = $('.slider')[0];
        while (divProductos.hasChildNodes()) {
            divProductos.removeChild(divProductos.firstChild);
        }
    }

    function precioMenor(result, i)
    {
        var precioMenor = parseFloat(result.productos[i].precioAlcampo);
        var superMercado = "Alcampo";

        if (parseFloat(result.productos[i].precioCarrefour) < precioMenor)
        {
            precioMenor = parseFloat(result.productos[i].precioCarrefour);
            superMercado = "Carrefour";
        }

        if (parseFloat(result.productos[i].precioCoviran) < precioMenor)
        {
            precioMenor = parseFloat(result.productos[i].precioCoviran);
            superMercado = "Coviran";
        }

        if (parseFloat(result.productos[i].precioDia) < precioMenor)
        {
            precioMenor = parseFloat(result.productos[i].precioDia);
            superMercado = "Dia";
        }
        return superMercado;
    }

    function precioMenorCarrito(result, i)
    {
        var precioMenor = parseFloat(result.carrito[i].precioAlcampo);
        var superMercado = "Alcampo";

        if (parseFloat(result.carrito[i].precioCarrefour) < precioMenor)
        {
            precioMenor = parseFloat(result.carrito[i].precioCarrefour);
            superMercado = "Carrefour";
        }

        if (parseFloat(result.carrito[i].precioCoviran) < precioMenor)
        {
            precioMenor = parseFloat(result.carrito[i].precioCoviran);
            superMercado = "Coviran";
        }

        if (parseFloat(result.carrito[i].precioDia) < precioMenor)
        {
            precioMenor = parseFloat(result.carrito[i].precioDia);
            superMercado = "Dia";
        }
        return superMercado;
    }

    function construirProductos(result, categoria, nombre) {
        var divProductos = $('.slider');
        var contenido;
        var rutaFoto;
        var rutaReal;
        var superMercado;

        if (result.productos.length === 0) {
            if (categoria !== null)
            {
                divProductos.append($('<h3 class="tituloCategoria">No hay productos de la categoría: ' + categoria + ' </h3>'));
                return;
            }
            if (nombre !== null)
            {
                divProductos.append($('<h3 class="tituloCategoria">No existe el producto: ' + nombre + ' </h3>'));
                return;
            }
        } else {
            for (var i = 0; i < result.productos.length; i++) {
                rutaFoto = result.productos[i].foto;
                rutaReal = rutaFoto.substring(6, rutaFoto.length);

                superMercado = precioMenor(result, i);

                contenido = $('<div class="divProductos grid_1_of_4 images_1_of_4">'
                        + '<img src="' + rutaReal + '" alt="" />'
                        + '<h2>' + result.productos[i].nombre + ' </h2>'
                        + '<div class="price-details">'
                        + '<div class="price-number">'
                        + '<p id="' + result.productos[i].idProducto + 'Dia"><img class="logoSuper" src ="Imagenes/supermercados/comparar/CDia.png" alt="Dia"/><span class="rupees euros">' + result.productos[i].precioDia + '€</span></p>'
                        + '<p id="' + result.productos[i].idProducto + 'Coviran"><img class="logoSuper" src ="Imagenes/supermercados/comparar/CCoviran.png" alt="Coviran"/><span class="rupees euros">' + result.productos[i].precioCoviran + '€</span></p>'
                        + '<p id="' + result.productos[i].idProducto + 'Alcampo"><img class="logoSuper" src ="Imagenes/supermercados/comparar/CAlcampo.png" alt="Alcampo"/><span class="rupees euros">' + result.productos[i].precioAlcampo + '€</span></p>'
                        + '<p id="' + result.productos[i].idProducto + 'Carrefour"><img class="logoSuper" src ="Imagenes/supermercados/comparar/CCarrefour.png" alt="Carrefour"/> <span class="rupees euros">' + result.productos[i].precioCarrefour + '€</span></p>'
                        + '<div class="add-cart añadirCarro" id=' + result.productos[i].idProducto + ' >'
                        + '<h4><a href="#" >Añadir al Carrito</a></h4>'
                        + '</div>'
                        + '</div>'
                        + '<div class="clear"></div>'
                        + '</div>'
                        + ' </div>');

                divProductos.append(contenido);
                var id = "#" + result.productos[i].idProducto + superMercado;
                $(id).attr('class', 'barato');
            }
        }
        if (categoria !== null)
        {
            divProductos.prepend($('<h3 class="tituloCategoria" >Categoría: ' + categoria + ' </h3>'));
            /* paginacion */

            var divPaginacion = document.createElement("div");
            divPaginacion.setAttribute('class', 'content-pagenation');

            divPaginacion.innerHTML += "<li id=><a class='enlace' data-categoria='" + categoria + "'  data-href='" + result.paginas.inicio + "'>&lt&lt;</a></li>";

            divPaginacion.innerHTML += "<li><a class='enlace' data-categoria='" + categoria + "' data-href='" + result.paginas.anterior + "'>&lt;</a></li>";

            if (result.paginas.primero !== -1) {

                divPaginacion.innerHTML += "<li><a class='enlace' data-categoria='" + categoria + "' data-href='" + result.paginas.primero + "'>" + (parseInt(result.paginas.primero) + 1) + "</a></li>";

            }
            if (result.paginas.segundo !== -1) {

                divPaginacion.innerHTML += "<li><a class='enlace' data-categoria='" + categoria + "' data-href='" + result.paginas.segundo + "'>" + (parseInt(result.paginas.segundo) + 1) + "</a></li>";

            }
            if (result.paginas.actual !== -1) {
                divPaginacion.innerHTML += "<li><a class='enlace' data-categoria='" + categoria + "' data-href='" + result.paginas.actual + "'>" + (parseInt(result.paginas.actual) + 1) + "</a></li>";

            }
            if (result.paginas.cuarto !== -1) {
                divPaginacion.innerHTML += "<li><a class='enlace' data-categoria='" + categoria + "' data-href='" + result.paginas.cuarto + "'>" + (parseInt(result.paginas.cuarto) + 1) + "</a></li>";

            }
            if (result.paginas.quinto !== -1) {
                divPaginacion.innerHTML += "<li><a class='enlace' data-categoria='" + categoria + "' data-href='" + result.paginas.quinto + "'>" + (parseInt(result.paginas.quinto) + 1) + "</a></li>";
            }

            divPaginacion.innerHTML += "<li><a class='enlace' data-categoria='" + categoria + "' data-href='" + result.paginas.siguiente + "'>&gt;</a></li>";

            divPaginacion.innerHTML += "<li><a class='enlace' data-categoria='" + categoria + "' data-href='" + result.paginas.ultimo + "'>&gt;&gt;</a</li>";

            divProductos.append('<div class="clear"></div>');

            divProductos.append(divPaginacion);

            /*si es 0 lo ponemos en el último para saltarno los menor que y si solo hay una
             * pagina vamos haccia atrás para evitat los mayor que*/
            if (paginaActual == 0)
            {
                if ($("a[data-href='" + paginaActual + "']").last().text() === ">>")
                {
                    $("a[data-href='" + paginaActual + "']").last().parent().prev().prev().attr('class', 'active');
                }
                else
                {
                    $("a[data-href='" + paginaActual + "']").last().parent().attr('class', 'active');
                }
            }
            else
            {
                $("a[data-href='" + paginaActual + "']").first().parent().attr('class', 'active');
            }
        }
    }

    function construirCarrito(result) {
        var divProductos = $('.slider');
        var contenido;
        var rutaFoto;
        var rutaReal;
        var superMercado;

        for (var i = 0; i < result.carrito.length; i++) {
            rutaFoto = result.carrito[i].foto;
            rutaReal = rutaFoto.substring(6, rutaFoto.length);

            superMercado = precioMenorCarrito(result, i);

            contenido = $('<div class=" divProductos grid_1_of_4 images_1_of_4">'
                    + '<img src="' + rutaReal + '" alt="" />'
                    + '<h2>' + result.carrito[i].nombre + ' </h2>'
                    + '<div class="price-details">'
                    + '<div class="price-number">'
                    + '<p id="' + result.carrito[i].idProducto + 'Dia"><img class="logoSuper" src ="Imagenes/supermercados/comparar/CDia.png" alt="Dia"/><span class="rupees euros">' + result.carrito[i].precioDia + '€</span></p>'
                    + '<p id="' + result.carrito[i].idProducto + 'Coviran"><img class="logoSuper" src ="Imagenes/supermercados/comparar/CCoviran.png" alt="Coviran"/><span class="rupees euros">' + result.carrito[i].precioCoviran + '€</span></p>'
                    + '<p id="' + result.carrito[i].idProducto + 'Alcampo"><img class="logoSuper" src ="Imagenes/supermercados/comparar/CAlcampo.png" alt="Alcampo"/><span class="rupees euros">' + result.carrito[i].precioAlcampo + '€</span></p>'
                    + '<p id="' + result.carrito[i].idProducto + 'Carrefour"><img class="logoSuper" src ="Imagenes/supermercados/comparar/CCarrefour.png" alt="Carrefour"/><span class="rupees euros">' + result.carrito[i].precioCarrefour + '€</span></p>'
                    + '<br/>'
                    + '<div class="add-cart masMenosEliminar" id=' + result.carrito[i].idProducto + ' >'
                    + '<h4 class="gestionCarro" id="Add" ><a href="#" >+</a></h4>'
                    + '<span class="rupees" id="cantidad">' + result.carrito[i].cantidad + ' ud/s</span>'
                    + '<h4 class="gestionCarro" id="Restar"><a href="#" >-</a></h4>'
                    + '<br/><br/><br/>'
                    + '<h4 class="gestionCarro" id="Eliminar" data-cantidad="' + result.carrito[i].cantidad + '"><a href="#" >Elminar del Carrito</a></h4>'
                    + '</div>'
                    + '</div>'
                    + '<div class="clear"></div>'
                    + '</div>'
                    + ' </div>'
                    );

            divProductos.append(contenido);
            var id = "#" + result.carrito[i].idProducto + superMercado;
            $(id).attr('class', 'barato');
        }

        var botonComparar = $('<div class="clear"></div>'
                + '<br/>'
                + '<br/>'
                + '<div class="comparar" >'
                + '<h4><a href="#" >Comparar Compra</a></h4>'
                + '</div>');

        divProductos.append(botonComparar);
    }

    function superGanador(result)
    {
        var precio = result.comparativa[0].total;
        for (var i = 1; i < result.comparativa.length; i++) {
            if (parseFloat(result.comparativa[i].total) < precio)
            {
                precio = parseFloat(result.comparativa[i].total);
            }
        }
        return precio;
    }

    function construirComparativa(result) {
        var divProductos = $('.slider');
        var contenido;
        var precioGanador = superGanador(result);
        if (result.r === 0) {
            window.location = '/Proyecto/index.php';
        } else {
            for (var i = 0; i < result.comparativa.length; i++) {
                contenido = $('<div class="grid_1_of_4 images_1_of_4">'
                        + '<img src=" Imagenes/supermercados/Comparacion/' + result.comparativa[i].nombre + '.png" alt="" />'
                        + '<br/>'
                        + '<br/>'
                        + '<h2>' + result.comparativa[i].nombre + ' </h2>'
                        + '<div class="price-details">'
                        + '<br/>'
                        + '<p id=' + result.comparativa[i].nombre + '><span class="rupees">Total: ' + result.comparativa[i].total + '€</span></p>'
                        + '<div class="clear"></div>'
                        + '</div>'
                        + ' </div>'
                        );
                divProductos.append(contenido);
                if (parseFloat(result.comparativa[i].total) === precioGanador)
                {
                    $("#" + result.comparativa[i].nombre).attr('class', ' barato');
                }
            }
            divProductos.append("<div class='clear'></div><br/><h2 id='iva'>En todos los precios está incluido el iva.</h2>");

        }
    }
});