jQuery(document).ready(function () {

    dynamic_title_repeater_accordion('accordion_item', 'accordion_button_text');
    dynamic_title_repeater_accordion('tab_component_sections', 'tab_component_tab_title');
    dynamic_title_repeater_accordion('layout_items', 'layout_item_title');
    dynamic_title_repeater_accordion('footer_menus', 'footer_top_menu_title');
    dynamic_title_repeater_accordion('carousel_block_carousel_items', 'carousel_item_title');

    acf.addAction('append', function ($el) {

      if ($el.context) {

        dynamic_title_repeater_accordion('accordian_item', 'accordian_button_text');
        dynamic_title_repeater_accordion('tab_component_sections', 'tab_component_tab_title');
        dynamic_title_repeater_accordion('layout_items', 'layout_item_title');
        dynamic_title_repeater_accordion('footer_menus', 'footer_top_menu_title');
        dynamic_title_repeater_accordion('carousel_block_carousel_items', 'carousel_item_title');

      }

    });

});

function dynamic_title_repeater_accordion(repeater_name, field_name) {
  // Changed data attr selector to contains instead of equals to include cloned accordions
  var information_tabs = jQuery("div[data-name*='" + repeater_name + "']");
  if (information_tabs.length) {
    var selector = "tr:not(.acf-clone) td.acf-fields .acf-accordion-content div[data-name='" + field_name + "'] input";

    // add listener
    jQuery(information_tabs).on('input', selector, function () {
      
      var me = jQuery(this);

      if ( me.val() ) {
        me.closest('td.acf-fields').find('.acf-accordion-title label').eq(0).text(me.val());
      }

      //var me = jQuery(this),
      //    placeholder = me.attr('placeholder');

      //if ( !me.val() && placeholder ) {
      //  me.closest('td.acf-fields').find('.acf-accordion-title label').eq(0).text(placeholder);
      //} else {
      //  me.closest('td.acf-fields').find('.acf-accordion-title label').eq(0).text(me.val());
      //}

    });

    // trigger the function on load
    information_tabs.find(selector).trigger('input');

  }
}
