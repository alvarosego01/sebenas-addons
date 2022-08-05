

<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


    function sbn_popup_1_setup($parameters, $page_Id){


        if( isset($parameters) && $parameters != null){

            echo 'Modelo 1';
            ?>
 <a href="#<?php echo $parameters['popup_call_class'] ?>" data-effect="mfp-zoom-out" class="sbn_open_popup">Show inline popup</a>


  <div id="<?php echo $parameters['popup_call_class'] ?>" class=" mfp-hide mfp-with-anim sbn_popup sbn_popup_model_1 sbn_popup_custom">
  Popup content

        <div class="sbn_popupContainer">

            <div class="row">

                <div class="col-md-12 col-lg-6 image">

                    <div class="containerImage">
                        <img alt="Landing Escala Landings" src="" loading="lazy">
                    </div>

                </div>

                <div class="col-md-12 col-lg-6 info">

                    <h3 class="sbn_secondaryTitle">

                    </h3>

                    <p class="sbn_primaryText">

                    </p>



                </div>

            </div>

        </div>

</div>




            <?php


        }

    }

?>