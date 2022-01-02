<?php 

//DB conncetion
include_once('includes/config.php');
if ( isset($testtype)&& isset($fhd)){
    $cin=$_POST['cin'];
    $testtype=$_POST['testtype'];
    $fhd=$_POST['fhd'];
    $query=mysqli_query($con,"insert into tests(patient_cin,TestTimeSlot,RegistrationDate,typeTest) values('$cin','$fhd','$dat','$testtype');");
}
if(isset($_POST['search'])){
    $cnumber=intval($_POST['regcinnumber']);
    $sql=mysqli_query($con,"select * from patients where cin='$cnumber'");
    $row=mysqli_num_rows($sql);
}
include 'registred-user.phtml'

?>