<?php

// Set header untuk CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization, Origin, Accept');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json; charset=UTF-8');

// Handle OPTIONS method untuk preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Fungsi untuk output JSON dengan pretty print
function outputJSON($data) {
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

// Konfigurasi database
$host = 'localhost';
$dbname = 'budin';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
    
    $endpoint = $_GET['endpoint'] ?? '';
    $method = $_SERVER['REQUEST_METHOD'];
    
    $response = [
        'status' => 'success',
        'message' => '',
        'data' => null,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    // Ambil data JSON dari body request
    $input = json_decode(file_get_contents('php://input'), true);
    
    switch($endpoint) {
        case 'petugas':
            switch($method) {
                case 'GET':
                    if(isset($_GET['id'])) {
                        $stmt = $pdo->prepare("SELECT * FROM petugas WHERE id = ?");
                        $stmt->execute([$_GET['id']]);
                        $response['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
                    } else {
                        $stmt = $pdo->query("SELECT * FROM petugas");
                        $response['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                    $response['message'] = 'Data petugas berhasil diambil';
                    break;

                case 'POST':
                    $stmt = $pdo->prepare("INSERT INTO petugas (nama, username, password, telp, level) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([
                        $input['nama'],
                        $input['username'],
                        password_hash($input['password'], PASSWORD_DEFAULT),
                        $input['telp'],
                        $input['level']
                    ]);
                    $response['message'] = 'Petugas berhasil ditambahkan';
                    $response['data'] = ['id' => $pdo->lastInsertId()];
                    break;

                case 'PUT':
                    if(!isset($_GET['id'])) {
                        throw new Exception('ID tidak ditemukan');
                    }
                    $updates = [];
                    $params = [];
                    foreach(['nama', 'username', 'telp', 'level'] as $field) {
                        if(isset($input[$field])) {
                            $updates[] = "$field = ?";
                            $params[] = $input[$field];
                        }
                    }
                    if(isset($input['password'])) {
                        $updates[] = "password = ?";
                        $params[] = password_hash($input['password'], PASSWORD_DEFAULT);
                    }
                    $params[] = $_GET['id'];
                    
                    $stmt = $pdo->prepare("UPDATE petugas SET " . implode(', ', $updates) . " WHERE id = ?");
                    $stmt->execute($params);
                    $response['message'] = 'Data petugas berhasil diupdate';
                    break;

                case 'DELETE':
                    if(!isset($_GET['id'])) {
                        throw new Exception('ID tidak ditemukan');
                    }
                    $stmt = $pdo->prepare("DELETE FROM petugas WHERE id = ?");
                    $stmt->execute([$_GET['id']]);
                    $response['message'] = 'Data petugas berhasil dihapus';
                    break;
            }
            break;
            
        case 'foto':
            switch($method) {
                case 'GET':
                    if(isset($_GET['id'])) {
                        $stmt = $pdo->prepare("SELECT f.* FROM foto f WHERE f.id = ?");
                        $stmt->execute([$_GET['id']]);
                        $photo = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($photo) {
                            $photo['file_url'] = 'http://127.0.0.1:8000/storage/' . str_replace('//', '/', $photo['file']);
                        }
                        $response['data'] = $photo;
                    } else {
                        $stmt = $pdo->query("SELECT * FROM foto");
                        $photos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach($photos as &$photo) {
                            $photo['file_url'] = 'http://127.0.0.1:8000/storage/' . str_replace('//', '/', $photo['file']);
                        }
                        
                        $response['data'] = $photos;
                    }
                    $response['message'] = 'Data foto berhasil diambil';
                    break;

                case 'POST':
                    if(isset($_FILES['file'])) {
                        $file = $_FILES['file'];
                        $filename = time() . '_' . $file['name'];
                        $path = 'fotos/' . $filename;
                        
                        // Pindahkan file ke folder storage/app/public/fotos
                        move_uploaded_file($file['tmp_name'], __DIR__ . '/../../storage/app/public/fotos/' . $filename);

                        $stmt = $pdo->prepare("INSERT INTO foto (galery_id, file, judul) VALUES (?, ?, ?)");
                        $stmt->execute([
                            $input['galery_id'],
                            $path,
                            $input['judul']
                        ]);
                        
                        $response['message'] = 'Foto berhasil ditambahkan';
                        $response['data'] = [
                            'id' => $pdo->lastInsertId(),
                            'file_url' => 'http://127.0.0.1:8000/storage/' . $path
                        ];
                    } else {
                        throw new Exception('File tidak ditemukan!');
                    }
                    break;

                case 'PUT':
                    if(!isset($_GET['id'])) {
                        throw new Exception('ID tidak ditemukan');
                    }

                    $updates = [];
                    $params = [];

                    // Update data non-file
                    foreach(['galery_id', 'judul'] as $field) {
                        if(isset($input[$field])) {
                            $updates[] = "$field = ?";
                            $params[] = $input[$field];
                        }
                    }

                    // Handle file update jika ada
                    if(isset($_FILES['file'])) {
                        $file = $_FILES['file'];
                        $filename = time() . '_' . $file['name'];
                        $path = 'fotos/' . $filename;
                        
                        // Ambil file lama
                        $stmt = $pdo->prepare("SELECT file FROM foto WHERE id = ?");
                        $stmt->execute([$_GET['id']]);
                        $oldFile = $stmt->fetchColumn();

                        // Hapus file lama
                        if($oldFile && file_exists(__DIR__ . '/../../storage/app/public/' . $oldFile)) {
                            unlink(__DIR__ . '/../../storage/app/public/' . $oldFile);
                        }

                        // Upload file baru
                        move_uploaded_file($file['tmp_name'], __DIR__ . '/../../storage/app/public/fotos/' . $filename);
                        
                        $updates[] = "file = ?";
                        $params[] = $path;
                    }

                    $params[] = $_GET['id'];
                    
                    $stmt = $pdo->prepare("UPDATE foto SET " . implode(', ', $updates) . " WHERE id = ?");
                    $stmt->execute($params);
                    $response['message'] = 'Data foto berhasil diupdate';
                    break;

                case 'DELETE':
                    if(!isset($_GET['id'])) {
                        throw new Exception('ID tidak ditemukan');
                    }

                    // Ambil info file sebelum dihapus
                    $stmt = $pdo->prepare("SELECT file FROM foto WHERE id = ?");
                    $stmt->execute([$_GET['id']]);
                    $file = $stmt->fetchColumn();

                    // Hapus file fisik
                    if($file && file_exists(__DIR__ . '/../../storage/app/public/' . $file)) {
                        unlink(__DIR__ . '/../../storage/app/public/' . $file);
                    }

                    // Hapus record dari database
                    $stmt = $pdo->prepare("DELETE FROM foto WHERE id = ?");
                    $stmt->execute([$_GET['id']]);
                    
                    // Reset auto increment
                    $stmt = $pdo->query("SELECT MAX(id) FROM foto");
                    $maxId = $stmt->fetchColumn();
                    $newAutoIncrement = $maxId ? $maxId + 1 : 1;
                    $pdo->exec("ALTER TABLE foto AUTO_INCREMENT = $newAutoIncrement");

                    $response['message'] = 'Data foto berhasil dihapus';
                    break;
            }
            break;

        case 'posts':
            switch($method) {
                case 'GET':
                    if(isset($_GET['id'])) {
                        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
                        $stmt->execute([$_GET['id']]);
                        $response['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
                    } else {
                        $stmt = $pdo->query("SELECT * FROM posts");
                        $response['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                    $response['message'] = 'Data posts berhasil diambil';
                    break;

                case 'POST':
                    $stmt = $pdo->prepare("INSERT INTO posts (judul, kategori_id, isi, petugas_id, status) 
                                         VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([
                        $input['judul'],
                        $input['kategori_id'],
                        $input['isi'],
                        $input['petugas_id'],
                        $input['status'] ?? 'draft'
                    ]);
                    $response['message'] = 'Post berhasil ditambahkan';
                    $response['data'] = ['id' => $pdo->lastInsertId()];
                    break;

                case 'PUT':
                    if(!isset($_GET['id'])) throw new Exception('ID tidak ditemukan');
                    $updates = [];
                    $params = [];
                    foreach(['judul', 'kategori_id', 'isi', 'petugas_id', 'status'] as $field) {
                        if(isset($input[$field])) {
                            $updates[] = "$field = ?";
                            $params[] = $input[$field];
                        }
                    }
                    $params[] = $_GET['id'];
                    $stmt = $pdo->prepare("UPDATE posts SET " . implode(', ', $updates) . " WHERE id = ?");
                    $stmt->execute($params);
                    $response['message'] = 'Post berhasil diupdate';
                    break;

                case 'DELETE':
                    if(!isset($_GET['id'])) throw new Exception('ID tidak ditemukan');
                    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
                    $stmt->execute([$_GET['id']]);
                    $response['message'] = 'Post berhasil dihapus';
                    break;
            }
            break;

        case 'galery':
            switch($method) {
                case 'GET':
                    if(isset($_GET['id'])) {
                        $stmt = $pdo->prepare("SELECT g.*, p.judul as post_judul FROM galery g LEFT JOIN posts p ON g.post_id = p.id WHERE g.id = ?");
                        $stmt->execute([$_GET['id']]);
                        $response['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
                    } else {
                        $stmt = $pdo->query("SELECT g.*, p.judul as post_judul FROM galery g LEFT JOIN posts p ON g.post_id = p.id");
                        $response['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                    $response['message'] = 'Data galeri berhasil diambil';
                    break;

                case 'POST':
                    $stmt = $pdo->prepare("INSERT INTO galery (judul, deskripsi, post_id) VALUES (?, ?, ?)");
                    $stmt->execute([
                        $input['judul'],
                        $input['deskripsi'],
                        $input['post_id']
                    ]);
                    $response['message'] = 'Galeri berhasil ditambahkan';
                    $response['data'] = ['id' => $pdo->lastInsertId()];
                    break;

                case 'PUT':
                    if(!isset($_GET['id'])) throw new Exception('ID tidak ditemukan');
                    $updates = [];
                    $params = [];
                    foreach(['judul', 'deskripsi', 'post_id'] as $field) {
                        if(isset($input[$field])) {
                            $updates[] = "$field = ?";
                            $params[] = $input[$field];
                        }
                    }
                    $params[] = $_GET['id'];
                    $stmt = $pdo->prepare("UPDATE galery SET " . implode(', ', $updates) . " WHERE id = ?");
                    $stmt->execute($params);
                    $response['message'] = 'Galeri berhasil diupdate';
                    break;

                case 'DELETE':
                    if(!isset($_GET['id'])) throw new Exception('ID tidak ditemukan');
                    $stmt = $pdo->prepare("DELETE FROM galery WHERE id = ?");
                    $stmt->execute([$_GET['id']]);
                    $response['message'] = 'Galeri berhasil dihapus';
                    break;
            }
            break;

        case 'kategori':
            switch($method) {
                case 'GET':
                    if(isset($_GET['id'])) {
                        $stmt = $pdo->prepare("SELECT * FROM kategori WHERE id = ?");
                        $stmt->execute([$_GET['id']]);
                        $response['data'] = $stmt->fetch(PDO::FETCH_ASSOC);
                    } else {
                        $stmt = $pdo->query("SELECT k.*, (SELECT COUNT(*) FROM posts WHERE kategori_id = k.id) as total_posts FROM kategori k");
                        $response['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                    $response['message'] = 'Data kategori berhasil diambil';
                    break;

                case 'POST':
                    $stmt = $pdo->prepare("INSERT INTO kategori (nama, slug) VALUES (?, ?)");
                    $stmt->execute([
                        $input['nama'],
                        $input['slug']
                    ]);
                    $response['message'] = 'Kategori berhasil ditambahkan';
                    $response['data'] = ['id' => $pdo->lastInsertId()];
                    break;

                case 'PUT':
                    if(!isset($_GET['id'])) throw new Exception('ID tidak ditemukan');
                    $updates = [];
                    $params = [];
                    foreach(['nama', 'slug'] as $field) {
                        if(isset($input[$field])) {
                            $updates[] = "$field = ?";
                            $params[] = $input[$field];
                        }
                    }
                    $params[] = $_GET['id'];
                    $stmt = $pdo->prepare("UPDATE kategori SET " . implode(', ', $updates) . " WHERE id = ?");
                    $stmt->execute($params);
                    $response['message'] = 'Kategori berhasil diupdate';
                    break;

                case 'DELETE':
                    if(!isset($_GET['id'])) throw new Exception('ID tidak ditemukan');
                    $stmt = $pdo->prepare("DELETE FROM kategori WHERE id = ?");
                    $stmt->execute([$_GET['id']]);
                    $response['message'] = 'Kategori berhasil dihapus';
                    break;
            }
            break;

        default:
            $response['status'] = 'info';
            $response['message'] = 'Pilih endpoint yang tersedia';
            $response['data'] = [
                'available_endpoints' => [
                    [
                        'endpoint' => '/api/?endpoint=petugas',
                        'methods' => ['GET', 'POST', 'PUT', 'DELETE'],
                        'description' => 'CRUD operasi untuk data petugas'
                    ],
                    [
                        'endpoint' => '/api/?endpoint=foto',
                        'methods' => ['GET', 'POST', 'PUT', 'DELETE'],
                        'description' => 'CRUD operasi untuk data foto'
                    ],
                    [
                        'endpoint' => '/api/?endpoint=posts',
                        'methods' => ['GET', 'POST', 'PUT', 'DELETE'],
                        'description' => 'CRUD operasi untuk data posts'
                    ],
                    [
                        'endpoint' => '/api/?endpoint=galery',
                        'methods' => ['GET', 'POST', 'PUT', 'DELETE'],
                        'description' => 'CRUD operasi untuk data galeri'
                    ],
                    [
                        'endpoint' => '/api/?endpoint=kategori',
                        'methods' => ['GET', 'POST', 'PUT', 'DELETE'],
                        'description' => 'CRUD operasi untuk data kategori'
                    ]
                ]
            ];
    }
    
    outputJSON($response);
    
} catch(Exception $e) {
    http_response_code(500);
    $error_response = [
        'status' => 'error',
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => $e->getTraceAsString(),
        'data' => null,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    outputJSON($error_response);
}