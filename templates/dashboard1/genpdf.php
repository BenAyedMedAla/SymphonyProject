<?php
session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_SESSION["first_name"].$_SESSION["last_name"];
    $email = $_SESSION["email"];
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $telephone = $_SESSION["phone_number"];
    $profile = isset($_POST['profile']) ? $_POST['profile'] : '';
    $skills = isset($_POST['skills']) ? $_POST['skills'] : '';
    $french = isset($_POST['french_proficiency']) ? $_POST['french_proficiency'] : '';
    $english = isset($_POST['english_proficiency']) ? $_POST['english_proficiency'] : '';
    $arabic = isset($_POST['arabic_proficiency']) ? $_POST['arabic_proficiency'] : '';
    $photo_name=$_SESSION['cin_image'];
    // Handle photo upload
    

    // Validate form data (optional)

    require_once '../includes/fpdf/fpdf.php';

    // Create a class instance for PDF generation
    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $logoWidth = 60; // Define the width of the logo
            $logoHeight = 0; // Set to 0 to maintain aspect ratio
            $this->Image('C:\xampp\htdocs\tpweb\img\khedma.jpg', (210 - $logoWidth) / 2, 10, $logoWidth, $logoHeight); // Centered logo

            // Arial bold 15
            $this->SetFont('Arial', 'B', 15);
            // Title

            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

    // Create PDF object
    $pdf = new PDF();
    $pdf->AliasNbPages();

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('Arial', '', 12);

    // Add title
    $pdf->SetFont('Arial', 'B', 20); // Increase font size for title
    $pdf->Cell(0, 10, 'Curriculum Vitae', 0, 1, 'C');
    if (isset($photo_name)) {
        $pdf->Image('C:/xampp/htdocs/tpweb/lesCINSworkers/' . $photo_name, 150, 40, 40);
    }
    // Reset font color to default (black)
   
    $pdf->SetTextColor(0, 156, 255); // Set font color to #009CFF for name
    // Add name, email, age, telephone, profile, skills, languages
    $pdf->SetFont('Arial', 'B', 14); // Increase font size for section headings
$pdf->Cell(40, 15, "Name:", 0, 0, 'R'); // Label for Name
$pdf->SetTextColor(0);

$pdf->Cell(0, 15, $name, 0, 1); // Display name
$pdf->SetTextColor(0, 156, 255); // Set font color to #009CFF for name


$pdf->Cell(40, 15, "Email:", 0, 0, 'R'); // Label for Email
$pdf->SetTextColor(0); // Reset font color to black
$pdf->Cell(0, 15, $email, 0, 1); // Display email
$pdf->SetTextColor(0, 156, 255); // Set font color to #009CFF for name

$pdf->Cell(40, 15, "Age:", 0, 0, 'R'); // Label for Age
$pdf->SetTextColor(0); // Reset font color to black
$pdf->Cell(0, 15, $age, 0, 1); // Display age
$pdf->SetTextColor(0, 156, 255); // Set font color to #009CFF for name

    $pdf->Cell(40, 15, "Telephone:", 0, 0,'R');
    $pdf->SetTextColor(0); // Reset font color to black
    $pdf->Cell(0, 15, $telephone, 0, 1);
    $pdf->SetTextColor(0, 156, 255); // Set font color to #009CFF for name
    $pdf->Cell(40, 15, "French:", 0, 0,'R');
    $pdf->SetTextColor(0); // Reset font color to black
    $pdf->Cell(0, 15, $french, 0, 1);
    $pdf->SetTextColor(0, 156, 255); // Set font color to #009CFF for name
    $pdf->Cell(40, 15, "Arabic:", 0, 0,'R');
    $pdf->SetTextColor(0); // Reset font color to black
    $pdf->Cell(0, 15, $arabic, 0, 1);
    $pdf->SetTextColor(0, 156, 255); // Set font color to #009CFF for name
    $pdf->Cell(40, 15, "english:", 0, 0,'R');
    $pdf->SetTextColor(0); // Reset font color to black
    $pdf->Cell(0, 15, $english, 0, 1);
    $pdf->SetTextColor(0, 156, 255); // Set font color to #009CFF for name
    $pdf->Cell(40, 15, "Profile:", 0, 0,'R');
    $pdf->SetTextColor(0); // Reset font color to black
    $pdf->MultiCell(0, 15, $profile, 0, 1);
    $pdf->SetTextColor(0, 156, 255); // Set font color to #009CFF for name
    $pdf->Cell(40, 15, "Skills:", 0, 0,'R');
    $pdf->SetTextColor(0); // Reset font color to black
    $pdf->MultiCell(0, 15, $skills, 0, 1);



    // Add photo
   

    // Output PDF to browser
    $pdf->Output('CV.pdf', 'D'); // 'D' for download, you can change this as needed
} else {
    // Handle case where form is not submitted
    echo "Form not submitted!";
}
?>
