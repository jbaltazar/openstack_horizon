        <div id="" class="login ">
          <div class="">
            <div class="">
              
              <div class="modal-header" style="text-align:center;">
                <h3><?php echo $page_title;?></h3>
              </div>

              <form id="myform" name="myform" autocomplete="on" action="" method="POST">

                <div class="modal-body clearfix">
                <?php if( $isSave == false ){ ?>
                <fieldset>

                <div class="form-group ">
                    <label class="control-label" for="username">User Name</label>
                    <div class="controls">
                      <input autofocus="autofocus" class="form-control" id="username" name="username" type="text" />
                    </div>
                </div>

                <div class="form-group ">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                      <input class="form-control" id="email" name="email" type="text" />
                    </div>
                </div>

                <div class="form-group ">
                  <label class="control-label" for="password">Password</label>
                  <div class="controls">
                    <input class="form-control" id="password" name="password" type="password" />
                  </div>
                </div>

                </fieldset>
                <?php }else{ ?>
                <div id="lbl_success">Your Account Registration is succesfully created.</div>
                <?php } ?>
                </div>

                <div class="modal-footer">
                <?php if( $isSave == false ){ ?>
                <a href="<?php echo _OPENSTACK_URL_;?>" class="btn btn-primary pull-left" style="background-color:#666">Back</a>
                <button type="submit" class="btn btn-primary pull-right" id="btn_login">Register</button>
                <?php }else{ ?>
                <center>
                  <a href="<?php echo _OPENSTACK_URL_;?>" class="btn btn-primary" style="background-color:#666">Back</a>
                </center>
                <?php } ?>
                </div>
              </form>

            </div>
          </div>
        </div>