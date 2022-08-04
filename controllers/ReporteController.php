
<?php

require('../assets/libreria/fpdf.php');


class PDF extends FPDF
{

    // Cabecera de página
    function Header()
    {
       
        // Logo
        //$this->Image('logo.png',10,8,33);
        $this->Image('../assets/iconos/logo.png', 60, 11, -250, -250);
        $this->Image('../assets/iconos/jornadaCompleta.jpeg', 220, 10, -300);
        // Arial bold 15
        $this->SetFont('Arial', '', 14);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(160, 10, '"GRAL JUAN JOSE SALAS BERNALES"', 0, 1, 'C');
        if ($_POST['selectBuscarAnio'] == "Seleccionar año") {
            $this->Cell(280, 10, 'Reporte  de Bienes Patrimoniales Institucional', 0, 1, 'C');
            $this->Cell(280, 10, 'CIST', 0, 0, 'C');
        } else {
            $this->Cell(280, 5, 'Reporte  de Bienes Patrimoniales Institucional', 0, 1, 'C');
            $this->Cell(280, 10, 'CIST - ' . $_POST['selectBuscarAnio'], 0, 1, 'C');
        }

        // Salto de línea
        $this->Ln(10);
        $this->SetDrawColor(11,30,95);
        $this->SetTextColor(11,30,95);
        $this->Cell(8, 10, 'N.', 1, 0, 'C', 0);
        $this->Cell(18, 10,'Codigo', 1, 0, 'C', 0);
        $this->Cell(28, 10,'Categoria', 1, 0, 'C', 0);
        $this->Cell(28, 10,'Descripcion', 1, 0, 'C', 0);
        $this->Cell(28, 10, 'Marca', 1, 0, 'C', 0);
        $this->Cell(28, 10,'Modelo', 1, 0, 'C', 0);
        $this->Cell(28, 10, 'Serie', 1, 0, 'C', 0);
        $this->Cell(28, 10,'Color', 1, 0, 'C', 0);
        $this->Cell(25, 10, 'Estado', 1, 0, 'C', 0);
        $this->Cell(28, 10,'Condicion', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Observacion', 1, 1, 'C', 0);
    }  // Pie de página


    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Aria,,l italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$mysqli = new mysqli("localhost:3308", "root", "", "proyectoinventario");
$sql = "select * from articulo";
$resultado = $mysqli->query($sql);


// Creación del objeto de la clase heredada
$pdf = new PDF('L', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

$num = 1;
$pdf->Ln(1);
while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(8, 10, $num, 1, 0, 'C', 0);
    $pdf->Cell(18, 10, $row['codigo'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['categoria'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['descripcion'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['marca'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['modelo'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['serie'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['color'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['estado'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['condicion'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['observacion'], 1, 1, 'C', 0);
    $num++;
}
$pdf->Output();
?>