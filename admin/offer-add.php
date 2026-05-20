<?php require('layout/header.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>


<div class="content">

	<div>
		<h3 style="padding-top:35px;">Add Offers</h3>
	</div>


    <div class="center" style="padding: 40px;margin:20px;">

        <form action="../backends/admin/offer-add.php" method="post" enctype="multipart/form-data" id="offer-add">

            <?php

            if (isset($_SESSION['msg'])) {
                echo '<div class="row" style="background-color: #155724;color:white;border-radius:10px;">
                <div class="col s12">
                    <h6>'.$_SESSION['msg'].'</h6>
                    </div>
                </div>';
                unset($_SESSION['msg']);
            }
            ?>

            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="title" name="title" type="text" class="validate" style="width: 70%">
                        <label for="title"><b>Offer Title :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="discount" name="discount" type="text" class="validate" style="width: 70%" onkeypress='return removechar(event)'>
                        <label for="discount"><b>Discount in % :</b></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">

                    <div class="input-field">
                        <input id="desc" name="desc" type="text" class="validate" style="width: 70%">
                        <label for="desc"><b>Description :</b></label>
                    </div>
                
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="s_date" name="s_date" type="date" class="validate" style="width: 70%" min="<?php echo date('Y-m-d'); ?>">
                        <label for="s_date"><b>Start Date :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id="e_date" name="e_date" type="date" class="validate" style="width: 70%" min="<?php echo date('Y-m-d'); ?>">
                        <label for="e_date"><b>End Date :</b></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="promo_code" name="promo_code" type="text" class="validate" style="width: 70%">
                        <label for="promo_code"><b>Promo_Code :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field" style="width: 90%">
						<select name='status' style="display:none">
                            <option value="Active" selected>Active</option>
                            <option value="Upcoming">Upcoming</option>
						</select>
						<label><b>Status :</b></label>
					</div>
                </div>
            </div>

            

            <div class="row">
                <div class="col s6">

                    <div class="input-field">
                        <input id="img" name="img" type="file" class="validate" style="border-radius:10px;">
                        <label for="img"><b>Insert Image:</b></label>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:20px;">
                <div class="col s12">

                <div class="input-field">
                    <input type="radio" name="data_status" value="Active" checked style="height:20px; width:20px; vertical-align: middle;"> Active
                    <input type="radio" name="data_status" value="Deactive" style="height:20px; width:20px; vertical-align: middle;margin-left:20px;"> Deactive
                </div>
                
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <div class="right" style="padding: 15px 10px;">
                        <a href="offer-list.php" class="waves-effect waves-light btn">Dismiss</a>
                    </div>
                    <div class="right" style="padding: 15px 20px;">
                        <button type="submit" class="waves-effect waves-light btn">Add New</button>
                    </div>
                </div>
            </div>

        </form>


    </div>

</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>