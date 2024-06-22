<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $nrk = htmlspecialchars($_POST['nrk']);
    $tempat_tugas = htmlspecialchars($_POST['tempat_tugas']);

    // Handle file upload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $allowedMimeTypes = ['image/jpeg', 'image/jpg'];
        $fileMimeType = mime_content_type($_FILES['foto']['tmp_name']);
        if (in_array($fileMimeType, $allowedMimeTypes)) {
            $fotoPath = 'uploads/' . uniqid() . '-' . basename($_FILES['foto']['name']);
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath)) {
                // Assuming your domain is example.com and uploads folder is publicly accessible
                $fotoUrl = 'https://example.com/wifiup/' . $fotoPath;
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
    date_default_timezone_set('Asia/Jakarta'); // Sesuaikan dengan timezone Anda
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

    // URL encode the message to be sent to WhatsApp
    $whatsappUrl = "https://wa.me/62800000000?text=" . urlencode($message);

    // Return JSON response with WhatsApp URL
    echo json_encode(['success' => true, 'whatsapp_url' => $whatsappUrl]);
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
