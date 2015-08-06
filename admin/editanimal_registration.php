<!DOCTYPE html>
<?php 
error_reporting (E_ALL ^ E_NOTICE);
$page_id="dogof_theweek";
include_once 'libs/class.database.php';
include_once 'libs/class.session.php';
include_once 'libs/functions.php';
session_start();
//$session= new Session();
//if(!$session->has_logged_in())
//{
//	redirect_to("index.php");
//}

//if(!$session->check_permission_level($page_id))
//{
//    echo "<script>alert(\"You have not permission to access this page.\");</script>";
//     redirect_to("home.php");
//}
//print_r($_REQUEST);
$animal_id=$_REQUEST['animal_id'];
$error=$_REQUEST['error'];

$formd_animal_name="";
$formd_gender="";
$formd_age="";
$formd_dob="";
$formd_species="";
$formd_weight="";
$formd_colour="";
$formd_behaviour="";
$formd_breed="";
$formd_location="";
$formd_image="";
$formd_relationship="";
$formd_donor_no="";
$formd_breed="";
$formd_location="";
$formd_image="";

if(isset($_SESSION["newsEdit_formData"])){
        //print_r($_SESSION["newsEdit_formData"]);

        $formd_animal_name=$_SESSION["animalEdit_formData"]["animal_name"];
        $formd_gender=$_SESSION["animalEdit_formData"]["gender"];
        $formd_age=$_SESSION["animalEdit_formData"]["age"];
        $formd_dob=$_SESSION["animalEdit_formData"]["dob"];
        $formd_species=$_SESSION["animalEdit_formData"]["species"];
        $formd_weight=$_SESSION["animalEdit_formData"]["weight"];
        $formd_colour=$_SESSION["animalEdit_formData"]["colour"];
        $formd_behaviour=$_SESSION["animalEdit_formData"]["behaviour"];
        $formd_breed=$_SESSION["animalEdit_formData"]["breed"];
        $formd_location=$_SESSION["animalEdit_formData"]["location"];
        $formd_image=$_SESSION["animalEdit_formData"]["image"];
        $formd_relationship=$_SESSION["animalEdit_formData"]["relationship"];
        $formd_donor_no=$_SESSION["animalEdit_formData"]["donor_no"];
        unset($_SESSION["animalEdit_formData"]);
    }
    unset($_SESSION["newsEdit_formData"]);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Voice for Animals</title>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="pace-done skin-black fixed">
        <!-- header logo: style can be found in header.less -->
		<?php include_once './includes/header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
  		<?php include_once './includes/nav.php'; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!--  Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ANIMAL REGISTRATION
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>
                        <li class="active">ANIMAL REGISTRATION</li>
                        <li class="active">REGISTER</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				<!-- form start -->
				
				
				
				
				<?php 
            global $database, $db;
            $qry="SELECT * from `".TBL_ANIMAL."`
			         WHERE `animal_id`='".$_REQUEST['id']."' ";
            
            $result = $database->query( $qry );
            $row = $database->fetch_array( $result );
           
            ?>
           
								
								
						
                                <form role="form" action="animal_actions.php" method="post" autocomplete="off" enctype="multipart/form-data">
								<input type="hidden" name="mode" value="post_new" />
									 <div class="col-lg-12"> 				 
				     				 <div>
										<h4 class="text-green">ANIMAL INFORMATION</h4>
									</div>
									</div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="animal_name">NAME OF THE ANIMAL</label>
                                            <input type="text" class="form-control" id="animal_name" name="animal_name" value="<?php echo $row['animal_name']; ?>">
                                        </div>
				     				 	<div class="form-group">
				     				 		<label for="gender">GENDER</label>
                                            <div class="radio">
                                                    <input <?php if($row['gender']=='male') { echo 'checked="true"';} ?> type = 'radio' name ='gender' value= 'male' id="gender"/> &nbsp;MALE
                                             		<input <?php if($row['gender']=='female') { echo 'checked="true"';} ?> type = 'radio' name ='gender' value= 'female' id="gender"/> &nbsp;FEMALE
                                            </div>
                                         </div>
                                      </div>
				     				 <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>DOB</label>
                                        	<div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['dob']; ?>" name="dob" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="age">AGE</label>
                                            <input type="text" class="form-control" id="age" value="<?php echo $row['age']; ?>" name="age">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                     	<div class="form-group">
                                            <label>SPECIES</label>
                                            <select class="form-control" name="species">
                                            	<option value="" disabled selected>Select Species</option>
                                                <option <?php if($row['species']=='dog') { echo 'selected="true"';} ?> value="dog">DOG</option>
                                                <option <?php if($row['species']=='cat') { echo 'selected="true"';} ?> value="cat">CAT</option>
                                            </select>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="weight">WEIGHT</label>
                                            <input type="text" class="form-control" id="weight" value="<?php echo $row['weight']; ?>" name="weight">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="colour">COLOUR</label>
                                            <input type="text" class="form-control" id="colour" value="<?php echo $row['colour']; ?>" name="colour">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="behaviour">ANIMAL BEHAVIOUR</label>
                                            <input type="text" class="form-control" id="behaviour" value="<?php echo $row['behaviour']; ?>" name="behaviour">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="breed">BREED</label>
                                            <input type="text" class="form-control" id="breed" value="<?php echo $row['breed']; ?>" name="breed">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="location">LIVING LOCATION</label>
                                            <input type="text" class="form-control" id="location" value="<?php echo $row['location']; ?>" name="location">
                                        </div>
                                     </div>
				     				 <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">IMAGE</label>
                                            <input type="file" id="image" name="image" value="<?php echo $row['image']; ?>" accept="image/*" onchange="showimagepreview1(this)">
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-3">
                                             <img id="imgprvw1" alt="uploaded image preview" src="images/animal/<?php echo $row['image']; ?>" />
                                        </div>
                                        </div>
				     				 </div> 
				     				 
				     				 <div class="col-lg-12"> 				 
				     				 <div>
										<h4 class="text-green">CARE TAKER INFORMATION</h4>
									</div>
									</div>
									<div class="col-lg-6"> 
										<div class="form-group">
				     				 		<label for="relationship">RELATIONSHIP TYPE</label>
                                            <div class="radio">
                                                <label>
                                                    <input <?php if($row['relationship']=='donor') { echo 'checked="true"';} ?> type = 'radio' name ='relationship' value= 'donor' id="relationship"/> &nbsp;DONOR
                                             		<input <?php if($row['relationship']=='volunteer') { echo 'checked="true"';} ?> type = 'radio' name ='relationship' value= 'volunteer' id="relationship"/> &nbsp;VOLUNTEER
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                	<input <?php if($row['relationship']=='owner') { echo 'checked="true"';} ?> type = 'radio' name ='relationship' value= 'owner' id="relationship"/> &nbsp;OWNER
                                             		<input <?php if($row['relationship']=='care taker') { echo 'checked="true"';} ?> type = 'radio' name ='relationship' value= 'care taker' id="relationship"/> &nbsp;CARE TAKER
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                     <input <?php if($row['relationship']=='animal lover') { echo 'checked="true"';} ?> type = 'radio' name ='relationship' value= 'animal lover' id="relationship"/> &nbsp;ANIMAL LOVER
                                                </label>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="donor_no">IF DONOR</label>
                                            <input type="text" class="form-control" id="donor_no" value="<?php echo $row['donor_id']; ?>" name="donor_no" placeholder="ENTER YOUR DONOR NUMBER">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="volunteer_no">IF VOLUNTEER</label>
                                            <input type="text" class="form-control" id="volunteer_no" value="<?php echo $row['volunteer_id']; ?>" name="volunteer_no" placeholder="ENTER YOUR VOLUNTEER NUMBER">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="caretaker_name">CARE TAKER NAME</label>
                                            <input type="text" class="form-control" id="caretaker_name" value="<?php echo $row['caretaker_name']; ?>" name="caretaker_name">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="caretaker_mob">MOBILE NUMBER</label>
                                            <input type="text" class="form-control" id="caretaker_mob" value="<?php echo $row['caretaker_mob']; ?>" name="caretaker_mob">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="caretaker_email">EMAIL</label>
                                            <input type="text" class="form-control" id="caretaker_email" value="<?php echo $row['caretaker_email']; ?>" name="caretaker_email">
                                        </div>
                                        <div class="form-group">
                                            <label>ADDRESS</label>
                                            <textarea class="form-control" rows="4" id="caretaker_address" name="caretaker_address"><?php echo $row['caretaker_address']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="feeder_name">FEEDER NAME</label>
                                            <input type="text" class="form-control" id="feeder_name" value="<?php echo $row['feeder_name']; ?>" name="feeder_name">
                                        </div>
                                    </div>
				     				
				     				
				     				<div class="col-lg-12"> 				 
				     				 <div>
										<h4 class="text-green">ANIMAL MEDICAL INFORMATION</h4>
									</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
				     				 		<label for="desex">DESEX</label>
                                            <div class="radio">
                                                    <input <?php if($row['desex']=='yes') { echo 'checked="true"';} ?> type = 'radio' name ='desex' value= 'yes' id="desex"/> &nbsp;YES
                                             		<input <?php if($row['desex']=='no') { echo 'checked="true"';} ?> type = 'radio' name ='desex' value= 'no' id="desex"/> &nbsp;NO
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="desex_date">DESEX DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['desex_date']; ?>" name="desex_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
										<div class="form-group">
				     				 		<label for="microchip">MICROCHIP</label>
                                            <div class="radio">
                                            		<input <?php if($row['microchip']=='yes') { echo 'checked="true"';} ?> type = 'radio' name ='microchip' value= 'yes' id="microchip"/> &nbsp;YES
                                             		<input <?php if($row['microchip']=='no') { echo 'checked="true"';} ?> type = 'radio' name ='microchip' value= 'no' id="microchip"/> &nbsp;NO
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="microchip_date">MICROCHIP DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['microchip_date']; ?>" name="microchip_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="microchip_no">MICROCHIP NUMBER</label>
                                            <input type="text" class="form-control" value="<?php echo $row['microchip_no']; ?>" id="microchip_no" name="microchip_no">
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
										<div class="form-group">
				     				 		<label for="arv">ARV</label>
                                            <div class="radio">
                                            		<input <?php if($row['arv']=='yes') { echo 'checked="true"';} ?> type = 'radio' name ='arv' value= 'yes' id="arv"/> &nbsp;YES
                                             		<input <?php if($row['arv']=='no') { echo 'checked="true"';} ?> type = 'radio' name ='arv' value= 'no' id="arv"/> &nbsp;NO
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="arv_date">ARV DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['arv_date']; ?>" name="arv_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="arv_due">ARV NEXT DUE DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['arv_due']; ?>" name="arv_due" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
										<div class="form-group">
				     				 		<label for="dhpp">DHPPi+L</label>
                                            <div class="radio">
                                                    <input <?php if($row['dhpp']=='yes') { echo 'checked="true"';} ?> type = 'radio' name ='dhpp' value= 'yes' id="dhpp"/> &nbsp;YES
                                             		<input <?php if($row['dhpp']=='no') { echo 'checked="true"';} ?> type = 'radio' name ='dhpp' value= 'no' id="dhpp"/> &nbsp;NO
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="dhpp_date">DHPPi+L DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['dhpp_date']; ?>" name="dhpp_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dhpp_due">DHPPi+L NEXT DUE DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['dhpp_due']; ?>" name="dhpp_due" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
										<div class="form-group">
				     				 		<label for="fvrcp">FVRCP</label>
                                            <div class="radio">
                                                    <input <?php if($row['fvrcp']=='yes') { echo 'checked="true"';} ?> type = 'radio' name ='fvrcp' value= 'yes' id="fvrcp"/> &nbsp;YES
                                             		<input <?php if($row['fvrcp']=='no') { echo 'checked="true"';} ?> type = 'radio' name ='fvrcp' value= 'no' id="fvrcp"/> &nbsp;NO
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="fvrcp_date">FVRCP DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['fvrcp_date']; ?>" name="fvrcp_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="place">FVRCP NEXT DUE DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['fvrcp_due']; ?>" name="fvrcp_due" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
										<div class="form-group">
				     				 		<label for="deworming">DEWORMING</label>
                                            <div class="radio">
                                                    <input <?php if($row['deworming']=='yes') { echo 'checked="true"';} ?> type = 'radio' name ='deworming' value= 'yes' id="deworming"/> &nbsp;YES
                                             		<input <?php if($row['deworming']=='no') { echo 'checked="true"';} ?> type = 'radio' name ='deworming' value= 'no' id="deworming"/> &nbsp;NO
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="deworming_date">DEWORMING DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['deworming_date']; ?>" name="deworming_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deworming_due">DEWORMING NEXT DUE DATE</label>
                                            <div class="input-group">
                                            		<div class="input-group-addon">
                                            		    <i class="fa fa-calendar"></i>
                                            		</div>
                                            		<input type="date" class="form-control" value="<?php echo $row['deworming_due']; ?>" name="deworming_due" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        	</div>
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>MEDICAL HISTROY</label>
                                            <textarea class="form-control" rows="4" id="medical_histroy" name="medical_histroy"><?php echo $row['medical_histroy']; ?></textarea>
                                        </div>
				     				</div>
				     				
				     				
				     				
				     				<div class="col-lg-12"> 				 
				     				 <div>
										<h4 class="text-green">VETERINARIAN INFORMATION</h4>
									</div>
									</div>
									<div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="vet_name">VET NAME</label>
                                            <input type="text" class="form-control" value="<?php echo $row['vet_name']; ?>" id="vet_name" name="vet_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="vet_mobile">VET MOBILE NUMBER</label>
                                            <input type="text" class="form-control" value="<?php echo $row['vet_mob']; ?>" id="vet_mob" name="vet_mob">
                                        </div>
                                     </div>
									
				     				 
				     				 
				     				 
				     				 <div class="col-lg-12">
                                    	    <div class="box-footer">
                                            <button type="submit" name="action" class="btn btn-primary pull-right">Submit</button>
					    			 		</div>
                                     </div>
				     </div>
                                </form>
                </section>
	</aside>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
        <script>
               function showimagepreview1(input) {
               if (input.files && input.files[0]) {
               var filerdr = new FileReader();
               filerdr.onload = function(e) {
               $('#imgprvw1').attr('src', e.target.result);
               }
               filerdr.readAsDataURL(input.files[0]);
               }
               }
           </script>
</body>
</html>
