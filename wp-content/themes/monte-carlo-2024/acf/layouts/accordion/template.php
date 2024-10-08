<div <?php if (!empty($is_preview)) { echo 'id="accordionComponent"'; } ?> class="pb__block pb__block-accordion-component <?php if (!empty($is_preview)) { echo 'is-preview'; } ?>">

  <?php
    $accordionLayout = get_sub_field( 'page_builder_accordion_options' );
    $sectionTitle =  get_sub_field( 'page_builder_accordion_section_title' );
    $sectionDesc = get_sub_field( 'page_builder_accordion_section_description' );
  ?>

  <div class="contain">
    <div class="row center-md">
      <div class="col-xs-12 col-md-10">

        <div class="pb__accordion<?php if ($accordionLayout == 'side') { echo ' side-by-side'; } ?>">

          <div class="pba-copy">
            <?php
              if ($accordionLayout == 'stacked') {
                echo '<h3 class="title">' . $sectionTitle . '</h3>';
              } else {
                echo '<h4 class="title">' . $sectionTitle . '</h4>';
              }
            ?>
            <div>
              <?php
                if ($sectionDesc) {
                  echo $sectionDesc;
                } else {
                  echo '<div class="spacer"></div>';
                }
              ?>
            </div>
          </div>

          <div class="pba-accordion">

            <?php include( locate_template( 'template-parts/components/accordion.php', false, false ) ); ?>
            
          </div>

        </div>

      </div>
    </div>
  </div>

</div>
