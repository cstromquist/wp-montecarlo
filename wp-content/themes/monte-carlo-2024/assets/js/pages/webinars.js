const webinarsPage = (Isotope) => {
  
  const $grid = new Isotope( '.webinars', {
    itemSelector: '[data-filterId]',
    percentPosition: true,
    layoutMode: 'fitRows',
    fitRows: {
      gutter: 28
    }
  });
  
  $('.filters-button-group').on( 'click', 'button', function() {
    var fel;
    var el = $( this ).attr('data-filter');
    if(el!='*') {
      fel = "[data-filterId='" + el + "']";
    } else {
      fel = "";
    }
    console.log(fel);
    $grid.arrange({ filter: fel });
  });
  
  
  //$('.filters-button-group').on( 'click', 'button', function() {
  //  let filterValue = $( this ).attr('data-filter');
  //  $grid.isotope({ filter: filterValue });
  //});
  // change is-checked class on buttons
  $('.webinars-filter').each( function( i, buttonGroup ) {
    const $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });
  
}

export {
  webinarsPage
};