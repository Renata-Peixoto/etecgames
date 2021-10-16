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
<form method="POST">
    <div class="mb-3 col-2">
        <label class="form-label" for="codigofornecedorinput">Código: </label>
        <input class="form-control text-center" readonly type="text" name="codFornAlterar" id="codigofornecedorinput" value="<?php echo ($fornecedor->codForn)?>">
    </div>
    <div class="mb-3 col-4">
        <label class="form-label" for="nomefornecedorinput">Nome: </label>
        <input class="form-control" type="text" name="nomeForn" id="nomefornecedorinput" value="<?php echo ($fornecedor->nomeForn) ?>">
    </div>
    <div class="mb-3 col-4">
        <label class="form-label" for="emailfornecedorinput">Email: </label>
        <input class="form-control" type="text" name="emailForn" id="emailfornecedorinput" value="<?php echo ($fornecedor->emailForn) ?>">
    </div>
    <div class="mb-3 col-4">
        <label class="form-label" for="fonefornecedorinput">Fone: </label>
        <input class="form-control" type="text" name="foneForn" id="fonefornecedorinput" value="<?php echo ($fornecedor->foneForn) ?>">
    </div>
    <div class="mb-3">
        <button type="submit" style="background-color:#FF1493;color:black;border:2pxsolid#FF1493;border-radius:12px;" class="btn btn-warning">Alterar</button>
    </div>
</form>