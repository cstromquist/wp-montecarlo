const eventsPage = (Isotope) => {
  
  const $grid = new Isotope( '.events-grid', {
    itemSelector: '.event-item',
    percentPosition: true,
    layoutMode: 'fitRows',
    fitRows: {
      gutter: 42
    }
    //masonry: {
    //  columnWidth: '.event-item',
    //  gutter: 42
    //},
  });
  
  // store filter for each group
  var filters = {};

  $('.events-filter').on( 'change', function( event ) {
    var $select = $( event.target );
    // get group key
    var filterGroup = $select.attr('value-group');
    // set filter for group
    filters[ filterGroup ] = event.target.value;
    // combine filters
    var filterValue = concatValues( filters );
    // set filter for Isotope
    $grid.arrange({ filter: filterValue });
  });

  // flatten object by concatting values
  function concatValues( obj ) {
    var value = '';
    for ( var prop in obj ) {
      value += obj[ prop ];
    }
    return value;
  }

  
}

export {
  eventsPage
};