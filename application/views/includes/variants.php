<?php

//open the dir of thumbs
$path = '/img/Variant/' . $extra_info['class'] . '/';

foreach (glob($_SERVER['DOCUMENT_ROOT'] . $path . '*THUMB.jpg') as $thumbnail) {
	if ($thumbnail != '.') {
		$thumbs[] = basename($thumbnail);
	}

}
for ($i = 0; $i < count($thumbs); $i++) {
	if (!$this->class_data[$extra_info['class']][$i]['description']) {
		continue;
	}

	echo '<div class="varient-row">
                            <div class="col-md-4 p-l-0">
                            <a class="image-popup-vertical-fit" href="' . $path . $thumbs[$i] . '" title="A200 BE.">
                              <img class="img-responsive" src="' . $path . $thumbs[$i] . '">
                            </a>
                              <a href="/"></a>
                                <img class="img-responsive" src="//" alt="" />
                              </a>
                            </div><!-- //.col-md-4 -->
                            <div class="col-md-8">
                              <h5>' . $this->class_data[$extra_info['class']][$i]['model'] . '</h5>
                              ' . $this->class_data[$extra_info['class']][$i]['description'] . '
                            </div><!-- //.col-md-8 -->
                            <div class="clearfix"></div><!-- //.clearfix -->
                          </div><!-- //.varient-row -->';
}

?>