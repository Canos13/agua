const selectEle = document.getElementById('type_accion');
selectEle.addEventListener('change', function(){
    const index = selectEle.selectedIndex;
  
    // Add that data to the <p>
    if((index == 1)||(index == 0)||(index == 3)){
      /* $('#type_reg_data').html(" ") */
      $('#id_type_reg_data').html(" ")
    }
    if((index == 2)||(index == 4)){
      $.ajax({
        type: 'POST',
        url: 'view/html/listasdedeclararorias2.php'
      })
      .done(function(lists_declaratoias){
        /* $('#type_reg_data').html(lists_declaratoias) */
        $('#id_type_reg_data').html(lists_declaratoias)
      })
      .fail(function(){
        alert('Declaratorias no disponibles');
      }) 
    }
  })