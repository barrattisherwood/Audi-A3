'
	<form action="?" method="post">






                              <div class="form-group">
                                <a class="black-button" href="<?php echo McCarthy::TestDriveUrl($brand, $mid)?>">Book Test-Drive</a>
                              </div>


                              <strong>WOULD YOU LIKE A SALES PERSON TO CONTACT YOU?</strong>

<div class="clearfix"></div><!-- //.clearfix -->
                              <label for="">Name:</label><br />
                              <input type="text" required name="name" />
                              <div class="clearfix"></div><!-- //.clearfix -->
                              <label for="">Tel/Cell:</label><br />
                              <input type="text" required name="cellno" />
                              <div class="clearfix"></div><!-- //.clearfix -->
                              <label for="">Email:</label><br />
                              <input type="email" required name="email" />
                              <div class="clearfix"></div><!-- //.clearfix -->
                              <label for="">Dealership:</label><br />
                              <?php echo $this->McCarthy->dealershipsDropDown()?>
                              <div class="clearfix"></div><!-- //.clearfix -->
                              <div class="form-group">
                                <input type="submit" class="submit" value="submit" />
<input type="hidden" name="vehicle" value="<?php echo $sseriesname . ' ' . $smodelname?>" />
                              </div>

                          </form>'