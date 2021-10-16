
<style type="text/css">

form{
  font-size: large;
  background: #000000;
  max-width: 1300px;
  margin: 0 auto;
  padding: 0 50px 10px 10px;
  }
 
  label {
          color:#FF1493;
  }
  .formcad {
  width: 600px;
  height: 800px;
  margin: auto;
  padding-top: 50px;
  padding-bottom: 30px;
}
  

</style>
<div class="formcad">
<form method="POST">
    <div class="mb-3 col-2">
        <label class="form-label" for="codUsuAlterar">Código </label>
        <input class="form-control text-center"type="text" name="codUsuAlterar"readonly id="codigousuario" value="<?php echo($usuario->codusu)?>">
    </div>
    <div class="mb-3 col-8">
        <label class="form-label"for="codigoEmail"> Email </label>
        <input class="form-control" type="text"name="emailUsu" id="codigoEmail" value="<?php echo($usuario->emailUsu)?>">
    </div>
    <div>
        <button type="submit" style="background-color:#FF1493;color:black;border:2pxsolid#FF1493;border-radius:12px;" class="btn btn-primary">Alterar </button>
    </div>
    </div>
</form>