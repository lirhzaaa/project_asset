<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            width: 100%;      
            justify-content: flex-start; 
            padding: 10px 15px;
        }

        .sidebar li.logout {
            margin-top: auto;
            margin-bottom: 10px; 
        }

        /* Content Styles */
        .content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 20px;
        }

        .content-wrapper {
            flex: 1;
            overflow-y: auto;
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

        /* Warna Border Kartu */
        .card.total-asset {
            border-color: #1B3B6F;
        }

        .card.pertambahan-asset {
            border-color: #7A7CFF;
        }

        .card.siap-dipinjam {
            border-color: #7CDF64;
        }

        .card i {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .card h3 {
            font-size: 1.2em;
            margin-bottom: 5px;
        }

        /* Peta Asset Style */
        .peta-asset {
            background-color: #f0f0f0;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            height: 300px; 
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
                    <li class="active"> 
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    </li>
 
                    <a href="{{ route('master_asset') }}">
                        <i class="fas fa-crown"></i>
                        <span>Master Asset</span>
                    </a>
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
        <h1>Dashboard</h1>

        <div class="card-container">
            <div class="card total-asset">
                <i class="fas fa-box"></i>
                <h3>{{ $totalAssets }}</h3> <!-- Ganti angka tetap dengan variabel -->
                <p>Total Asset</p>
            </div>
            <div class="card pertambahan-asset">
                <i class="fas fa-chart-line"></i>
                <h3>{{ $totalAssets }}</h3>
                <p>Pertambahan Asset</p>
            </div>
            <div class="card siap-dipinjam">
                <i class="fas fa-check-circle"></i>
                <h3>11/21</h3>
                <p>Asset Siap Dipinjam</p>
            </div>
        </div>

        <h2>Peta Asset</h2>
        <div class="peta-asset">
        </div>
    </div>
</div>

    </div>
</body>
</html>