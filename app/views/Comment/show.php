<?php

$output = '';

if (!empty($comments)){
    foreach ($comments as $key => $comment){
        $output .= '
            <div class="row">
                <div class="col-12">
                    <div class="page-reviews-reviews d-flex">
                        <img src="upload/'.$comment["photo_profile"].'" alt="">
                        <div class="page-reviews-info flex-grow-1 d-flex flex-column ml-3">
                            <h5 class="programs-title">'.$comment["last_name"].' '.$comment["first_name"].'</h5>
                            <small class="text-secondary">'.$comment["created_at"].'</small>
                            <p>'.h($comment["text"]).'</p>
                        </div>
                    </div>
                </div>
            </div>';
    }
}
echo $output;
die();