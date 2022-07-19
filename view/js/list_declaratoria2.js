const selectEle = document.getElementById('type_accion');
selectEle.addEventListener('change', function(){
    const index = selectEle.selectedIndex;
  
    // Add that data to the <p>
    if((index == 0)||(index == 1)||(index == 3)||(index == 4)){
      /* $('#type_reg_data').html(" ") */
      $('#id_type_reg_data').html(" ")
    }
    if((index == 2)){
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