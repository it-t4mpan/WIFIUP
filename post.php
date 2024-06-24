<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
    $nrk = filter_var($_POST['nrk'], FILTER_SANITIZE_STRING);
    $tempat_tugas = filter_var($_POST['tempat_tugas'], FILTER_SANITIZE_STRING);

    // Handle file upload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $allowedMimeTypes = ['image/jpeg', 'image/jpg'];
        $fileMimeType = mime_content_type($_FILES['foto']['tmp_name']);
        $fileExtension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        
        if (in_array($fileMimeType, $allowedMimeTypes) && in_array($fileExtension, ['jpg', 'jpeg'])) {
            $fotoPath = 'uploads/' . uniqid() . '-' . basename($_FILES['foto']['name']);
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath)) {
                $fotoUrl = 'https://localhost/WIFIUP/' . $fotoPath;
            } else {
                die('Upload foto gagal.');
            }
        } else {
            die('File foto tidak valid. Hanya format .jpg dan .jpeg yang diizinkan.');
        }
    } else {
        die('Upload foto gagal.');
    }

    // Generate timestamp
    date_default_timezone_set('Asia/Jakarta');
    $timestamp = date('d-m-Y H:i:s');

    // Prepare the data
    $data = [
        'nama' => $nama,
        'nrk' => $nrk,
        'tempat_tugas' => $tempat_tugas,
        'foto' => $fotoUrl,
        'timestamp' => $timestamp
    ];

    // Load existing data
    $file = 'data.json';
    if (file_exists($file)) {
        $json = file_get_contents($file);
        $formData = json_decode($json, true);
    } else {
        $formData = [];
    }

    // Append new data
    $formData[] = $data;

    // Save updated data
    file_put_contents($file, json_encode($formData));

    $message = "Nama Lengkap: $nama\n";
    $message .= "Nrk: $nrk\n";
    $message .= "Tempat Tugas: $tempat_tugas\n";
    $message .= "Foto: $fotoUrl\n";
    $message .= "Timestamp: $timestamp\n";

    $whatsappUrl = "https://wa.me/6281210019202?text=" . urlencode($message);

    echo json_encode(['success' => true, 'whatsapp_url' => $whatsappUrl]);
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
