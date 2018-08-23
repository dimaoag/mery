<?php

$output = '';

if (!empty($reviews)){
     foreach ($reviews as $review){
         $output .= '
            <div class="row">
                <div class="col-12">
                    <div class="page-reviews-reviews d-flex">
                        <img src="upload/'.$review["photo_profile"].'" alt="">
                        <div class="page-reviews-info flex-grow-1 d-flex flex-column ml-3">
                            <h5 class="programs-title">'.$review["last_name"].' '.$review["first_name"].'</h5>
                            <small class="text-secondary">'.$review["created_at"].'</small>
                            <p>'.h($review["text"]).'</p>
                        </div>
                    </div>
                </div>
            </div>';
     }
}
echo $output;
die();