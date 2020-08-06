<h2>Select default procedure from the list</></h2>

<form id="default_options_form_data" method="post">
		
		<ul id="default_options_checkbox_list">
			<li class="parent_procedure"><strong> Face Procedures </strong>
				<ul style="margin:5px 0 0 15px">
                    <?php $blepharoplasty = term_exists( 'blepharoplasty', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($blepharoplasty)){?>
                            <li><input type="checkbox" name="face-procedures[]" value="Blepharoplasty"> Blepharoplasty</li>
                    <?php } ?>

                    <?php $facelift = term_exists( 'facelift', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($facelift)){?>
					        <li><input type="checkbox" name="face-procedures[]" value="Facelift"> Facelift</li>
                    <?php } ?>

                    <?php $neck_lift = term_exists( 'neck-lift', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($neck_lift)){?>
					        <li><input type="checkbox" name="face-procedures[]" value="Neck Lift"> Neck Lift</li>
                    <?php } ?>

                    <?php $rhinoplasty = term_exists( 'rhinoplasty', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($rhinoplasty)){?>
					        <li><input type="checkbox" name="face-procedures[]" value="Rhinoplasty"> Rhinoplasty</li>   
                    <?php } ?>

                    <?php $otoplasty = term_exists( 'otoplasty', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($otoplasty)){?>
					        <li><input type="checkbox" name="face-procedures[]" value="Otoplasty"> Otoplasty</li>
                    <?php } ?>

                    <?php $upper_eyelid_blepharoplasty = term_exists( 'upper-eyelid-blepharoplasty', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($upper_eyelid_blepharoplasty)){?>
					        <li><input type="checkbox" name="face-procedures[]" value="Upper Eyelid Blepharoplasty"> Upper Eyelid Blepharoplasty</li>
                    <?php } ?>
				</ul>
			</li>
			<li class="parent_procedure"><strong> Breast Procedures</strong>
				<ul style="margin:5px 0 0 15px">
                    <?php $breast_asymmetry_correction = term_exists( 'breast-asymmetry-correction', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($breast_asymmetry_correction)){?>
					        <li><input type="checkbox" name="breast-procedures[]" value="Breast Asymmetry Correction"> Breast Asymmetry Correction</li>
                    <?php } ?>

                    <?php $breast_augmentation = term_exists( 'breast-augmentation', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($breast_augmentation)){?>
					        <li><input type="checkbox" name="breast-procedures[]" value="Breast Augmentation"> Breast Augmentation</li>       
                    <?php } ?>

                    <?php $breast_augmentation_with_lift = term_exists( 'breast-augmentation-with-lift', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($breast_augmentation_with_lift)){?>
					        <li><input type="checkbox" name="breast-procedures[]" value="Breast Augmentation with Lift"> Breast Augmentation with Lift</li>
                    <?php } ?>

                    <?php $breast_lift = term_exists( 'breast-lift', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($breast_lift)){?>
					        <li><input type="checkbox" name="breast-procedures[]" value="Breast Lift"> Breast Lift</li>  
                    <?php } ?>

                    <?php $breast_reduction = term_exists( 'breast-reduction', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($breast_reduction)){?>
					        <li><input type="checkbox" name="breast-procedures[]" value="Breast Reduction"> Breast Reduction</li>
					        
                    <?php } ?>
				</ul>
			</li>
			<li class="parent_procedure"><strong> Body Procedures </strong>
				<ul style="margin:5px 0 0 15px">
					<?php $body_lift = term_exists( 'body-lift', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($body_lift)){?>
							<li><input type="checkbox" name="body-procedures[]" value="Body Lift"> Body Lift</li>
                    <?php } ?>

					<?php $buttock_augmentation = term_exists( 'buttockaaugmentation', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($buttock_augmentation)){?>
							<li><input type="checkbox" name="body-procedures[]" value="Buttock Augmentation"> Buttock Augmentation</li>
                    <?php } ?>
					
					<?php $liposuction = term_exists( 'liposuction', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($liposuction)){?>
							<li><input type="checkbox" name="body-procedures[]" value="Liposuction"> Liposuction</li>
                    <?php } ?>

					<?php $mommy_makeover = term_exists( 'mommy_makeover', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($mommy_makeover)){?>
							<li><input type="checkbox" name="body-procedures[]" value="Mommy Makeover"> Mommy Makeover</li>
                    <?php } ?>
					
					<?php $smartLipo = term_exists( 'smartLipo', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($smartLipo)){?>
							<li><input type="checkbox" name="body-procedures[]" value="SmartLipo"> SmartLipo</li>
                    <?php } ?>

					<?php $tummy_tuck = term_exists( 'tummy_tuck', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($tummy_tuck)){?>
							<li><input type="checkbox" name="body-procedures[]" value="Tummy Tuck"> Tummy Tuck</li>
                    <?php } ?>
				</ul>
			</li>
			<li class="parent_procedure"><strong> Medical Spa Procedures </strong>
				<ul style="margin:5px 0 0 15px">
					<?php $dermabrasion = term_exists( 'dermabrasion', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($dermabrasion)){?>
							<li><input type="checkbox" name="medical-spa-procedures[]" value="Dermabrasion"> Dermabrasion</li>
                    <?php } ?>
				</ul>
			</li>
			<li class="parent_procedure"><strong> Laser Treatments </strong>
				<ul style="margin:5px 0 0 15px">
					<?php $phototherapy = term_exists( 'phototherapy', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($phototherapy)){?>
							<li><input type="checkbox" name="laser-treatments[]" value="Phototherapy"> Phototherapy</li>
                    <?php } ?>
					
					<?php $vascular_and_redness_treatment = term_exists( 'vascular-and-redness-treatment', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($vascular_and_redness_treatment)){?>
							<li><input type="checkbox" name="laser-treatments[]" value="Vascular and Redness Treatment"> Vascular and Redness Treatment</li>
                    <?php } ?>
					
					<?php $skin_resurfacing = term_exists( 'skin-resurfacing', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($skin_resurfacing)){?>
							<li><input type="checkbox" name="laser-treatments[]" value="Skin Resurfacing"> Skin Resurfacing</li>
                    <?php } ?>
					
					<?php $fractional_resurfacing = term_exists( 'fractional-resurfacing', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($fractional_resurfacing)){?>
							<li><input type="checkbox" name="laser-treatments[]" value="Fractional Resurfacing"> Fractional Resurfacing</li>
                    <?php } ?>

					<?php $laser_peel = term_exists( 'laser-peel', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($laser_peel)){?>
							<li><input type="checkbox" name="laser-treatments[]" value="Laser Peel"> Laser Peel</li>
                    <?php } ?>

					<?php $skin_firming = term_exists( 'skin-firming', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($skin_firming)){?>
							<li><input type="checkbox" name="laser-treatments[]" value="Skin Firming"> Skin Firming</li>
                    <?php } ?>
				</ul>
			</li>
			<li class="parent_procedure"><strong> Male Procedures</strong>
				<ul style="margin:5px 0 0 15px">
					<?php $male_breast_reduction = term_exists( 'male-breast-reduction', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($male_breast_reduction)){?>
							<li><input type="checkbox" name="male-procedures[]" value="Male Breast Reduction"> Male Breast Reduction</li>
                    <?php } ?>
					
					<?php $male_blepharoplasty = term_exists( 'male-blepharoplasty', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($male_blepharoplasty)){?>
							<li><input type="checkbox" name="male-procedures[]" value="Male Blepharoplasty"> Male Blepharoplasty</li>
                    <?php } ?>
					
					<?php $male_liposuction = term_exists( 'male-liposuction', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($male_liposuction)){?>
							<li><input type="checkbox" name="male-procedures[]" value="Male Liposuction"> Male Liposuction</li>
                    <?php } ?>
					
					<?php $male_neck_lift = term_exists( 'male-neck-lift', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($male_neck_lift)){?>
							<li><input type="checkbox" name="male-procedures[]" value="Male Neck Lift"> Male Neck Lift</li>
                    <?php } ?>

					<?php $male_otoplasty = term_exists( 'male-otoplasty', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($male_otoplasty)){?>
							<li><input type="checkbox" name="male-procedures[]" value="Male Otoplasty"> Male Otoplasty</li>
                    <?php } ?>

					<?php $male_rhinoplasty = term_exists( 'male-rhinoplasty', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($male_rhinoplasty)){?>
							<li><input type="checkbox" name="male-procedures[]" value="Male Rhinoplasty"> Male Rhinoplasty</li>
                    <?php } ?>

					<?php $male_thigh_lift = term_exists( 'male-thigh-lift', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($male_thigh_lift)){?>
							<li><input type="checkbox" name="male-procedures[]" value="Male Thigh Lift"> Male Thigh Lift</li>
                    <?php } ?>
										
					<?php $injectables_for_men = term_exists( 'injectables-for-men', 'procedures' ); // array is returned if taxonomy is given 
                        if(!isset($injectables_for_men)){?>
							<li><input type="checkbox" name="male-procedures[]" value="Injectables for Men"> Injectables for Men</li>
                    <?php } ?>			
				</ul>
			</li>
		</ul>

		<input type="submit" name="form_submit" class="button-primary add-procedures" value="Submit" >
		</form>
<?php
	if($_POST){
        require_once('add_default_procedures.php');
    }else{
        echo "Please select the procedures";
    }
?>