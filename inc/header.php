<?php
//patron mavisi #04508c;
session_start();
include('cfg.php');
include('functions.php');
?>

<!doctype html>
<html lang="en">
<head>
<meta name="robots" content="noindex">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="<?php echo $url; ?>/css/all.css" rel="stylesheet">

<?php if($param[1]=='login' || @!$_SESSION["user"]){ ?>
<link rel="stylesheet" href="<?php echo $url; ?>/css/login.css">
<?php } ?>
<link rel="stylesheet" href="<?php echo $url; ?>/css/leftnav.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="icon" href="<?php echo $url; ?>/favicon.png" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo $url; ?>/css/style.css">


<script src="<?php echo $url; ?>/js/jquery.min.js"></script>
<?php if($param[1]=!'login' || @$_SESSION["user"]){ ?>
<script src="<?php echo $url; ?>/js/merih.js"></script>
<script src="<?php echo $url; ?>/js/zimer.js"></script>
<?php } ?>
<script src="<?php echo $url; ?>/ck/build/ckeditor.js"></script>
</head>
<body id="body-pd" style="background-color:#eee;">
<?php 
if(@$_SESSION["user"]){
	
?>
<div class='dashboard'>
    <div class="dashboard-nav">
	
	<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Codinglab</span>
                    <span class="profession">Web developer</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">Dashboard Sidebar</div>
    </section>
        <header>
		<a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-bars"></i></a>
		<a href="<?php echo $url; ?>" class="brand-logo"><img src="<?php echo $url; ?>/favicon.png"><span style="margin-left:15px;">KARMA</span></a>
		
		</header>
        <nav class="dashboard-nav-list">
		<a href="<?php echo $url; ?>" class="dashboard-nav-item"><i class="fas fa-home"></i>Anasayfa </a>
		<?php if(yetki_kontrol(@$_SESSION["rol"],"pl") || yetki_kontrol(@$_SESSION["rol"],"pe")){ ?>
            <div class='dashboard-nav-dropdown'>
			<a href="javascript:void(0)" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i> Personel </a>
                <div class='dashboard-nav-dropdown-menu'>
					<?php if(yetki_kontrol(@$_SESSION["rol"],"pl")){ ?>
					<a href="javascript:void(0)" onclick="linkpersonel('personeller')" class="dashboard-nav-dropdown-item"><i class="fas fa-retweet" style="margin-right:5px;"></i>Personeller</a>
					<?php } ?>
					<?php if(yetki_kontrol(@$_SESSION["rol"],"pe")){ ?>
					<a href="javascript:void(0)" onclick="linkpersonel('personelekle')" class="dashboard-nav-dropdown-item"><i class="fas fa-plus" style="margin-right:5px;"></i> Personel Ekle</a>
					<?php } ?>			
				
				</div>
            </div>
			<?php } ?>
			<?php if(yetki_kontrol(@$_SESSION["rol"],"kul") || yetki_kontrol(@$_SESSION["rol"],"kue") || yetki_kontrol(@$_SESSION["rol"],"kuv") || yetki_kontrol(@$_SESSION["rol"],"kur") || yetki_kontrol(@$_SESSION["rol"],"kuh")){ ?>
            <div class='dashboard-nav-dropdown'><a href="javascript:void(0)" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
			<i class="fas fa-shopping-cart"></i> Kumanya </a>
                <div class='dashboard-nav-dropdown-menu'>
				<?php if(yetki_kontrol(@$_SESSION["rol"],"kul")){ ?>
				<a href="javascript:void(0)" onclick="linkpersonel('kumanyalar')" class="dashboard-nav-dropdown-item">Kumanyalar</a>
				<?php } ?>
				<?php if(yetki_kontrol(@$_SESSION["rol"],"kue")){ ?>
				<a href="javascript:void(0)" onclick="linkpersonel('kumanyaekle')" class="dashboard-nav-dropdown-item">Kumanya Y??kle</a>
				<?php } ?>
				<?php if(yetki_kontrol(@$_SESSION["rol"],"kuv")){ ?>
				<a href="javascript:void(0)" onclick="linkpersonel('kumanyaver')" class="dashboard-nav-dropdown-item">Kumanya Ver</a>
				<?php } ?>
				<?php if(yetki_kontrol(@$_SESSION["rol"],"kur")){ ?>
				<a href="javascript:void(0)" onclick="linkpersonel('odenmiskumanya')" class="dashboard-nav-dropdown-item">??denmi?? Kumanyalar</a>
				<?php } ?>
				<?php if(yetki_kontrol(@$_SESSION["rol"],"kuh")){ ?>
				<a href="javascript:void(0)" onclick="linkpersonel('kumanyalarhepsi')" class="dashboard-nav-dropdown-item">T??m Kumanyalar</a>
				<?php } ?>
				<?php if(yetki_kontrol(@$_SESSION["rol"],"kuo")){ ?>
				<a href="javascript:void(0)" onclick="linkpersonel('onaylanankontrol')" class="dashboard-nav-dropdown-item">Onaylanan Kumanya</a>
				<?php } ?>
				<?php if(yetki_kontrol(@$_SESSION["rol"],"kugun")){ ?>
				<a href="javascript:void(0)" onclick="linkpersonel('kumanyagunluk')" class="dashboard-nav-dropdown-item">G??nl??k Kumanya</a>
				<?php } ?>
				<?php if(yetki_kontrol(@$_SESSION["rol"],"kds")){ ?>
				<a href="javascript:void(0)" onclick="linkpersonel('kumanyadonemsil')" class="dashboard-nav-dropdown-item">D??nem Sil</a>
				<?php } ?>
				</div>
            </div>
			<?php } ?>
			<?php if(yetki_kontrol(@$_SESSION["rol"],"admin")){ ?>
			<div class='dashboard-nav-dropdown'>
			<a href="javascript:void(0)" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users-cog"></i> Kullan??c?? Y??netimi </a>
                <div class='dashboard-nav-dropdown-menu'>
					<?php if(yetki_kontrol(@$_SESSION["rol"],"admin")){ ?>
					<a href="javascript:void(0)" onclick="linkpersonel('ayarlar')" class="dashboard-nav-dropdown-item"><i class="fas fa-retweet" style="margin-right:5px;"></i> Kullan??c??lar</a>
					<?php } ?>	
					<?php if(yetki_kontrol(@$_SESSION["rol"],"admin")){ ?>
					<a href="javascript:void(0)" onclick="linkpersonel('kullaniciekle')" class="dashboard-nav-dropdown-item"><i class="fas fa-plus" style="margin-right:5px;"></i>Kullan??c?? Ekle</a>
					<?php } ?>
							
				
				</div>
            </div>
			<?php } ?>
			<div class='dashboard-nav-dropdown'>
			<a href="javascript:void(0)" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-user"></i> Profil </a>
                <div class='dashboard-nav-dropdown-menu'>
					
					<a href="javascript:void(0)" onclick="linkpersonel('sifreguncelle')" class="dashboard-nav-dropdown-item"><i class="fas fa-retweet" style="margin-right:5px;"></i>??ifre G??ncelle</a>
					
				
				</div>
            </div>
            
           <div class="nav-item-divider"></div>
           <a href="<?php echo $url; ?>/logout" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> ????k???? </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <header class='dashboard-toolbar'><a href="javascript:void(0)" class="menu-toggle"><i class="fas fa-bars"></i></a>
		
		<button type="button" class="btn btn-primary position-absolute" style="right:15px;">
		  <?php echo @$_SESSION["uname"]; ?>
		  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
			99+
			<span class="visually-hidden">unread messages</span>
		  </span>
		</button>
		
		<a href="javascript:void(0)" style="position:absolute;right:15px;"></a>
		</header>
        <div class='dashboard-content'>
            <div class='container'>
            <div id="maincont">
			
			<div id="loading">
  <img id="loading-image" src="img/Ajax-loader.gif" alt="Loading..." />
</div>
			
			<?php } else {
				include($_SERVER["DOCUMENT_ROOT"]."/view/login.php");
			} ?>
			
			
			
		
