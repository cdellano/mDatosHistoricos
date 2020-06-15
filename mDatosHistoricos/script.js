function llenar_vista1(){
  $.ajax({
      url:"qPrueba.php",
      type:"POST",
      dataType:"html",
      data:{},
      success:function(respuesta){
          $("#vista1").html(respuesta);
          $("#vista1").fadeIn("slow");
      },
      error:function(xhr,status){
          alert("Error en metodo AJAX"); 
      },
  });
}

function llenar_vista2(){
  $.ajax({
      url:"qPrueba2.php",
      type:"POST",
      dataType:"html",
      data:{},
      success:function(respuesta){
          $("#vista2").html(respuesta);
          $("#vista2").fadeIn("slow");
      },
      error:function(xhr,status){
          alert("Error en metodo AJAX"); 
      },
  });
}

function llenar_vista3(){
  $.ajax({
      url:"qPrueba3.php",
      type:"POST",
      dataType:"html",
      data:{},
      success:function(respuesta){
          $("#vista3").html(respuesta);
          $("#vista3").fadeIn("slow");
      },
      error:function(xhr,status){
          alert("Error en metodo AJAX"); 
      },
  });
}



function cuestionario(parametro){
  switch(parametro){
      case 1:
        llenar_vista1();
        break;
      case 2:
        llenar_vista2();
        break;
      case 3:
        llenar_vista3();
        break;
  }
}