# WIFIUP
WhatsApp Integrated Form for Upacara and Presensi

# Fungsi Sistem
WIFIUP adalah sistem formulir online yang dirancang untuk mengumpulkan dan mengelola data peserta secara efisien. Sistem ini ideal untuk pendaftaran acara, survei, dan pengumpulan data lainnya yang memerlukan pencatatan informasi pengguna beserta bukti foto. Data yang dikumpulkan langsung dikirim ke WhatsApp yang dituju untuk notifikasi instan dan juga disimpan untuk ditampilkan dalam laporan yang terstruktur.

# Fitur Unggulan
- Formulir Responsif: Formulir online yang dapat diakses dari berbagai perangkat seperti desktop, tablet, dan smartphone.
- Upload Foto: Mendukung unggahan foto dalam format .jpg dan .jpeg, dengan validasi dan penyimpanan yang aman.
- Notifikasi Instan ke WhatsApp: Mengirim data yang diisikan langsung ke nomor WhatsApp yang ditentukan untuk pemberitahuan real-time.
- Laporan Terstruktur: Menampilkan data yang dikumpulkan dalam bentuk tabel yang rapi dan responsif, dapat diakses kapan saja tanpa memerlukan database.
- Timestamp Otomatis: Menyertakan cap waktu otomatis pada setiap entri data, memastikan setiap pengisian tercatat dengan waktu yang tepat.
- Penyimpanan Data dalam JSON: Data disimpan dalam format JSON, memudahkan pengelolaan dan akses tanpa memerlukan database.

# Teknik Penggunaan

1.	Mengisi Formulir:
- Pengguna mengakses URL formulir online.
- Mengisi data yang diperlukan: Nama Lengkap, NRK, Tempat Tugas, dan Upload Foto.
- Menekan tombol "Submit".

2. Notifikasi WhatsApp:
- Setelah pengisian, data dikirim ke WhatsApp yang ditentukan dengan format pesan yang rapi.
- Pengguna diarahkan ke halaman laporan setelah beberapa detik.

3. Melihat Laporan:
- Admin atau pengguna dapat mengakses halaman view.html untuk melihat semua data yang telah diisikan dalam bentuk tabel yang rapi dan terstruktur.

# Cara Menjalankan di Web Server

1 Persiapan Server:
- Pastikan server web Anda mendukung PHP.
- Pastikan memiliki izin menulis di direktori untuk mengunggah file dan menyimpan data JSON.

2 Struktur Direktori:

/your-web-directory

├── index.html

├── post.php

├── get_data.php

├── view.html

├── uploads/ (direktori untuk menyimpan foto)

└── data.json (file untuk menyimpan data JSON)

3 Konfigurasi File:
- Sesuaikan URL pada post.php untuk menyertakan domain atau path yang benar sesuai dengan server Anda.
- Contoh URL untuk foto: https://yourdomain.com/uploads/.

4 Upload File:
- Unggah semua file (index.html, post.php, get_data.php, view.html) ke direktori root web server Anda.
- Buat direktori uploads di dalam direktori root dan pastikan memiliki izin baca/tulis.
- Buat file kosong data.json di direktori root dan pastikan memiliki izin baca/tulis.

5 Akses dan Penggunaan:
- Akses index.html melalui browser untuk melihat formulir.
- Setelah pengisian dan pengiriman, data akan dikirim ke WhatsApp dan kemudian diarahkan ke view.html untuk melihat laporan.


# Contoh Implementasi pada Server Localhost

	1. Instalasi XAMPP:

- Unduh dan instal XAMPP dari Apache Friends.
- Jalankan Apache dan MySQL dari XAMPP Control Panel.

	2. Menyiapkan Direktori:

	- Buat direktori baru dalam htdocs di dalam folder instalasi XAMPP (contoh: C:\xampp\htdocs\e-registration-pro).
	- Salin semua file yang diperlukan ke direktori ini.

	3. Mengakses Formulir:

	- Buka browser dan akses http://localhost/wifiup/index.html.
 
Dengan mengikuti langkah-langkah ini, WIFIUP akan berjalan dengan lancar di web server Anda, memungkinkan pengumpulan data yang efisien dan pemberitahuan instan melalui WhatsApp.
