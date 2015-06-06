<div class="modal" id="modalCategorias">
    <div class="modal-content">
        <div class="header">
            <h2 class="añadir">Añadir Categoría</h2>
        </div>
        <br/>
        <div class="copy formModificar">
            <form action="../backEnd/Categorias/phpInsertarCategoria.php" method="POST" enctype="multipart/form-data">
                <label class="nombreCategoria">Nombre:</label>
                <input type="text" name="nombre" value="" maxlength="20" size="20" id="nombre" required/>   
                <br/>        
                <br/>
                <div class="cf footer">
                    <input  class="aceptar aceptarSubmit" type="submit" value="Aceptar" />
                    <a class="cancelar" href="#">Cancelar</a>
                </div>

            </form>  
        </div>

    </div>
    <div class="overlay"></div>
</div>