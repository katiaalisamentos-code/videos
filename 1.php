<!-- Botões flutuantes: WhatsApp e Instagram -->
<div class="float-buttons">
  <!-- WhatsApp -->
  <a class="float whatsapp" href="https://wa.me/5547989138684" target="_blank" rel="noopener">
    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/whatsapp.svg" alt="WhatsApp">
  </a>

  <!-- Instagram -->
  <a class="float instagram" href="https://instagram.com/katia_alisamentos" target="_blank" rel="noopener">
    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram">
  </a>
</div>

<style>
.float-buttons {
  position: fixed;
  right: 20px;
  bottom: 20px;
  display: flex;
  flex-direction: column;
  gap: 12px;
  z-index: 1200;
}

.float {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 6px 18px rgba(0,0,0,0.3);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.float img {
  width: 30px;
  height: 30px;
  filter: brightness(0) invert(1);
}

.float.whatsapp {
  background-color: #25D366;
}

.float.instagram {
  background: radial-gradient(circle at 30% 110%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
}

.float:hover {
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 8px 22px rgba(0,0,0,0.35);
}

@media (max-width: 420px) {
  .float {
    width: 50px;
    height: 50px;
  }

  .float img {
    width: 24px;
    height: 24px;
  }
}
</style>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Galeria de Vídeos</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #121212;
        color: #fff;
        margin: 0;
        padding: 0;
    }

    /* Foto de perfil e título */
    .perfil-container {
        text-align: center;
        margin-top: 20px;
    }

    .perfil-foto {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #800000;
        box-shadow: 0 0 10px rgba(0,0,0,0.4);
        margin-bottom: 10px;
    }

    h1 {
        text-align: center;
        margin: 100px 0 20px 0;
        font-size: 24px;
    }

h2 {

        text-align: center;
        margin: 5px 0 20px 0;
        font-size: 15px;
        color: #800000;
    }


    /* Galeria de vídeos */
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 12px;
        padding: 15px;
    }

    .video-thumb {
        width: 100%;
        aspect-ratio: 1 / 1; /* miniatura quadrada como na galeria de fotos */
        object-fit: cover;
        border-radius: 12px;
        cursor: pointer;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .video-thumb:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }

    /* Lightbox */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        justify-content: center;
        align-items: center;
    }

    .lightbox video {
        max-width: 90%;
        max-height: 85%;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
    }

    .lightbox span {
        position: absolute;
        top: 20px;
        right: 30px;
        color: #fff;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .lightbox span:hover {
        color: #ff5555;
    }

    /* Setas dentro do lightbox */
    .arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 50px;
        color: #fff;
        cursor: pointer;
        padding: 10px;
        user-select: none;
        transition: color 0.2s ease;
        z-index: 1000;
    }

    .arrow:hover {
        color: #ff5555;
    }

    .arrow.left {
        left: 20px;
    }

    .arrow.right {
        right: 20px;
    }

    @media (max-width: 600px) {
        .perfil-foto {
            width: 90px;
            height: 90px;
        }

        .video-thumb {
            aspect-ratio: 1 / 1;
        }

        .lightbox video {
            max-width: 95%;
            max-height: 80%;
        }

        .arrow {
            font-size: 35px;
        }
    }
</style>
</head>
<body>

<!-- Foto de perfil e título -->
<div class="perfil-container">
    <img src="1.jpeg" alt="Foto de Perfil" class="perfil-foto">
    <h2>Kátia Alisamentos</h2>
    <h1>🎬 Trabalhos Recentes 👇</h1>
</div>

<!-- Galeria de vídeos -->
<div class="gallery">
<?php
$dirVideos = "videos/";
$extensoesVideos = ['mp4', 'webm', 'ogg'];
$videos = [];

if (is_dir($dirVideos)) {
    $arquivos = scandir($dirVideos);
    foreach ($arquivos as $arquivo) {
        $ext = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
        if (in_array($ext, $extensoesVideos)) {
            $videos[] = $dirVideos . $arquivo;
        }
    }
    sort($videos);
    foreach ($videos as $index => $video) {
        echo "<video class='video-thumb' onclick='abrirLightbox($index)' muted preload='metadata'>
                <source src='$video' type='video/$extensoesVideos[0]'>
              </video>";
    }
} else {
    echo "<p style='text-align:center;'>A pasta <strong>videos/</strong> não foi encontrada!</p>";
}
?>
</div>

<!-- Lightbox -->
<div id="lightbox" class="lightbox" onclick="fecharLightbox(event)">
    <span onclick="fecharLightbox(event)">&times;</span>
    <div class="arrow left" onclick="mudarVideo(-1)">&#10094;</div>
    <video id="videoPlayer" controls autoplay></video>
    <div class="arrow right" onclick="mudarVideo(1)">&#10095;</div>
</div>

<script>
const videos = <?php echo isset($videos) ? json_encode($videos) : '[]'; ?>;
let indiceAtual = 0;

function abrirLightbox(index) {
    indiceAtual = index;
    const player = document.getElementById('videoPlayer');
    player.src = videos[indiceAtual];
    document.getElementById('lightbox').style.display = 'flex';
    player.play();
}

function fecharLightbox(event) {
    if(event.target.tagName !== 'VIDEO' && event.target.className.indexOf('arrow') === -1) {
        const player = document.getElementById('videoPlayer');
        player.pause();
        player.src = '';
        document.getElementById('lightbox').style.display = 'none';
    }
}

function mudarVideo(direcao) {
    indiceAtual += direcao;
    if(indiceAtual < 0) indiceAtual = videos.length - 1;
    if(indiceAtual >= videos.length) indiceAtual = 0;
    const player = document.getElementById('videoPlayer');
    player.src = videos[indiceAtual];
    player.play();
}

// Navegação com teclado
document.addEventListener('keydown', (e) => {
    if (document.getElementById('lightbox').style.display === 'flex') {
        if (e.key === "ArrowRight") mudarVideo(1);
        if (e.key === "ArrowLeft") mudarVideo(-1);
        if (e.key === "Escape") fecharLightbox({target:null});
    }
});
</script>







</body>




</html>

