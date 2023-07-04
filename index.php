<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/main.css">
    <link rel="stylesheet" href="scss/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Fira+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&family=Fira+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tulpen+One&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <title>Sound Streamify</title>
</head>
<body class="body">
    <header>
        <div class="container">
            <nav class="menu">
                <ul class="wrapper">
                        <li class="menu-list"><a href="index.php" ><img class="logo" src="img/Logo.svg"  ></a></li>
                        <li class="menu-list"><a href="index.php" class="menu-link-podc">Главное</a></li>
                        <li class="menu-list"><a href="podkast.html" class="menu-link">Подкасты и книги</a></li>
                        <li class="menu-list"><a href="Potoki.html" class="menu-link">Потоки</a></li>
                        <li class="menu-list"><a href="Kollekcii.html" class="menu-link">Коллекции</a></li>
                    <form class="menu-form">
                        <input class="menu-input" type="text" >
                        <button class="menu-button"><img class="Poisk" src="img/poisk.svg"></button>
                    </form>
                        <li class="menu-list"><a href="avtor.php" ><img class="polz" src="img/polzovotel.svg"  ></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main> 
        <section class="Sound">
            <div class="container">
                <h1 class="Sound-text">Наслаждайся музыкой вместе с</h1>
                <img class="milodi-1" src="img/melodi.svg" alt="">
                <img class="milodi-2" src="img/melodi.svg" alt="">
                <h1 class="Sound-Streamify">Sound Streamify</h1>
                <img class="milodi-3" src="img/melodi.svg" alt="">
                <img class="milodi-4" src="img/melodi.svg" alt="">
            </div>
        </section>

        <section class="newrils">
            <div class="container">
                <p class="newrils-zog">Новые релизы</p>
                <div class="newrils-box">
                  <div class="newrils-muzik">
                        <img class="oblog"  src="img/nw1.svg">
                            <div class="newrils-nazvan">
                                <br><p class="newrils-text">Демоны</p><br>
                                <p class="newrils-text">10AGE</p><br>
                                    
                            </div>
                    </div>
                    <div class="newrils-muzik">
                        <img class="oblog" src="img/nw2.svg">
                            <div class="newrils-nazvan">
                                <br><p class="newrils-text">Океан</p><br>
                                <p class="newrils-text">ХАЮИБ</p><br>
                            </div>
                    </div>
                    <div class="newrils-muzik">
                        <img  class="oblog" src="img/nw3.svg">
                            <div class="newrils-nazvan">
                                <br><p class="newrils-text">300</p><br>
                                <p class="newrils-text">  SQWOZ BAB</p><br>
                            </div>
                    </div>
                </div>
                <div class="newrils-box">
                    <div class="newrils-muzik">
                          <img class="oblog"  src="img/nw4.svg">
                              <div class="newrils-nazvan">
                                <br><p class="newrils-text">Ls N Ms‍</p><br>
                                <p class="newrils-text">  LIL MORTY</p><br>
                              </div>
                      </div>
                      <div class="newrils-muzik">
                          <img class="oblog" src="img/nw5.svg">
                              <div class="newrils-nazvan">
                                <br><p class="newrils-text">L.E.D‍</p><br>
                                <p class="newrils-text">  L iZReaL</p><br>
                              </div>
                      </div>
                      <div class="newrils-muzik">
                          <img  class="oblog" src="img/nw6.svg">
                              <div class="newrils-nazvan">
                                <br><p class="newrils-text">Демоны</p><br>
                                <p class="newrils-text">  mk545</p><br>


                              </div>
                      </div>
                  </div>
            </div>
        </section>
        <section class="Podbor">
            <div class="container">
                <p class="Podbor-zog">Подборка</p>
                <div class="foto">
                    <a href="Leto.php" ><img class="Podbor-img" src="img/podb1.svg"></a>
                    <a href="Leto.php"  ><img class="Podbor-img" src="img/podb2.svg"></a>
                    <a href="Leto.php"  ><img class="Podbor-img" src="img/podb3.svg"></a>
                    <a href="Leto.php"  ><img class="Podbor-img" src="img/podb4.svg"></a>
            </div>
        </div>
        </section>
        <section class="Chart">
            <div class="container">
                <p class="Chart-zog">Чарт</p>
                <div class="Chart-obsh">
                    <div class="Chart-blok">
                        <p class="nomer">1</p>
                        <div class="Chart-box" onclick="showAudioControls(0); toggleAudio(0)">
                            <img src="img/chart1.png" alt="">
                            <p class="nazvn">Зеркало<br><br>Kizaru<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/kizaru_-_Zerkalo_75988545.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                    <div class="Chart-blok">
                        <p class="nomer">2</p>
                        <div class="Chart-box" onclick="showAudioControls(1); toggleAudio(1)">
                            <img src="img/chart2.png" alt="">
                            <p class="nazvn">ЗА ДЕНЬГИ ДА<br><br>INSTASAMKA<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/Instasamka_-_ZA_DENGI_DA_75137048.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                    <div class="Chart-blok">
                        <p class="nomer">3</p>
                        <div class="Chart-box" onclick="showAudioControls(2); toggleAudio(2)">
                            <img src="img/chart3.png" alt="">
                            <p class="nazvn">Кукла колдуна<br><br>Король и Шут<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/Korol_i_SHut_-_Kukla_kolduna_627891.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                    <div class="Chart-blok">
                        <p class="nomer">4</p>
                        <div class="Chart-box" onclick="showAudioControls(3); toggleAudio(3)">
                            <img src="img/chart4.png" alt="">
                            <p class="nazvn">Скажи мне кто ты<br><br>xxxmanera<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/xmanera_-_hello_mir_manera_krutit_mir_75817243.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                    <div class="Chart-blok">
                        <p class="nomer">5</p>
                        <div class="Chart-box" onclick="showAudioControls(4); toggleAudio(4)">
                            <img src="img/chart5.png" alt="">
                            <p class="nazvn">По барам<br><br>ANNA ASTI<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/ANNA_ASTI_-_Po_baram_74376135.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                    <div class="Chart-blok">
                        <p class="nomer">6</p>
                        <div class="Chart-box" onclick="showAudioControls(5); toggleAudio(5)">
                            <img src="img/chart6.png" alt="">
                            <p class="nazvn">Мания<br><br>XOLIDAYBOY<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/Xolidayboy_-_Maniya_2023_75889021.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                    <div class="Chart-blok">
                        <p class="nomer">7</p>
                        <div class="Chart-box" onclick="showAudioControls(6); toggleAudio(6)">
                            <img src="img/chart7.png" alt="">
                            <p class="nazvn">Моя хулиганка<br><br>XOLIDAYBOY<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/XOLIDAYBOY_-_Moya_khuliganka_75274869.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                    <div class="Chart-blok">
                        <p class="nomer">8</p>
                        <div class="Chart-box" onclick="showAudioControls(7); toggleAudio(7)">
                            <img src="img/chart8.png" alt="">
                            <p class="nazvn">Прыгну со скалы<br><br>Король и Шут<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/Korol_i_SHut_-_Prygnu_so_skaly_62570549.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                    <div class="Chart-blok">
                        <p class="nomer">9</p>
                        <div class="Chart-box" onclick="showAudioControls(8); toggleAudio(8)">
                            <img src="img/chart9.png" alt="">
                            <p class="nazvn">МАЙ МАЙ<br><br>LOVV66<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/LOVV66_-_MAJJ_MAJJ_75681368.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                    <div class="Chart-blok">
                        <p class="nomer">10</p>
                        <div class="Chart-box" onclick="showAudioControls(9); toggleAudio(9)">
                            <img src="img/chart10.png" alt="">
                            <p class="nazvn">Там ревели горы<br><br>Miyagi & Andy Panda<br><br></p>
                            <audio class="audioPlayer">
                                <source src="mp3/Miyagi_Andy_Panda_-_Tam_reveli_gory_70288283.mp3" type="audio/mpeg">
                              </audio>
                        </div>
                    </div>
                </div>
                <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(0)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(0)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
                  <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(1)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(1)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
                  <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(2)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(2)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
                  <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(3)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(3)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
                  <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(4)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(4)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
                  <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(5)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(5)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
                  <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(6)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(6)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
                  <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(7)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(7)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
                  <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(8)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(8)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
                  <div id="audioControls" class="audio-controls">
                    <button class="Play" onclick="toggleAudio(9)">Play/Pause</button>
                    <button class="krest"onclick="closeAudioControls(9)">X</button>
                    <input type="range" id="seekSlider" min="0" step="1" value="0" oninput="seekAudio()" />
                  </div>
            </div>
        </section>
        <section class="nowaudiu">
  <div class="container">
    <p class="nowaudiu-zog">Новые аудио книги</p>
    <div class="nowaudiu-slaider">
      <div class="slaider">
        <div class="slaider-line">
          <img src="img/slader1.svg" alt="">
          <img src="img/slader2.svg" alt="">
          <img src="img/slader3.svg" alt="">
          <img src="img/slader4.svg" alt="">
        </div>
      </div>
      <div class="Strelk">
        <a href="#"><img class="slider-prev" src="img/strl2.svg"></a>
        <a href="#"><img class="slider-next" src="img/strl1.svg"></a>
      </div>
    </div>
  </div>
</section>
 
    </main>
    <footer>
        <section class="foter">
            <div class="footer-box">
                <div class="container">
                    <div class="rovn">
                    <img class="loggo" src="img/Logo.svg" alt="">
                    <div class="menu1"> 
                        <a href="index.php" class="stolp1">Главное </a><br><br>
                        <a href="podkast.html" class="stolp1">Подкасты и книги</a>
                    </div>
                    <div class="menu2"> 
                        <a href="Kollekcii.html" class="stolp1">Коллекции</a><br><br>
                        <a href="Potoki.html" class="stolp1">Потоки</a>
                    </div>
                   <div class="socseti">
                    <a href="https://twidoom.com/Spotify/" ><img class="icon1" src="img/tvittr.svg" alt="" ></a>
                    <a href="https://vk.com/spotifyrussia" ><img class="icon1"  src="img/VK.svg" alt=""></a>
                    <a href="https://t.me/playspotify" ><img class="icon1"  src="img/TG.svg" alt=""></a>
                   </div>
                    </div>
                </div>
                <p class="Avtors">© Авторские права 2023 Sound Streamify. Все права защищены.</p>
            </div>
        </section>
    </footer>
    <script src="JS/poisk.js"></script>
<script src="JS/slader.js"></script>
<script src="JS/pesni.js"></script>
</body>
</html>                   
