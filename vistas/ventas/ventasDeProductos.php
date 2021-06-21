<h4>Vender Producto</h4>
<div class="row">
    <div class="col-sm-4">
       
         <form id="frmVentasProductos">
               <label>Seleccionar Cliente</label>
               <select class="form-control input-sm" name="clienteVenta" id="clienteVenta">
                   <option value="A">seleccionar</option>
               </select>
               <label>Producto</label>
               <select class="form-control input-sm" name="ProductoVenta" id="ProductoVenta">
                   <option value="A">seleccionar</option>
               </select>
               <label>Descripcion</label>
               <textarea  id="" name="" class="form-control input-sm" ></textarea>
               <label>Cantidad</label>
               <input type="text" class="form-control input-sm" name="" id="">
               <label>Precio</label>
               <input type="text" class="form-control input-sm" name="" id="">
               <p></p>
               <span class="btn btn-primary" id="btnAgregaVenta">Agregar</span>
         </form>
        
    </div>
</div>

<script type="text/javascript">
     $(document).ready(function(){
        $('#clienteVenta').select2();
        $('#ProductoVenta').select2();
     });

</script>