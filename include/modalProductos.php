<div class="modal" id="modalProductos">
    <div class="modal-content">
        <div class="header">
            <h2 class="añadir" >Añadir Producto</h2>
        </div>
        <div class="copy formModificar">
            <form action="../backEnd/Productos/phpInsertar.php" method="POST" enctype="multipart/form-data">
                <br/>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="" maxlength="18"  size="20" id="nombre" required/>
                <br/>
                <br/>
                <label>Categoria:</label>  
                <select name="tipo">
                    <?php
                    foreach ($categorias as $key => $categoria) {
                        ?>
                        <option ><?php echo $categoria->getNombre(); ?></option>
                        <?php
                    }
                    ?>
                </select>
                <br/>
                <br/>
                <label>Precio Alcampo:</label>
                <input type="number" step="any" name="precioAlcampo" value="" size="10" id="precioAlcampo" required/>
                <span>€</span>
                <br/>
                <br/>
                <label>Precio Carrefour:</label>
                <input type="number" step="any" name="precioCarrefour" value="" size="10" id="precioCarrefour" required/>
                <span>€</span>
                <br/>
                <br/>
                <label>Precio Coviran:</label>
                <input type="number" step="any" name="precioCoviran" value="" size="10" id="precioCoviran" required/>
                <span>€</span>
                <br/>
                <br/>
                <label>Precio Dia:</label>
                <input type="number" step="any" name="precioDia" value="" size="10" id="precioDia" required/>
                <span>€</span>
                <br/>  
                <br/>
                <label>Foto del producto:</label>
                <input type="file" name="archivo[]" required/>
                <br/>
                <br/>
                <div class="cf footer">
                    <input class="aceptar aceptarSubmit" type="submit" value="Aceptar" />
                    <a class="cancelar" href="#">Cancelar</a>
                </div>                
            </form>
        </div>

    </div>
    <div class="overlay"></div>
</div>