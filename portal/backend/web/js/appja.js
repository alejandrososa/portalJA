/**
 * 
 */

if (!window.console) {var console = {};}
if (!console.log) {console.log = function() {};}

(function($) {

  $.Site = function(e) {
    this.$e = $(e);
    this.init();
  };

  $.Site.prototype = {

    init : function() {
    	var DEBUG_MODE_ON = true;

        // Disable console.log if DEBUG_MODE_ON=false or debug console is not available (p.e. IE8 or IE9)
        if ( (!DEBUG_MODE_ON) || (!window.console) ) { 
          console = console || {};
          console.log = function(){};
        }
            
        console.log('Portal JA init!');
        
        // Properties
        // ======================================================= 
        this.$menu_enlace		= this.$e.find('#menu-enlace');
        this.$menu_target 		= this.$e.find('#menu-target');
        this.$menu_tipo_target 	= this.$e.find('#menu-tipo_enlace');
        this.$menu_paginas 		= this.$e.find('#paginas-titulo');
        
        // Methods invocation
        // =======================================================
        this.menuInit();
    },
    menuInit : function () {

        var self = this;
        var txt_enlace = self.$menu_enlace
        var select_tipo = self.$menu_tipo_target;
        var select_target = self.$menu_target;
        var select_paginas = self.$menu_paginas;
        var div_enlace = $('.field-menu-enlace');
        var div_paginas = $('.field-paginas-titulo');
        var txth_url = $('#menu_url');
        
        
        //check if exist paginas
        if (select_paginas.length == 0) {
        	select_tipo.find('[value="interno"]').remove();
        }
        
        //toogle enlace or paginas
        if (select_tipo.length) {        	
        	select_tipo.change(function (event) {
                event.preventDefault();
                if(select_tipo.val() === 'interno'){
                	div_paginas.show();
                	div_enlace.hide();
                }else{
                	div_enlace.show();
                	div_paginas.hide();
                } 
            });
        }
        
        //fill txthidden
        if (select_paginas.length) {
        	select_paginas.change(function (event) {
                event.preventDefault();
                txth_url.val(select_paginas.val());
            });
        }        
        if (txt_enlace.length) {
        	txt_enlace.change(function (event) {
                event.preventDefault();
                txth_url.val(txt_enlace.val());
            });
        }
        

       /* if (select_target.length) {        	
        	

          $.each( self.$menu_target, function (index,value){

            var $dropdown       = $(value),
                $dropdownToggle = $dropdown.find('.dropdown--toggle');

            $dropdownToggle.on('click', function (event) {
              event.preventDefault();
              $dropdown.toggleClass('active');
            });

            $(document).on('mouseup keyup', function (event) {
              if (!$dropdown.is(event.target) && $dropdown.has(event.target).length === 0) {
            	  $dropdown.removeClass('active');
              }
            });


          });

          
        }*/
        console.log('Sección Menu inicializada.');

      }
  }
  
  $(function() {
	    window.wrapper = new $.Site('body');
	  });
	})(jQuery);

  /*
$(function(){
	$('#caracteristicas_servicios').exists(function() {
	});
});
  */