$(document).ready(function(){

	App();
	function App(){

		//check the existence of an element
		jQuery.exists = function(selector) {
		  return ($(selector).length > 0);
		}

		GetMobileNav();

		HeaderGetSearch();

		HeaderCloseSearch();

		FilterScrollBox();

		function GetMobileNav(){
			$('#getMobileNav').on('click', function(){
				$(this).toggleClass('open');
				$('#mobileNav').toggleClass('open');
			});
		}

		function HeaderGetSearch(){
			$('#headerGetSearch').on('click', function(){
				
				$('#headerSearchForm').addClass('header-search-form-open');
				$('#headerSearchForm').find('.inpt-header-search').focus();
			});

			$('#headerCloseSearch').on('click', function(){
				$('#headerSearchForm').removeClass('header-search-form-open');
			})
		}

		function HeaderCloseSearch(){

			$('#headerCloseSearch').on('click', function(){
				$('#headerSearchForm').removeClass('header-search-form-open');
			})
		}

		$(document).on( 'keydown', function ( e ) {
		  if ( e.keyCode === 27 ) { // ESC

				$('#headerSearchForm').removeClass('header-search-form-open');
		  }
		});


		function FilterScrollBox(){

			if( $('.scrollbar-inner').length ){
				$('.scrollbar-inner').scrollbar();
			}

			
		}


	}


});