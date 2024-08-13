<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Peminjaman Asset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        /* Top Navbar Styles */
        .top-navbar {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 2;
            max-width: 100%;
            box-sizing: border-box;
        }

        .logo-container {
            display: flex;
            align-items: center; 
        }

        .logo {
            width: 50px;
            height: 50px;
            background-image: url('https://img.freepik.com/free-vector/hand-drawn-flat-design-atheism-logo_23-2149259707.jpg?w=740&t=st=1721880730~exp=1721881330~hmac=769f1bb34ad4eb48268e88d94afeaff8b5b9fbc0f6b5b7ee6de5e54eecec337f'); /* Ganti dengan path yang benar */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            flex: none;
            order: 0;
            flex-grow: 0;
        }

        .logo-text { 
            margin-left: 10px;
            font-weight: bold;
            color: white;
        }

        .center-container { 
            flex: 1; 
            display: flex;
            justify-content: center; 
            margin: 0 20px; 
            max-width: 500px; 
        }

        .search-container {
            display: flex;
            margin: 0 auto;
            justify-content: center;
            width: 100%;
        }

        .search-container input[type="text"] {
            padding: 8px;
            border: none;
            border-radius: 20px 0 0 20px;
        }

        .search-container button {
            background-color: #f0f0f0;
            border: none;
            padding: 8px 12px;
            border-radius: 0 20px 20px 0;
            cursor: pointer;
        }

        .profile-container {
            display: flex;
            align-items: center;
        }

        .profile-container img {
            height: 30px;
            width: 30px;
            border-radius: 50%;
            margin-left: 10px;
        }

        /* Dashboard Container Style */
        .dashboard-container {
            display: flex;
            margin-top: 60px;
        }

        /* Sidebar Style */
        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: calc(100vh - 60px); 
            position: fixed; 
            top: 60px; 
            left: 0;
            overflow-y: auto;
            z-index: 1;
            border-right: 1px solid black;
        }

        .sidebar ul.menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
            padding: 10px 15px;
            border-radius: 8px;
        }

        .sidebar li.active a,
        .sidebar a:hover {
            background-color: #008CBA;
            color: white;
        }

        .sidebar i {
            margin-right: 10px;
            font-size: 1.2em;
            width: 24px;
            text-align: center;
        }

        .sidebar .logout-container{
            margin-top: 20px;
        }

        .sidebar .logout-button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            color: #dc3545;
            font-family: inherit;
            font-size: inherit;
            text-align: left;
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: flex-start;
            width: 100%;       
            justify-content: flex-start;  
            padding: 10px 15px;
        }
        .sidebar li.logout {
            margin-top: auto;
            margin-bottom: 10px; 
        }

        /* Content Style */
        .content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 20px;
        }

        .content-wrapper {
            flex: 1;
            overflow-y: visible;
            height: calc(100vh - 60px);
            margin-left: 270px;
            margin-top: 60px;
            box-sizing: border-box; 
        }

        .content h1 {
            margin-bottom: 20px;
        }

        /* Card Container Style */
        .card-container {
            display: flex;
            gap: 20px;
        }

        /* Card Style */
        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
            border: 3px solid;
        }

        /* Table Style */
        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #008CBA;
            color: white;
        }
        
        .action-buttons button {
            background: none;
            border: none;
            padding: 5px;
            cursor: pointer;
            margin-right: 5px;
            border-radius: 5px;
        }

        .action-buttons .edit-button {
            color: #007bff; 
        }

        .action-buttons .delete-button {
            color: #dc3545; 
        }

        .edit-button {
            background-color: #007bff; 
            color: white;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
        }

        /* Status Styles */
        .status-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .status-indicator.available {
            background-color: green; 
        }

        .status-indicator.not-available {
            background-color: red; 
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .popup {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.popup-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border-radius: 10px;
    width: 80%;
    max-width: 400px;
    text-align: center;
}

.warning-icon {
    width: 70px;
    height: 70px;
    background-color: #FF6B6B;
    color: white;
    font-size: 50px;
    line-height: 70px;
    border-radius: 50%;
    margin: 0 auto 20px;
}

.popup-content h2 {
    color: #333;
    margin-bottom: 10px;
}

.popup-content p {
    color: #666;
    margin-bottom: 20px;
}

.button-container {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.kembali-button, .hapus-button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

.kembali-button {
    background-color: #E0E0E0;
    color: #333;
}

.hapus-button {
    background-color: #FF6B6B;
    color: white;
}

    </style>
</head>
<body>
   <div class="top-navbar">
        <div class="logo-container">
            <div class="logo"></div>
            <span class="logo-text">{{ Auth::user()->username }} Management</span>
        </div>
        <div class="center-container">
            <div class="search-container">
                <input type="text" placeholder="Cari kebutuhan anda...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="profile-container">
            <span>{{ Auth::user()->username }}</span>
            <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-Clipart.png" alt="Foto Profil">
        </div>
    </div>

    <div class="dashboard-container">
        <div class="sidebar">
            <ul class="menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li> 
                    <a href="{{ route('master_asset') }}">
                        <i class="fas fa-crown"></i>
                        <span>Master Asset</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('status_asset') }}">
                        <i class="fas fa-pause-circle"></i>
                        <span>Status Asset</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('peminjaman_asset') }}">
                        <i class="fas fa-people-carry"></i>
                        <span>Peminjaman Asset</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('master_lokasi') }}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Master Lokasi</span>
                    </a>
                </li>
            </ul>

            <div class="logout-container">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="content">
                <h1>Peminjaman Assets</h1>

                <div class="form-group">
                    <select id="kategoriAsset" name="kategoriAsset" required>
                        <option value="">Pilih kategori asset</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Kendaraan">Kendaraan</option>
                    </select>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Lokasi</th>
                                <th>Foto</th>
                                <th>Kategori</th>
                                <th>Model</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AS001</td>
                                <td>Telepon</td>
                                <td>Kebayoran Lama</td>
                                <td><img src="https://www.empatpilar.com/wp-content/uploads/2023/06/Screenshot_8-21-jpg.webp" alt="Foto Telepon" width="100" height="100"></td>
                                <td>Elektronik</td>
                                <td>Panasonic</td> 
                                <td>
                                    <span class="status-indicator not-available"></span> Not Available
                                </td>
                                <td class="action-buttons">
                                    <button class="edit-button"><i class="fas fa-pen"></i></button>
                                    <button onclick="openDeleteConfirmationPopup('AS001')" class="delete-button"><i class="fas fa-trash"></i></button>  
                                </td>
                            </tr>
                            <tr>
                                <td>AS002</td>
                                <td>Speaker</td>
                                <td>Ruang Administrasi</td>
                                <td><img src="https://th.bing.com/th/id/OIP.esgaxF7OCaSEwxX6s-EKUAHaF2?rs=1&pid=ImgDetMain" alt="Foto Speaker" width="100" height="100"></td>
                                <td>Elektronik</td>
                                <td>JBL</td> 
                                <td>
                                    <span class="status-indicator not-available"></span> Not Available
                                </td>
                                <td class="action-buttons">
                                    <button class="edit-button"><i class="fas fa-pen"></i></button>
                                    <button onclick="openDeleteConfirmationPopup('AS001')" class="delete-button"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>AS003</td>
                                <td>Televisi</td>
                                <td>Ruang Meeting</td>
                                <td><img src="https://2.bp.blogspot.com/-Mys0VJ7Xuxc/WlTTnZ7kfNI/AAAAAAAAHAY/MbJHZSx0-XE0QwacblAJcc69ZOswGjbEQCLcBGAs/s1600/Panasonic_TH-55EX600S_55inch_4K_LED_TV.jpg" alt="Foto TV" width="100" height="100"></td>
                                <td>Elektronik</td>
                                <td>Panasonic</td>
                                <td>
                                    <span class="status-indicator available"></span> Available
                                </td>
                                <td class="action-buttons">
                                    <button class="edit-button"><i class="fas fa-pen"></i></button>
                                    <button onclick="openDeleteConfirmationPopup('AS001')" class="delete-button"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>AS004</td>
                                <td>Laptop</td>
                                <td>Ruang Marketing</td>
                                <td><img src="https://pluspng.com/img-png/laptop-png-hd-laptop-notebook-png-image-laptop-hd-png-1358.png" alt="Foto Laptop" width="100" height="100"></td>
                                <td>Elektronik</td>
                                <td>Asus</td>
                                <td>
                                    <span class="status-indicator not-available"></span> Not Available
                                </td>
                                <td class="action-buttons">
                                    <button class="edit-button"><i class="fas fa-pen"></i></button>
                                    <button onclick="openDeleteConfirmationPopup('AS001')" class="delete-button"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>AS005</td>
                                <td>AC</td>
                                <td>Ruang Gudang</td>
                                <td><img src="https://www.lg.com/in/images/split-ac/md06063116/gallery/01_1100x730.jpg" alt="Foto AC" width="100" height="100"></td>
                                <td>Elektronik</td>
                                <td>LG</td>
                                <td>
                                    <span class="status-indicator available"></span> Available
                                </td>
                                <td class="action-buttons">
                                    <button class="edit-button"><i class="fas fa-pen"></i></button>
                                    <button onclick="openDeleteConfirmationPopup('AS001')" class="delete-button"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>AS006</td>
                                <td>Kipas Portable</td>
                                <td>Ruang Meeting</td>
                                <td><img src="https://cf.shopee.co.id/file/1b7c76597f27f6c84d563118472eae01" alt="Foto Kipas" width="100" height="100"></td>
                                <td>Elektronik</td>
                                <td>Miyako</td>
                                <td>
                                    <span class="status-indicator available"></span> Available
                                </td>
                                <td class="action-buttons">
                                    <button class="edit-button"><i class="fas fa-pen"></i></button>
                                    <button onclick="openDeleteConfirmationPopup('AS001')" class="delete-button"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteConfirmationPopup" class="popup">
        <div class="popup-content">
            <div class="warning-icon">!</div>
            <h2>Yakin ingin menghapus asset ini?</h2>
            <p>Baca dan periksa kembali asset agar tidak terjadi kesalahan. Menghapus asset ini tidak dapat mengembalikan asset yang sudah terhapus.</p>
            <div class="button-container">
                <button onclick="closeDeleteConfirmationPopup()" class="kembali-button">Kembali</button>
                <button onclick="deleteAsset()" class="hapus-button">Hapus Asset</button>
            </div>
        </div>
    </div>
    </div>
    <script>
    function openDeleteConfirmationPopup(assetId) { 

        let deleteConfirmationPopup = document.getElementById("deleteConfirmationPopup");
        deleteConfirmationPopup.style.display = "block";
        document.body.style.overflow = 'hidden';
    }
    
    function closeDeleteConfirmationPopup() {
        let deleteConfirmationPopup = document.getElementById("deleteConfirmationPopup");
        deleteConfirmationPopup.style.display = "none";
        document.body.style.overflow = 'auto';
    }
    
    function deleteAsset() {
        alert("Asset berhasil dihapus!"); 
        closeDeleteConfirmationPopup();
    }</script>
</body>
</html>