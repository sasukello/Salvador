<?php 
require "../intranet/noticias/conexion.php";
$connexion = new mysqli($server,$serveruser,$password,$name);
$connexion->set_charset('utf8');
$html = '';
$lenguaje = $_GET['lenguaje'];
$page = $_GET['page'];
$rowsPerPage = NUM_ITEMS_BY_PAGE;
$offset = ($page - 1) * $rowsPerPage;
sleep(1);
$result = $connexion->query("SELECT * FROM salvador_noticias WHERE idioma = '$lenguaje' ORDER BY id DESC LIMIT ".$offset.', '.$rowsPerPage);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $titulo = $row['titulo'];
        $descrip = $row['descripcion'];
        $url_img = $row['url_img'];
        $caracteres = 70;
        $html .= '<li class="col-lg-4">';
        $html .= '<div class="item">';
        $html .= '<img id="imgN" class="img-fluid mx-auto d-block" src="intranet/noticias/img/'.$row['url_img'].'" width="500"/>';
        $html .= '<a target="_blank" href="snoticias.php?id='.$id.'" data-toggle="tooltip" data-placement="right" title="¡Entérate de mas!" id="linknoti" class="" style="padding:5px;font-size: 20px;"><b>'.$row['titulo'].'</b></a>';
        $html .= '<div>'.substr($row['descripcion'],0,$caracteres)."...".'<a target="_blank" id="linknoti" href="snoticias.php?id='.$id.'">Leer Mas</a></p>';
        $html .= '</div>';
        $html .= '</li>';
    }
}
echo $html;
?>