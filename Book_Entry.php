<?php
//prompt function
function prompt($prompt_msg){
    echo("<script type='text/javascript'>  alert('".$prompt_msg."'); </script>");
}


$host="localhost";
$user="root";
$password="";
$db="Library";



$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

if(isset($_POST['Book_Title'])){

    $Book_Title=$_POST['Book_Title'];
    $ISBN_Code=$_POST['ISBN_Code'];
    $Publication_year=$_POST['Publication_year'];
    $Language=$_POST['Language'];
    $Category_Name=$_POST['Category_Name'];
    $No_Of_Copies_Actual=$_POST['No_Of_Copies_Actual'];
    $No_Of_Copies_Current=$_POST['No_Of_Copies_Current'];
    $Shelf_ID=$_POST['Shelf_ID'];
    $Floor=$_POST['Floor'];



    $sql1="INSERT INTO book_details (ISBN_Code, Book_Title, Language, No_Copies_Actual, No_Copies_Current, Category_Name, Publication_year) 
           VALUES ($ISBN_Code, '$Book_Title', '$Language', $No_Of_Copies_Actual, $No_Of_Copies_Current, '$Category_Name', $Publication_year)";

    $sql2="INSERT INTO Shelf_Details values ('$Shelf_ID',$Floor,$ISBN_Code)";


    if(($con->query($sql1) == TRUE)&&($con->query($sql2) == TRUE)){
        $prompt_msg = "Successfully Saved";
        prompt($prompt_msg);


    }
    else{
        $prompt_msg = "Error in Saving";
        prompt($prompt_msg);

    }

}
?>



<!DOCTYPE html>
<html lang="en">
<title>New Book Entry</title>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="Homepage.css" rel="stylesheet">
<link href="Homepage2.css" rel="stylesheet">
<style>
    body, h1, h2, h3, h4, h5 {
        font-family: "Poppins", sans-serif
    }

    body {
        font-size: 16px;
    }

    .w3-half img {
        margin-bottom: -6px;
        margin-top: 16px;
        opacity: 0.8;
        cursor: pointer
    }

    .w3-half img:hover {
        opacity: 1
    }
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" id="mySidebar"
     style="z-index:3;width:300px;font-weight:bold;"><br>

    <div class="w3-container">
        <img src="Indian_Institute_of_Information_Technology,_Kota_Logo.png"
             style="float: left; width: 100px;height: 60px;margin-right: 10px;">
        <h3 class="w3-padding-64"><b>Indian Institute of Information Technology Kota</b></h3>
    </div>
    <div class="w3-bar-block">
        <a class="w3-bar-item w3-button w3-hover-white" href="AdminLogin.html" onclick="w3_close()">Administrator Home</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Student_Reg.php" onclick="w3_close()">New Student Registration</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Book_Entry.php" onclick="w3_close()">New Book Entry</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Student_Record.php" onclick="w3_close()">Student Record</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Book_Record.php" onclick="w3_close()">Book Record</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Book_Issue.php" onclick="w3_close()">Book Issue</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Book_Deposit.php" onclick="w3_close()">Book Deposit</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Homepage.html" onclick="w3_close()">Log Out</a>


    </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
    <a class="w3-button w3-red w3-margin-right" href="javascript:void(0)" onclick="w3_open()">☰</a>
    <span>Indian Institute of Information Technology Kota</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" id="myOverlay" onclick="w3_close()" style="cursor:pointer"
     title="close side menu"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" id="Starting" style="margin-top:80px">
        <h1 class="w3-jumbo"><b>New Book Entry</b></h1>
    </div>

    <div class="w3-container" id="Forum" style="margin-top:75px">


        <form action="Book_Entry.php" method="post">
            <div class="w3-section">
                <label>Book Title</label>
                <input class="w3-input w3-border" type="text" name="Book_Title" required>
            </div>
            <div class="w3-section">
                <label>ISBN Code</label>
                <input class="w3-input w3-border" type="text" name="ISBN_Code" required>
            </div>
            <div class="w3-section">
                <label>Publication Year</label>
                <input class="w3-input w3-border" type="text" name="Publication_year" required>
            </div>
            <div class="w3-section">
                <label>Language</label>
                <input class="w3-input w3-border" type="text" name="Language" required>
            </div>
            <div class="w3-section">
                <label>Category Name</label>
                <input class="w3-input w3-border" type="text" name="Category_Name" required>
            </div>
            <div class="w3-section">
                <label>No Of Copies Actual</label>
                <input class="w3-input w3-border" type="text" name="No_Of_Copies_Actual" required>
            </div>
            <div class="w3-section">
                <label>No Of Copies Current</label>
                <input class="w3-input w3-border" type="text" name="No_Of_Copies_Current" required>
            </div>

            <div class="w3-section">
                <label>Shelf ID</label>
                <input class="w3-input w3-border" type="text" name="Shelf_ID" required>
            </div>
            <div class="w3-section">
                <label>Floor</label>
                <input class="w3-input w3-border" type="text" name="Floor" required>
            </div>

            <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Submit</button>
        </form>
    </div>






</div>


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">
    Powered by <a class="w3-hover-opacity" href="https://www.w3schools.com/w3css/default.asp" target="_blank"
                  title="W3.CSS">w3.css</a></p></div>

<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }
</script>

</body>
</html>
