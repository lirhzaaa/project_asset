<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Asset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        /* Top Navbar Style */
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
            background-image: url('https://img.freepik.com/free-vector/hand-drawn-flat-design-atheism-logo_23-2149259707.jpg?w=740&t=st=1721880730~exp=1721881330~hmac=769f1bb34ad4eb48268e88d94afeaff8b5b9fbc0f6b5b7ee6de5e54eecec337f');
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

        .sidebar .logout-container {
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

        .show-entries label {
            margin-right: 5px;
        }

        .show-entries select {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .edit-button {
            background-color: #007bff;
            color: white;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
        }

        /* Status Style */
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

        /* Tambah Asset Button */
        .tambah-asset-button {
            display: inline-block;
            background-color: #008CBA;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .tambah-asset-button i {
            margin-right: 5px;
        }

        /* Pop-up Style */
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

        .popup-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            position: relative; 
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 20px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
        @media screen and (max-height: 700px) {
        .popup-content {
            margin: 0 auto;
            top: 50%;
            transform: translateY(-50%);
        }
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
                <li class="active"> 
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
                <li>
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
                <h1>Master Asset</h1>

                <button class="tambah-asset-button" onclick="openAssetPopup()">
                    <i class="fas fa-plus"></i> Tambah Asset
                </button>

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
                            @foreach($assets as $asset)
                                <tr>
                                    <td>{{ $asset->kode }}</td>
                                    <td>{{ $asset->nama }}</td>
                                    <td>{{ $asset->lokasi }}</td>
                                    <td><img src="{{ asset('storage/' . $asset->foto) }}" alt="{{ $asset->nama }}" style="width: 100px; height: auto;"></td>
                                    <td>{{ $asset->kategori }}</td>
                                    <td>{{ $asset->model }}</td>
                                    <td>{{ $asset->status }}</td>
                                    <td>
                                    <button onclick="editAsset({{ $asset->id }})" class="edit-button">
        <i class="fas fa-pen"></i>
    </button>
        <form action="{{ route('asset.destroy', ['id' => $asset->id]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button" onclick="return confirm('Yakin ingin menghapus asset ini?');">
            <i class="fas fa-trash"></i>
        </button>
    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(session('success'))
                        <div>{{ session('success') }}</div>
                    @endif
                    <div class="table-footer">
                        Showing 1 to {{ $assets->count() }} of {{ $assets->count() }} entries
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Form -->
    <div id="assetPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeAssetPopup()">&times;</span>
            <h2>Tambah Asset Baru</h2>
            <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
                <div class="form-group">
                    <label for="namaAsset">Nama Asset</label>
                    <input type="text" id="namaAsset" name="nama" placeholder="Masukan nama asset" required>
                </div>
                <div class="form-group">
                    <label for="kodeAsset">Kode Asset</label>
                    <input type="text" id="kodeAsset" name="kode" placeholder="Masukan kode asset" required>
                </div>
                <div class="form-group">
                    <label for="lokasiAsset">Lokasi Asset</label>
                    <input type="text" id="lokasiAsset" name="lokasi" placeholder="Masukan lokasi asset" required>
                </div>
                <div class="form-group">
                <label for="fotoAsset">Foto Asset</label>
                <input type="file" id="fotoAsset" name="foto" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="kategoriAsset">Kategori Asset</label>
                    <select id="kategoriAsset" name="kategori" required>
                        <option value="">Pilih kategori asset</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Kendaraan">Kendaraan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="modelAsset">Model Asset</label>
                    <input type="text" id="modelAsset" name="model" placeholder="Masukan model asset" required>
                </div>
                <div class="form-group">
                    <label for="statusAsset">Status Asset</label>
                    <input type="text" id="statusAsset" name="status" placeholder="Masukan status asset" required>
                </div>
                <button type="submit" class="tambah-asset-button">Tambah Asset</button>
                </form>
        </div>
    </div>

    <!-- Delete Confirmation Popup -->
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
        <input type="hidden" id="deleteAssetId" value="">

    </div>

    <script>
        function openAssetPopup() {
            let popup = document.getElementById("assetPopup");
            popup.style.display = "block";
            document.body.style.overflow = 'hidden';
        }

        function closeAssetPopup() {
            let popup = document.getElementById("assetPopup");
            popup.style.display = "none";
            document.body.style.overflow = 'auto';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById("assetPopup")) {
                closeAssetPopup();
            }
        }

        function showSuccessPopup() {
            let successPopup = document.createElement('div');
            successPopup.className = 'popup';
            successPopup.innerHTML = `
                <div class="popup-content">
                    <span class="close" onclick="closeSuccessPopup()">&times;</span>
                    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background-color: lightgreen; display: flex; justify-content: center; align-items: center;">
                            <i class="fas fa-check" style="color: white; font-size: 2em;"></i>
                        </div>
                        <p style="margin-top: 10px;">Berhasil menambah asset</p>
                    </div>
                </div>
            `;
            document.body.appendChild(successPopup);
            successPopup.style.display = "block";
        }

        function closeSuccessPopup() {
            let successPopup = document.querySelector('.popup');
            if (successPopup) {
                successPopup.style.display = "none";
                document.body.style.overflow = 'auto';
            }
        }

        function editAsset(assetId) {
    // Fetch asset data using AJAX to prepopulate the form
    fetch(`/asset/${assetId}/edit`)
        .then(response => response.json())
        .then(asset => {
            // Populate the form fields with the asset data
            document.getElementById("namaAsset").value = asset.nama;
            document.getElementById("kodeAsset").value = asset.kode;
            document.getElementById("lokasiAsset").value = asset.lokasi;
            document.getElementById("kategoriAsset").value = asset.kategori;
            document.getElementById("modelAsset").value = asset.model;
            document.getElementById("statusAsset").value = asset.status;

            // Change form action to update the asset
            const form = document.querySelector("#assetPopup form");
            form.action = `/asset/${assetId}`;
            form.method = 'POST';
            const inputMethod = document.createElement('input');
            inputMethod.setAttribute('type', 'hidden');
            inputMethod.setAttribute('name', '_method');
            inputMethod.setAttribute('value', 'PUT');
            form.appendChild(inputMethod);

            // Show the popup
            openAssetPopup();
        })
        .catch(error => console.error('Error fetching asset data:', error));
}



function findAssetById(assetId) {
    // Fungsi ini harus disesuaikan dengan cara Anda mengambil data asset, misalnya melalui AJAX atau dengan membaca data yang ada.
    return {
        id: assetId,
        nama: "Contoh Nama",
        kode: "AS001",
        lokasi: "Lokasi Contoh",
        kategori: "Elektronik",
        model: "Model Contoh",
        status: "Baru"
    };
}

function openDeleteConfirmationPopup(assetId) {
    // Simpan assetId yang akan dihapus ke dalam elemen tersembunyi atau variabel global
    document.getElementById("deleteAssetId").value = assetId;
    let deleteConfirmationPopup = document.getElementById("deleteConfirmationPopup");
    deleteConfirmationPopup.style.display = "block";
    document.body.style.overflow = 'hidden';
}

function deleteAsset() {
    let assetId = document.getElementById("deleteAssetId").value;
    
    // Lakukan penghapusan melalui AJAX atau redirect ke URL penghapusan
    fetch(`/asset/delete/${assetId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(response => {
        if (response.ok) {
            alert("Asset berhasil dihapus!"); 
            closeDeleteConfirmationPopup();
            location.reload(); // Reload halaman setelah penghapusan
        } else {
            alert("Terjadi kesalahan saat menghapus asset!");
        }
    });
}

    </script>

</body>

</html>
</body>
</html>

