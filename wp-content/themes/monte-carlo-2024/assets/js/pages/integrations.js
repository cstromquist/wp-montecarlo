const integrationsPage = (Isotope) => {
    
  const integrationPage = $('body.product-template-page-integrations');
  
  if (integrationPage.length) {
    
    // quick search regex
    let qsRegex;
    let buttonFilter;
    
    const $grid = new Isotope( '.integrations-container', {
      // options
      itemSelector: '.filter-item',
      //layoutMode: 'cellsByColumn',
      percentPosition: true,
      masonry: {
        columnWidth: '.grid-sizer',
        gutter: 24
      },
      filter: function() {
        const $this = $(this);
        const searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
        const buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
        return searchResult && buttonResult;
      },
      //sortBy: '[data-date] parseInt',
      sortAscending: false,
      getSortData: {
        date: '[data-date] parseInt',
        modified: '[data-modified] parseInt',
        byname: '[data-byname]',
      }
      //cellsByColumn: {
      //  columnWidth: '.grid-sizer',
      //  rowHeight: '.grid-sizer'
      //}
    });
    
    $('.integration-filter-container').delay(800).css('opacity', '1');
    
    $('#filters').on( 'click', 'button', function() {
      buttonFilter = $( this ).attr('data-filter');
      $grid.arrange();
    });
    
    $('#setAsc').on( 'click', function() {
      $grid.arrange({sortAscending: true});
    });
    
    $('#setDesc').on( 'click', function() {
      $grid.arrange({sortAscending: false});
    });

    // use value of search field to filter
    const $quicksearch = $('#quicksearch').keyup( debounce( function() {
      qsRegex = new RegExp( $quicksearch.val(), 'gi' );
      $grid.arrange();
    }) );


      // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
      const $buttonGroup = $( buttonGroup );
      $buttonGroup.on( 'click', 'button', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        $( this ).addClass('is-checked');
      });
    });
    
    const sortByGroup = document.querySelector('.sort-by-button-group');
    sortByGroup.addEventListener( 'click', function( event ) {
      // only button clicks
      //if ( !matchesSelector( event.target, '.button' ) ) {
      //  return;
      //}
      var sortValue = event.target.getAttribute('data-sort-value');
      var $sort = $grid.options.sortAscending;
      
      $('.sortOrder').fadeIn();

      $grid.arrange({ sortBy: sortValue, sortAscending: $sort });

    });


    // debounce so filtering doesn't happen every millisecond
    function debounce( fn, threshold ) {
      var timeout;
      threshold = threshold || 100;
      return function debounced() {
        clearTimeout( timeout );
        const args = arguments;
        const _this = this;
        function delayed() {
          fn.apply( _this, args );
        }
        timeout = setTimeout( delayed, threshold );
      };
    }
      
  }
    
}

export {
  integrationsPage
};
