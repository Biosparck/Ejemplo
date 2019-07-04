
<html>
<script src= 
        "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> 
        </script> 
<body>

    <button id=tabla1 onclick="Cargar1()">Cargar tabla 1</button>

    <div id="Tabla1" class="myCustom1">
       
    </div>

    <br/>

    <button id=tabla2 onclick="Cargar2()">Cargar tabla 2</button>

    <div id="Tabla2" class="myCustom1">
       
    </div>

</body>
</html> 

<script>
 function Cargar1 () {
      $("#Tabla1").load("Tabla1.php")
 }
</script>
<script>
 function Cargar2 () {
      $("#Tabla2").load("Tabla2.php")
 }
</script>
