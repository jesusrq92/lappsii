// modales

      function contactar()
      {
          var ventana = document.getElementById("winContactar");
          ventana.style.marginTop = "100px";
          ventana.style.display = "block";
      }
      function notice1()
      {
          var ventana = document.getElementById("winNotice1");
          ventana.style.marginTop = "100px";
          ventana.style.display = "block";
      }
      function notice2()
      {
          var ventana = document.getElementById("winNotice2");
          ventana.style.marginTop = "100px";
          ventana.style.display = "block";
      }
      function notice3()
      {
          var ventana = document.getElementById("winNotice3");
          ventana.style.marginTop = "100px";
          ventana.style.display = "block";
      }
      function closeContactar()
      {
          var ventana = document.getElementById("winContactar");
          ventana.style.display = "none";
      }
      function closeNotice1()
      {
          var ventana = document.getElementById("winNotice1");
          ventana.style.display = "none";
      }
      function closeNotice2()
      {
          var ventana = document.getElementById("winNotice2");
          ventana.style.display = "none";
      }
      function closeNotice3()
      {
          var ventana = document.getElementById("winNotice3");
          ventana.style.display = "none";
      }

// Ajax formularios
      
    jQuery(function(){

      var  form1 = jQuery('form#lappsiiForm1');
      form1.submit(function(e)
      {
       e.preventDefault();
       dataString = form1.serialize();
       jQuery.ajax({
        type:'POST',
        url:'php/contactar1.php',
        data: dataString,
          beforeSend: function(){
            swal({title: "Espere un momento...",
                  text:"Estamos verificando sus datos",
                  imageUrl: "php/loading.gif",
                  showConfirmButton:false});
          },
          success:function(data){
            jQuery("#DivForm").replaceWith(data);
          },
          complete:function(){
          }
       });
       return false;

        });

      });

    
    jQuery(function(){

      var  form2 = jQuery('form#lappsiiForm2');
      form2.submit(function(e)
      {
       e.preventDefault();
       dataString = form2.serialize();
       jQuery.ajax({
        type:'POST',
        url:'php/contactar2.php',
        data: dataString,
          beforeSend: function(){
            swal({title: "Espere un momento...",
                  text:"Estamos verificando sus datos",
                  imageUrl: "php/loading.gif",
                  showConfirmButton:false});
          },
          success:function(data){
            jQuery("#DivForm").replaceWith(data);
          },
          complete:function(){
          }
       });
       return false;

        });

      });
    